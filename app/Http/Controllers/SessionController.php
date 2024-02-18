<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('session.create');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => ['required','max:255','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)) {
            return redirect('/')->with('success','Welcome Back!');
        }

        throw ValidationException::withMessages(['email'=>'Your provided email address is not valid to our system']);
        // return redirect()->back()
        //         ->withInput()
        //         ->withErrors(['email'=>'Your provided email address is not valid to our system']);
    }

    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success','Logout Successfully!');
    }
}
