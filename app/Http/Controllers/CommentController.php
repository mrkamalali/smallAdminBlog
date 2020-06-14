<?php

namespace App\Http\Controllers;
use App\comment;
use App\Post;

use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post)
    {   
            comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' =>request('user_id'),
        ]);
        return back();
    }


}
