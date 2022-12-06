<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }
    
    public function create(Post $post) {
        return view('posts.create', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'text' => 'required'
        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'text' => $request->text,
        ]);

        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post) {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'text' => $request->text,
        ]);

        return back();

    }
    
    public function destroy(Post $post) {
        $post->delete();
        return back();
    }
}
