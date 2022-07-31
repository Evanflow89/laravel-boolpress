<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($slug)
    {
     $tag = Tag::with(['posts' => function($q) {
        $q->where('published', 1);
     }])->where('slug', $slug)->first();

     return $tag;
    }
}
