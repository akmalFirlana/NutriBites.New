<?php
namespace App\Http\Controllers;

use App\Models\DiscussionReply;
use Illuminate\Http\Request;

class DiscussionReplyController extends Controller
{
    public function store(Request $request, $discussionId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        DiscussionReply::create([
            'discussion_id' => $discussionId,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }
}
