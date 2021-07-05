<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $posts=Post::join('users', 'users.id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->paginate(4);

        return view('frontend.blog', ['posts'=>$posts]);
    }

    public function blogDetails($id){
        $post=Post::where('id',$id)->get();

        $comments=Comment::where('post_id',$id)
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->join('posts', 'posts.id', '=', 'comments.post_id')
        ->select('users.*', 'posts.*', 'comments.*')
        ->orderBy('comments.created_at', 'desc')
        ->paginate(4);

        return view('frontend.blogDetails',['post'=>$post, 'comments'=>$comments]);
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function team(){
        return view('frontend.team');
    }
}
