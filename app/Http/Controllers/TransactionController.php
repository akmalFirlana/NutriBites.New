<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class TransactionController extends Controller
{
    public function checkout(Product $product)
    {
        return view('checkout', compact('product'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
        $subtotal = $product->price * $quantity;

        // Simpan transaksi tanpa order_id, status 'pending'
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->product_id = $product->id;
        $transaction->quantity = $quantity;
        $transaction->total_price = $subtotal;
        $transaction->status = 'pending';
        $transaction->save();

        return redirect()->route('transaction.show', ['transaction' => $transaction->id]);
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $newStatus = $request->input('status');

        $transaction->status = $newStatus;
        $transaction->save();

        if ($newStatus === 'delivered') {
            $this->updateProductStockAndSales($transaction);
        }

        return redirect()->route('checkout.show', ['transaction' => $transaction->id])
            ->with('success', 'Status transaksi diperbarui.');
    }

    private function updateProductStockAndSales(Transaction $transaction)
    {
        $product = $transaction->product;

        if (!$product) {
            return;
        }

        $quantity = $transaction->quantity;
        $product->stock -= $quantity;
        $product->sold += $quantity;
        $product->save();
    }

    public function show(Transaction $transaction)
    {
        $addresses = UserAddress::where('user_id', Auth::id())->get();
        $transaction->load('product.shippingAddress.kota');

        return view('checkout', [
            'transaction' => $transaction,
            'addresses' => $addresses
        ]);
    }


    public function calculateShipping(Request $request, Transaction $transaction)
    {
        // Log untuk memeriksa apakah API key dibaca dengan benar
        $apiKey = env('RAJAONGKIR_API_KEY');
        Log::info('Mengecek API Key Raja Ongkir', ['apiKey' => $apiKey]);

        // Jika API key kosong, beri peringatan
        if (!$apiKey) {
            Log::error('API key tidak ditemukan di file .env');
            return response()->json(['error' => 'API key tidak ditemukan di file .env'], 500);
        }

        // Ambil kurir yang dipilih oleh user dari request
        $selectedCourier = $request->input('courier', 'jne'); // Default ke 'jne' jika tidak ada input
        Log::info('Mengecek kurir yang dipilih', ['selectedCourier' => $selectedCourier]);

        // Ambil alamat user dan kota asal produk
        $userAddress = UserAddress::where('user_id', $transaction->user_id)
            ->where('is_primary', true)
            ->with('kota')
            ->first();

        $originCity = optional($transaction->product->shippingAddress->kota)->city_id;
        $destinationCity = optional($userAddress->kota)->city_id;
        $weight = $transaction->product->weight;

        // Log untuk memeriksa data yang dikirim ke API
        Log::info('Mengecek ongkir:', [
            'originCity' => $originCity,
            'destinationCity' => $destinationCity,
            'weight' => $weight,
            'selectedCourier' => $selectedCourier,
        ]);

        // Cek data lengkap
        if (!$originCity || !$destinationCity || !$weight) {
            Log::error('Data alamat atau berat produk tidak lengkap.', [
                'originCity' => $originCity,
                'destinationCity' => $destinationCity,
                'weight' => $weight,
            ]);
            return response()->json([
                'error' => 'Data alamat atau berat produk tidak lengkap.',
                'originCity' => $originCity,
                'destinationCity' => $destinationCity,
                'weight' => $weight,
            ], 422);
        }

        // Mengirim permintaan ke API Raja Ongkir dengan kurir yang dipilih
        try {
            Log::info('Menghubungi API Raja Ongkir untuk menghitung ongkir...');

            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->post('https://api.rajaongkir.com/starter/cost', [
                        'origin' => $originCity,
                        'destination' => $destinationCity,
                        'weight' => $weight,
                        'courier' => $selectedCourier
                    ]);

            // Log respons dari API Raja Ongkir
            Log::info('Respons API Raja Ongkir:', $response->json());

            // Memeriksa apakah respons berhasil dan biaya ongkir ada
            $data = $response->json();
            if ($response->successful() && isset($data['rajaongkir']['results'][0]['costs'])) {
                $costs = $data['rajaongkir']['results'][0]['costs'];
                return response()->json([
                    'courier' => $selectedCourier,
                    'shipping_costs' => $costs
                ]);
            } else {
                Log::error('Gagal mengambil biaya ongkir.', [
                    'response' => $data,
                    'status' => $response->status(),
                ]);
                return response()->json(['error' => 'Gagal menghitung ongkir.'], 500);
            }
        } catch (\Exception $e) {
            // Log jika terjadi exception saat menghubungi API Raja Ongkir
            Log::error('Error saat menghubungi API Raja Ongkir:', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Gagal menghitung ongkir.'], 500);
        }
    }

    public function saveTransaction(Request $request)
    {
        dd('Fungsi dipanggil');

        // Ambil data dari request
        $order_id = $request->input('order_id');
        $transaction_id = $request->input('transaction_id');

        // Cari transaksi berdasarkan ID internal
        $transaction = Transaction::find($transaction_id);

        if ($transaction) {
            // Update data transaksi dengan data dari Midtrans
            $transaction->order_id = $order_id;
            $transaction->status = $request->input('status');
            $transaction->payment_type = $request->input('payment_type');
            $transaction->transaction_time = $request->input('transaction_time');
            $transaction->total_price = $request->input('gross_amount');
            $transaction->save();
            \Log::info('Data request:', $request->all());

            return response()->json(['success' => true]);
        } else {
            \Log::warning('Transaksi tidak ditemukan:', ['order_id' => $order_id]);
            \Log::warning('Data transaksi dari Midtrans tidak ditemukan.', ['transaction_id' => $transaction_id]);
            return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan'], 404);
        }
    }


}
