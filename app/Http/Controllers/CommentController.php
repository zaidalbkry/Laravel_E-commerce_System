<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    // إضافة تعليق
    public function store(Request $request, $productId) {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // التحقق من أن المستخدم لديه تعليق واحد فقط لهذا المنتج
        $existingComment = Comment::where('user_id', Auth::id())
                                  ->where('product_id', $productId)
                                  ->first();

        if ($existingComment) {
            return back()->with('error', 'You can only leave one comment per product.');
        }

        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

    // إضافة رد من المشرف
    public function reply(Request $request, $commentId) {
        $request->validate([
            'reply' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($commentId);

        // السماح فقط للمشرف بالرد
        if (Auth::user()->role !== 'admin') {
            return back()->with('error', 'Only admins can reply to comments.');
        }

        $comment->update(['reply' => $request->reply]);

        return back()->with('success', 'Reply added successfully.');
    }
}
