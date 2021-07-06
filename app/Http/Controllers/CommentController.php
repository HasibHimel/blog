<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    
    public function create_comment(Request $request)
    
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect(route('blogDetails', ['post_id'=>$request->post_id]))->with('status', 'Blog Post Form Data Has Been inserted');
    }

    // public function comments_of_a_post(){

    //     $comments=Comment::join('users', 'users.id', '=', 'comments.user_id')
    //     ->join('posts', 'posts.id', '=', 'comments.post_id')
    //     ->select('users.*', 'posts.*', 'comments.*')
    //     ->orderBy('comments.created_at', 'desc')
    //     ->paginate(4);
    //     // dd($comments);

    //     return view('frontend.blogDetails', ['comments'=>$comments]);
    // }
  
}

