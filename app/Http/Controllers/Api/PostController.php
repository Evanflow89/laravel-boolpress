<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        //funzione che restituirĂ  sotto forma di Json solo i post pubblicati, comprensivi di un array per la category;
        $posts = Post::where('published', true)->with(['category', 'tags', 'user'])->get();

        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags', 'user', 'comments' => function($q) {
            $q->where('is_approved', true);
        }])->first();

        return response()->json($post);
    }
}
