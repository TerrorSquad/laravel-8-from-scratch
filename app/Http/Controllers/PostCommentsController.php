<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
        ]);

        return back();
    }
}
