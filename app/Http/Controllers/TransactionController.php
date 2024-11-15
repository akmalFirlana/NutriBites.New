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
        $selectedCourier = $request->input('courier', 'jne');

        $userAddress = UserAddress::where('user_id', $transaction->user_id)
            ->where('is_primary', true)
            ->with('kota')
            ->first();

        $originCity = optional($transaction->product->shippingAddress->kota)->city_id;
        $destinationCity = optional($userAddress->kota)->city_id;
        $weight = $transaction->product->weight;

        if (!$originCity || !$destinationCity || !$weight) {
            return response()->json([
                'error' => 'Data alamat atau berat produk tidak lengkap.',
                'originCity' => $originCity,
                'destinationCity' => $destinationCity,
                'weight' => $weight,
            ], 422);
        }

        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $originCity,
                    'destination' => $destinationCity,
                    'weight' => $weight,
                    'courier' => $selectedCourier
                ]);

        $data = $response->json();

        if ($response->successful() && isset($data['rajaongkir']['results'][0]['costs']) && !empty($data['rajaongkir']['results'][0]['costs'])) {
            $costs = $data['rajaongkir']['results'][0]['costs'];
            $shippingCost = $costs[0]['cost'][0]['value'];

            session(['shipping_cost' => $shippingCost]);

            return response()->json([
                'courier' => $selectedCourier,
                'shipping_costs' => $costs
            ]);
        } else {
            return response()->json(['error' => 'Data biaya pengiriman tidak tersedia.'], 500);
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
