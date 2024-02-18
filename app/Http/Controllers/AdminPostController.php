<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id(); // request()->user()->posts()->create() can also be used if we don't want to set user_id manually
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        // $attributes = array_merge($this->validatePost(), [
        //     'user_id' => request()->user()->id,
        //     'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        // ]);

        Post::create($attributes);

        return redirect()->route('admin.posts');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect()->route('admin.posts')->with('success','Post Updated');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Post Delete');
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['required'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
