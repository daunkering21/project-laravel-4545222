<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // public function index(){

    //     return view('posts', [
    //         "title" => "All Posts",
    //         "active" => "posts",
    //         "posts" => Post::latest()->filter(request(['search','category','user']))->get()
    //     ]);
    // }
    public function index(){

        return view('posts', [
            "title" => "All Posts",
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search','category','user']))->paginate(7)->withQueryString()
        ]);
    }
    public function show(Post $post){
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
    
}
