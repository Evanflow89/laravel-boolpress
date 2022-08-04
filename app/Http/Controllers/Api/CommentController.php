<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $post_id, )
    {
             //prendo i dati dalla request
            $data = $request->all();
             //faccio una validazione


             //creo il commento nel Database usando il model
            $newComment = new Comment();
            $newComment->post_id = $post_id;
            $newComment->name = $data['name'];
            $newComment->content = $data['content'];
            $newComment->save();
             //restituisco una risposta Json
    }
}
