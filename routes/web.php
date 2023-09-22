<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::post('/newsletter', NewsletterController::class)->name('newsletter.store');

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comment', [PostCommentsController::class, 'store'])->name('post.comment');

Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('sessions.create')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('sessions.store')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->name('sessions.destroy')->middleware('auth');

// Admin

Route::middleware('can:admin')->group(function () {
    // Route::resource('admin/posts', AdminPostController::class)->except('show');

    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});
