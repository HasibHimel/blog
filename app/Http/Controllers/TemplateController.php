<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    //
    public function index(){
        $posts=Post::join('users', 'users.id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->take(3)
        ->get();
        return view('frontend.index', ['posts' => $posts]);
        
    }

    public function aboutUs(){
        return view('frontend.aboutUs');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function blogDetails($id){
        $post=Post::where('id',$id)->get();
        return view('frontend.blogDetails',['post'=>$post]);
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function team(){
        return view('frontend.team');
    }
}
