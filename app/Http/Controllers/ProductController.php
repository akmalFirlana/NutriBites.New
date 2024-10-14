<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'stock' => 'required|integer',
        'price' => 'required|numeric',
        'category' => 'required|array',
        'description' => 'nullable|string',
        'nutrition_info' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,xlsx',
        'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg'
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category = implode(',', $request->category);
    $product->user_id = auth()->id(); 
    $product->save();

    if ($request->hasFile('nutrition_info')) {
        $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
    }
    
    // Menyimpan foto produk
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $index => $file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/products', $filename);

            // Menyimpan path foto ke kolom yang sesuai
            if ($index == 0) {
                $product->image_1 = $path;
            } elseif ($index == 1) {
                $product->image_2 = $path;
            } elseif ($index == 2) {
                $product->image_3 = $path;
            } elseif ($index == 3) {
                $product->image_4 = $path;
            }
        }
        $product->save();  // Menyimpan data setelah path foto diperbarui
    }

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
}
}