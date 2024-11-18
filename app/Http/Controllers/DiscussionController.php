<?php
namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Discussion::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Pertanyaan berhasil dikirim.');
    }
}

