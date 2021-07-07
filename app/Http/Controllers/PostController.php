<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
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
        $post->approval = 0;
        $post->is_deleted = 0;
        $post->image_name = $imageName;
        $post->save();
        return redirect()->route('home')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function update(Request $request)
    {
        $updatePost = Post::where('id', $request->post_id)->first();

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

        
        $updatePost->title = $request->title;
        $updatePost->content = $request->description;
        $updatePost->approval = 1;
        $updatePost->image_name = $imageName;
        $updatePost->created_at = $updatePost->created_at;
        $updatePost->updated_at = Carbon::now()->toDateTimeString();
        $updatePost->save();

        return redirect()->route('admin.home')
            ->with('success', 'Product updated successfully');
    }

    public function delete(Request $request)
    {
        $deleteablePost = Post::where('id', $request->post_id)->first();
        $user = User::where('id', $deleteablePost->user_id)->first();
        $deleteablePost->is_deleted = 1;
        $deleteablePost->save();


        if($user->isAdmin == 0)
        {
            return redirect()->route('admin.control.index')
            ->with('success', 'Product deleted successfully');
        }
        else
        {
            return redirect()->route('admin.home')
            ->with('success', 'Product deleted successfully');
        }

        
    }
}
