<?php
// app/Http/Controllers/TransactionController.php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
        $product = Product::findOrFail($request->input('product_id')); // Pastikan ID produk dikirimkan ke form
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


        
        return redirect()->route('checkout.show', ['transaction' => $transaction->id]);
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
        return view('checkout', ['transaction' => $transaction]);
    }

}






