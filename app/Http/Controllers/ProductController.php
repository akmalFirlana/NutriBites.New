<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

        // Menyimpan info nutrisi ke folder public/nutrition_info
        if ($request->hasFile('nutrition_info')) {
            $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
        }

        // Menyimpan foto produk ke folder public/products
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('products', $filename, 'public');

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
            $product->save();
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'categories' => 'required|string',
            'description' => 'nullable|string',
            'nutrition_info' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,xlsx',
            'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'categories' => $request->categories,
            'description' => $request->description,
        ]);

        if ($request->hasFile('nutrition_info')) {
            $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('products', $filename, 'public');

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
        }

        $product->save();

        return redirect()->route('admin.produk.Produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.produk.Produk')->with('success', 'Produk berhasil dihapus');
    }
}
