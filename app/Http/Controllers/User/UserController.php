<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function fix()
    {
        return view('fix');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function favorit()
    {
        return view('favorit');
    }

    public function cart()
    {
        return view('cart');
    }

    public function kategori()
    {
        return view('kategori');
    }

    public function produk()
    {
        return view('produk');
    }
}

