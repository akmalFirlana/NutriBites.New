<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // Ambil wishlist berdasarkan user yang sedang login
        $wishlists = Wishlist::where('user_id', auth()->id())->with('product')->get();
        return view('favorit', ['wishlists' => $wishlists]);
    }

    public function addToWishlist($productId)
    {
        $exists = Wishlist::where('user_id', auth()->id())->where('product_id', $productId)->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ]);
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan ke Wishlist']);
    }

    public function removeFromWishlist($wishlistId)
    {
        Wishlist::where('id', $wishlistId)->where('user_id', auth()->id())->delete();

        return response()->json(['message' => 'Produk berhasil dihapus dari Wishlist']);
    }

}

