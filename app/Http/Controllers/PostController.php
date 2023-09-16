<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published_at');

        if (request('search')) {
            $posts
                ->where('title', 'LIKE', '%' . request('search') . '%')
                ->orWhere('body', 'LIKE', '%' . request('search') . '%');
        }

        return view('posts', [
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
