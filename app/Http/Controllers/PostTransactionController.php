<?php
namespace App\Http\Controllers;

use App\Models\PostTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostTransactionController extends Controller
{
    public function store(Request $request)
    {
        // Log data request sebelum validasi
        Log::info('Request data before validation:', $request->all());

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'shipping_method' => 'nullable|string',
            'estimated_delivery' => 'nullable|string',
            'order_status' => 'required|string',
            'payment_type' => 'nullable|string',
            'transaction_time' => 'nullable|date',
            'shipping_cost' => 'nullable|numeric',
        ]);

        // Log data yang sudah divalidasi
        Log::info('Validated data:', $validated);

        try {
            // Menggunakan model PostTransaction untuk menyimpan ke tabel post_transactions
            $transaction = PostTransaction::create($validated);

            // Log data transaksi yang berhasil disimpan
            Log::info('PostTransaction created:', $transaction->toArray());

            return redirect()->route('transaction.show', $transaction->id)
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
}