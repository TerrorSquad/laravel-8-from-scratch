<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use function request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();

        $post = Post::create($attributes);

        return redirect("/post/{$post->slug}");
    }

    public function create()
    {
        return view('posts.admin.create', [
            'categories' => \App\Models\Category::all(),
        ]);
    }
}
