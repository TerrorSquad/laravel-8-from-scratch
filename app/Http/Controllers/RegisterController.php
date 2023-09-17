<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users,username', 'max:255', 'min:3'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:20']
        ]);

        User::create($attributes);

        return redirect('/');
    }

    public function create()
    {
        return view('register.create');
    }
}
