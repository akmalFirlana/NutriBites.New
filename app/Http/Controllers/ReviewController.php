<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Menyimpan ulasan
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($productId);
        $user = auth()->user();

        $hasPurchased = auth()->user()
            ->postTransactions()
            ->where('product_id', $productId)
            ->where('status', 'completed')
            ->exists();


        if (!$hasPurchased) {
            return back()->with('error', 'Anda harus membeli produk ini untuk memberikan ulasan.');
        }

        // Simpan ulasan
        Review::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Ulasan berhasil disimpan.');
    }
}

