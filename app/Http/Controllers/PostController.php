<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

class PostController extends Controller
{
    
    public function index()
    {
        return view('frontend.editPost');
    }

    public function get_a_post_by_id(Request $request)
    {
        $post = Post::where('id', $request->post_id)->first();
        return view('frontend.editPost', compact('post'));
    }

    public function store(Request $request)
    {
        $post = new Post;
        $imageName = null;


        if ($request->hasFile('image')) {

            // $request->validate([
            //     'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            // ]);
            $imageName = time().'.'.$request->image->getClientOriginalName();

            

            // $file = is_string($file) ? new File($file) : null;

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->image->move('img', $imageName);
        }

        $post->title = $request->title;
        $post->content = $request->description;
        $post->user_id = Auth::id();
        $post->view = 125;
        $post->approval = 1;
        $post->image_name = $imageName;
        $post->save();
        return redirect()->route('home')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function update(Request $request)
    {
        $UpdatePost = Post::where('id', $request->post_id)->first();

        $imageName = null;
  

        if ($request->hasFile('image')) {

            // $request->validate([
            //     'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            // ]);
            $imageName = time().'.'.$request->image->getClientOriginalName();

            

            // $file = is_string($file) ? new File($file) : null;

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->image->move('img', $imageName);
        }

        
        $UpdatePost->title = $request->title;
        $UpdatePost->content = $request->description;
        $UpdatePost->approval = 1;
        $UpdatePost->image_name = $imageName;
        $UpdatePost->created_at = $UpdatePost->created_at;
        $UpdatePost->updated_at = Carbon::now()->toDateTimeString();
        $UpdatePost->save();

        return redirect()->route('dashboard')
            ->with('success', 'Product updated successfully');
    }
}
