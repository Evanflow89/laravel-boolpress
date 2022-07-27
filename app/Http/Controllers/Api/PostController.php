<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        //funzione che restituirà sotto forma di Json solo i post pubblicati, comprensivi di un array per la category;
        $posts = Post::where('published', true)->with(['category', 'tags', 'users'])->get();

        return response()->json($posts);
    }
}
