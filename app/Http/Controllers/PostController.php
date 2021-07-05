<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

class PostController extends Controller
{
    
    public function index()
    {
        return view('dashboard');
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
        return redirect(route('home'))->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
