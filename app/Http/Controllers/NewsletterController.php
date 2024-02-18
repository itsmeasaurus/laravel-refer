<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {

        request()->validate([
            'email' => 'required|email'
        ]);
    
        try {
            $newsletter->subscribe(request('email'));
        }
        catch(\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Your provided email cannot be used in our system'
            ]);
        }
    
        return redirect('/')->with('success','You are successfully subscribed');
    }
}
