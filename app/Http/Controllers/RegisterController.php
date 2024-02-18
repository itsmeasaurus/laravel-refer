<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required','max:255','min:3'],
            'username' => ['required','max:255','min:4',Rule::unique('users','username')],
            'email' => ['required','max:255','email',Rule::unique('users','email')],
            'password' => ['required','max:255','min:7'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Successfully registered');
    }
}