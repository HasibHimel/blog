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
        $comment->post_id = $request->post_idgit;
        $comment->save();
        return redirect(route('home'))->with('status', 'Blog Post Form Data Has Been inserted');
    }
}

