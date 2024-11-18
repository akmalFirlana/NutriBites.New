<?php

namespace App\Http\Controllers;

use App\Models\ProductReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'reason' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_reports', 'public');
        }

        ProductReport::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'reason' => $request->reason,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim.');
    }
}

