<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogPostController extends Controller
{
    //
    public function get_blog_posts()
    {
        return response()->json([

            'posts' => Post::where([
                ['approval', 1],
                ['is_deleted', 0]
                ])
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.*')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(4)

        ], Response::HTTP_OK);
        

    }
}
