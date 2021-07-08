<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControlController extends Controller
{
    //
    public function index()
    {
        $currentUser = User::where('id', Auth::id())->first();

        if($currentUser->isSuperAdmin == 1)
        {
            $users=User::get();
        }
        else
        {
            $users=User::where('isAdmin', 0)->get();
        }
    
        $unApprovedPosts=Post::where([
            ['approval', '=', 0],
            ['is_deleted', '=', 0]])
        ->join('users', function ($join) {
            $join->on('posts.user_id', '=', 'users.id')
                 ->where('users.isAdmin', '=', 0);
        })
        ->select('users.*', 'posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        return view('admin.adminControl', ['users'=>$users, 'unApprovedPosts'=>$unApprovedPosts]);
    }

    public function change(Request $request)
    {
        $user=User::where('id', $request->user_id)->first();

        if($user->isAdmin == 1){
            $user->isAdmin = 0;
        }
        else
        {
            $user->isAdmin = 1;
        }

        $user->save();

        return redirect()->route('admin.control.index')->with('status', 'Stutus changed');
    }

    public function approve(Request $request)
    {
        $post=Post::where('id', $request->post_id)->first();

        $post->approval = 1;
        $post->save();

        return redirect()->route('admin.control.index')->with('status', 'Approved');
    }

}
