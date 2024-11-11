<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function addToCart(Request $request, $productId)
    {
        $cart = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $productId],
            ['quantity' => $request->quantity ?? 1]
        );

        return response()->json(['message' => 'Produk ditambahkan ke keranjang']);
    }   

    public function viewCart()
    {   
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        return view('cart', ['cartItems' => $cartItems]);
        
    }


    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();

        return response()->json(['message' => 'Produk dihapus dari keranjang']);
    }
}
