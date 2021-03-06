<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $myposts = Post::where('user_id', Auth::id())
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // ->select('users.*', 'posts.*')
        // ->orderBy('posts.created_at', 'desc')
        // ->paginate(4);
        // return view('home', ['myposts'=>$myposts]);
        $myposts = Post::where([
            ['user_id', '=', Auth::id()],
            ['is_deleted', '=', 0],])
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->paginate(4);
        return view('home', ['myposts'=>$myposts]);
    }


    public function adminIndex()
    {
        $myposts = Post::where([
            ['user_id', '=', Auth::id()],
            ['is_deleted', '=', 0],])
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->paginate(4);
        return view('admin.adminHome', ['myposts'=>$myposts]);
    }
}
