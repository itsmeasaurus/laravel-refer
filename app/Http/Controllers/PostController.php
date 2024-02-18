<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(9)->withQueryString(),
            // 'categories' => Category::all()
        ]); 
    }

    public function detail(Post $post)
    {
        return view('posts.detail',[
            'post' => $post
        ]);
    }
}
