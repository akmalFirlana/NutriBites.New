<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Show only the products that belong to the authenticated user
        $products = Product::where('user_id', auth()->id())->get();
        return view('your-view-file', compact('products'));
    }

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
        $product->user_id = auth()->id();  // Only the logged-in user's ID is stored here
        $product->save();

        // Storing nutrition info and photos
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
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        // Ensure only the owner can view the product
        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('your-view-file', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Ensure only the owner can update the product
        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

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
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        // Ensure only the owner can delete the product
        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $product->delete();
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus');
    }

    
    public function list()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('dashboard', compact('products')); // Pastikan untuk mengembalikan view yang sesuai
    }

    public function detail($id)
{
    $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
    return view('product.show', compact('product')); // Mengembalikan view dengan data produk
}

}

