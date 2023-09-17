<?php

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show'])->name('post');

Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('sessions.create')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('sessions.store')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->name('sessions.destroy')->middleware('auth');
