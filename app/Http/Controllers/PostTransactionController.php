<?php
namespace App\Http\Controllers;

use App\Models\PostTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class PostTransactionController extends Controller
{
    public function store(Request $request)
    {
        // Log data request sebelum validasi
        Log::info('Request data before validation:', $request->all());

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'shipping_method' => 'required|string',
            'estimated_delivery' => 'required|string',
            'order_status' => 'required|string',
            'payment_type' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:15',
            'full_address' => 'required|string',
            'transaction_time' => 'required|date',
        ]);

        // Log data yang sudah divalidasi
        Log::info('Validated data:', $validated);

        try {
            // Menggunakan model PostTransaction untuk menyimpan ke tabel post_transactions
            $transaction = PostTransaction::create($validated);

            // Log data transaksi yang berhasil disimpan
            Log::info('PostTransaction created:', $transaction->toArray());

            return redirect()->route('pesanan')
                ->with('success', 'Transaksi berhasil diproses');

        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            Log::error('Error creating post transaction:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Terjadi kesalahan saat memproses transaksi.');
        }
    }

    public function index()
    {
        $transactions = PostTransaction::with(['product', 'userAddress'])
            ->whereHas('product', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

        return view('admin.order', compact('transactions'));
    }

    public function confirm($id)
    {
        $transaction = PostTransaction::findOrFail($id);
        $transaction->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function ship(Request $request, $id)
    {
        $transaction = PostTransaction::findOrFail($id);

        // Validasi nomor resi jika diperlukan
        $request->validate([
            'resi' => 'required|string|max:255',
        ]);

        // Update status dan nomor resi
        $transaction->update([
            'status' => 'shipped',
            'resi' => $request->resi,
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dikirim.');
    }


    public function complete($id)
    {
        $transaction = PostTransaction::findOrFail($id);

        if ($transaction->status !== 'completed') {
            // Ambil produk terkait
            $product = Product::findOrFail($transaction->product_id);

            // Update stok dan sales produk
            $product->update([
                'stock' => $product->stock - $transaction->quantity,
                'sold' => $product->sold + $transaction->quantity,
            ]);

            // Update status transaksi
            $transaction->update(['status' => 'completed']);
        }

        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan.');
    }


    public function cancel($id)
    {
        $transaction = PostTransaction::findOrFail($id);
        if ($transaction->status === 'pending') {
            $transaction->update(['status' => 'cancelled']);
            return response()->json(['message' => 'Pesanan berhasil dibatalkan.']);
        }
        return response()->json(['message' => 'Pesanan tidak dapat dibatalkan.'], 400);
    }

    public function pembelian()
    {
        $transactions = PostTransaction::with('product')->where('user_id', auth()->id())->get();
        return view('pesanan', compact('transactions'));
    }

    public function dashboard()
    {
        $userId = auth()->id(); // ID penjual yang sedang login

        // Total Pesanan
        $totalOrders = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        // Pesanan Dalam Pengiriman
        $inShipping = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'shipped')->count();

        // Pesanan Selesai
        $completedOrders = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'completed')->count();

        // Total Pemasukan
        $completedTransactions = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'completed')->get();

        $totalEarnings = $completedTransactions->sum(function ($transaction) {
            return $transaction->total_price + $transaction->shipping_cost;
        });

        $recentOrders = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest()->take(10)->get();

        $salesData = PostTransaction::whereHas('product', function ($query) use ($userId) {
            $query->where('user_id', $userId); // Filter berdasarkan penjual
        })
            ->where('status', 'completed') // Hanya transaksi yang selesai
            ->selectRaw('MONTH(transaction_time) as month, DAY(transaction_time) as day, SUM(total_price + shipping_cost) as total_sales') // Total pendapatan per bulan dan tanggal
            ->groupBy('month', 'day') // Mengelompokkan berdasarkan bulan dan tanggal
            ->orderByRaw('month, day') // Urutkan berdasarkan bulan dan tanggal
            ->get();

        $dataPoints = $salesData->map(function ($item) {
            // Mengonversi bulan dan tanggal menjadi timestamp
            $timestamp = strtotime("2024-{$item->month}-{$item->day}") * 1000; // Gunakan tahun acuan jika perlu (misalnya 2024)
            return ['x' => $timestamp, 'y' => $item->total_sales];
        })->toArray();



        return view('admin.dashboard', compact('totalOrders', 'inShipping', 'completedOrders', 'totalEarnings', 'recentOrders', 'dataPoints'));
    }


}
