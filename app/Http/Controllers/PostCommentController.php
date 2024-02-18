<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request) {
        request()->validate([
            'body' => 'required'
        ],[
            'body.required' => "Please provide your comment"
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => request()->input('body')
        ]);

        return back();
    }
}
