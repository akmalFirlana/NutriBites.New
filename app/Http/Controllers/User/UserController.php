<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function updateRole(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($user->usertype === 'user') {
            // Ubah role menjadi admin
            $user->usertype = 'admin';

            // Simpan perubahan
            $user->save();

            return view('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Perubahan role tidak dapat dilakukan.');
    }


}

