<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('is_approved', false)->get();

        return view('admin.comments.index', compact('comments'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
