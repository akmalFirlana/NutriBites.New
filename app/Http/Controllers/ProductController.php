<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Show only the products that belong to the authenticated user
        $products = Product::where('user_id', auth()->id())->get();
        return view('your-view-file', compact('products'));
    }

    public function create()
    {
        $addresses = UserAddress::where('user_id', Auth::id())->get();
        return view('products.create', compact('addresses'));
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
            'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'shelf_life' => 'nullable|integer', // Validasi untuk daya tahan produk
            'weight' => 'nullable|numeric', // Validasi untuk berat produk
            'shipping_address_id' => 'nullable|exists:user_addresses,id' // Validasi ID alamat
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = implode(',', $request->category);
        $product->shelf_life = $request->product_shelf_life;
        $product->weight = $request->product_weight;
        $product->shipping_address_id = $request->shipping_address;
        $product->user_id = auth()->id(); // Only the logged-in user's ID is stored here

        // Storing nutrition info
        if ($request->hasFile('nutrition_info')) {
            $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
        }
      
        // Storing photos
        $this->storeProductPhotos($request, $product);

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

    public function edit(Product $product)
    {
        // Ensure only the owner can edit the product
        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $addresses = UserAddress::where('user_id', Auth::id())->get();
        return view('products.edit', compact('product', 'addresses'));
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
            'category' => 'required|string',
            'description' => 'nullable|string',
            'nutrition_info' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,xlsx',
            'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'shelf_life' => 'nullable|integer', // Validasi untuk daya tahan produk
            'weight' => 'nullable|numeric', // Validasi untuk berat produk
            'shipping_address_id' => 'nullable|exists:user_addresses,id' // Validasi ID alamat
        ]);

        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'shelf_life' => $request->shelf_life,
            'weight' => $request->weight,
            'shipping_address_id' => $request->shipping_address_id
        ]);

        // Update nutrition info if exists
        if ($request->hasFile('nutrition_info')) {
            $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
        }

        // Update photos
        $this->storeProductPhotos($request, $product);

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
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    

    public function detail($id)
    {
        $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('product.show', compact('product'));
    }

    private function storeProductPhotos(Request $request, Product $product)
    {
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('products', $filename, 'public');

                // Storing up to 4 images in separate columns
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
    }
}
