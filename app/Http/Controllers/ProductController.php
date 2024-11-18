<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Http\Controllers\ReviewController;

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
    private function storeProductPhotos(Request $request, Product $product)
    {
        $imagePaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('products', $filename, 'public');
                $imagePaths[] = $path;  // Menyimpan path gambar ke dalam array
            }
        }

        // Menyimpan array gambar ke dalam kolom 'images'
        if (!empty($imagePaths)) {
            $product->images = json_encode($imagePaths);
        }
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
            'shelf_life' => 'nullable|integer',
            'weight' => 'nullable|numeric',
            'shipping_address_id' => 'nullable|exists:user_addresses,id',
            'bpom_license' => 'nullable|string',
            'sold' => 'nullable|integer',
            'rating' => 'nullable|numeric',
            'composition' => 'nullable|string'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = implode(',', $request->category);
        $product->shelf_life = $request->shelf_life;
        $product->weight = $request->weight;
        $product->shipping_address_id = $request->shipping_address_id;
        $product->user_id = auth()->id();
        $product->bpom_license = $request->bpom_license;
        $product->sold = $request->input('sold', 0);
        $product->rating = $request->rating;
        $product->composition = $request->composition;

        // Simpan info gizi
        if ($request->hasFile('nutrition_info')) {
            $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
        }

        // Simpan foto produk dalam format JSON
        $this->storeProductPhotos($request, $product);

        // Simpan produk ke database
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
        'category' => 'required|array',
        'description' => 'nullable|string',
        'nutrition_info' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,xlsx',
        'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
        'shelf_life' => 'nullable|integer',
        'weight' => 'nullable|numeric',
        'shipping_address_id' => 'nullable|exists:user_addresses,id',
        'bpom_license' => 'nullable|string',
        'sold' => 'nullable|integer',
        'rating' => 'nullable|numeric',
        'composition' => 'nullable|string'
    ]);

    // Update product attributes
    $product->update([
        'name' => $request->name,
        'stock' => $request->stock,
        'price' => $request->price,
        'description' => $request->description,
        'category' => implode(',', $request->category),
        'shelf_life' => $request->shelf_life,
        'weight' => $request->weight,
        'shipping_address_id' => $request->shipping_address_id,
        'bpom_license' => $request->bpom_license,
        'sold' => $request->input('sold', $product->sold), // Default ke nilai saat ini
        'rating' => $request->rating,
        'composition' => $request->composition
    ]);

    // Update nutrition info if exists
    if ($request->hasFile('nutrition_info')) {
        $product->nutrition_info = $request->file('nutrition_info')->store('nutrition_info', 'public');
    }

    // Update photos
    $this->storeProductPhotos($request, $product);

    $product->save();

    return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui.');
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
    $product = Product::with('discussions.replies.user', 'reviews.user')->findOrFail($id); // Include diskusi, balasan, dan user
    $user = auth()->user();
    
    $hasPurchased = $user->postTransactions()
        ->where('product_id', $product->id)
        ->where('status', 'completed') // Sesuaikan dengan status transaksi selesai
        ->exists();

    $reviews = $product->reviews; // Relasi ke model Review
    $usersCount = $reviews->unique('user_id')->count();
    $averageRating = $reviews->avg('rating');

    $discussions = $product->discussions()->with('user', 'replies.user')->get(); // Ambil diskusi dan balasan

    return view('produk', compact('product', 'hasPurchased', 'reviews', 'usersCount', 'averageRating', 'discussions'));
}



    public function kategori()
    {
        $products = Product::all();
        return view('kategori', compact('products'));
    }

    public function pesanan()
    {
        $products = Product::all();
        return view('pesanan', compact('products'));
    }

    public function home()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function Toko($user_id)
    {
        $user = \App\Models\User::findOrFail($user_id);
        $products = Product::where('user_id', $user_id)->get();
        return view('toko', compact('user', 'products'));
    }


}
