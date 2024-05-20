<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function create() {
        return view('register.create');
    }
    public function store() {
        //

        $attributes = request()->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Your account has been created.');
    }

}
