<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function upload()
    {
        return view('admin.produk.upload');
    }

    public function produk()
    {
        // Ambil semua produk dari database, Anda bisa menggunakan pagination jika datanya banyak
        $products = Product::paginate(10); // Ambil 10 produk per halaman

        // Kirim data produk ke view admin.produk
        return view('admin.produk.Produk', compact('products'));
    }
}
