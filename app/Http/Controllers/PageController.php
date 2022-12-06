<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        // dd($request->all());
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')
            ->latest()
            ->paginate();
        return view('home', ['posts' => $posts]);
    }

    public function blog()
    {
        // $posts = Post::get();
        // $posts = Post::first();
        // $posts = Post::find(25);


        // dd($posts);

        // return view('blog', ['posts' => $posts]);
        return view('blog');
    }

    public function post(Post $post)
    {
        return view('blogDetail', ['post' => $post]);
    }
}
