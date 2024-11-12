<?php
// app/Http/Controllers/TransactionController.php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    // Fungsi untuk menampilkan halaman checkout
    public function checkout(Product $product)
    {
        return view('checkout', compact('product'));
    }

    // Fungsi untuk menyimpan transaksi
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data produk
        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
        $subtotal = $product->price * $quantity;

        // Simpan transaksi
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->product_id = $product->id;
        $transaction->quantity = $quantity;
        $transaction->total_price = $subtotal;
        $transaction->status = 'uncheck';
        $transaction->save();

        return redirect()->route('transaction.show', ['transaction' => $transaction->id]);
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $newStatus = $request->input('status');

        // Update status transaksi
        $transaction->status = $newStatus;
        $transaction->save();

        // Jika status berubah menjadi 'delivered', update stok dan penjualan produk
        if ($newStatus === 'delivered') {
            $this->updateProductStockAndSales($transaction);
        }

        return redirect()->route('checkout.show', ['transaction' => $transaction->id])
            ->with('success', 'Status transaksi diperbarui.');
    }

    // Fungsi untuk mengurangi stok dan menambah sales di tabel produk
    private function updateProductStockAndSales(Transaction $transaction)
    {
        $product = $transaction->product;
        $quantity = $transaction->quantity;

        // Kurangi stok dan tambah penjualan (sales)
        $product->stock -= $quantity;
        $product->sold += $quantity;
        $product->save();
    }

    public function show(Transaction $transaction)
    {
        $addresses = UserAddress::where('user_id', Auth::id())->get();

        // Pastikan mengambil transaksi beserta relasinya untuk menghindari masalah N+1 query
        $transaction->load('product.shippingAddress.kota');

        return view('checkout', [
            'transaction' => $transaction,
            'addresses' => $addresses
        ]);
    }

    public function calculateShipping(Request $request, Transaction $transaction)
{
    // Ambil kurir yang dipilih oleh user dari request
    $selectedCourier = $request->input('courier', 'jne'); // Default ke 'jne' jika tidak ada input

    // Lanjutkan dengan kode yang lain, seperti mengambil alamat user dan kota asal produk
    $userAddress = UserAddress::where('user_id', $transaction->user_id)
        ->where('is_primary', true)
        ->with('kota')
        ->first();

    $originCity = optional($transaction->product->shippingAddress->kota)->city_id;
    $destinationCity = optional($userAddress->kota)->city_id;
    $weight = $transaction->product->weight;

    // Cek data lengkap
    if (!$originCity || !$destinationCity || !$weight) {
        return response()->json([
            'error' => 'Data alamat atau berat produk tidak lengkap.',
            'originCity' => $originCity,
            'destinationCity' => $destinationCity,
            'weight' => $weight,
        ], 422);
    }

    // Mengirim permintaan ke API Raja Ongkir dengan kurir yang dipilih
    $response = Http::withHeaders([
        'key' => env('RAJAONGKIR_API_KEY')
    ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $originCity,
                'destination' => $destinationCity,
                'weight' => $weight,
                'courier' => $selectedCourier
            ]);

    $data = $response->json();

    if ($response->successful() && isset($data['rajaongkir']['results'])) {
        $costs = $data['rajaongkir']['results'][0]['costs'];
        return response()->json([
            'courier' => $selectedCourier,
            'shipping_costs' => $costs
        ]);
    }

    return response()->json(['error' => 'Gagal menghitung ongkir.'], 500);
}


}
