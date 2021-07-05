<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    

    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->description;
        $post->user_id = Auth::id();
        $post->view = 125;
        $post->approval = 1;
        $post->image_name = "blog-4-720x480.jpg";
        $post->save();
        return redirect(route('home'))->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
