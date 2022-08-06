<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();

        $comments = Comment::whereHas('post', function($q) use($user_id) {
            $q->where('user_id', $user_id);
        })->where('is_approved', false)->get();

        return view('admin.comments.index', compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->is_approved = true;

        $comment->save();

        return redirect()->route('admin.comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }
}
