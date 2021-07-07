<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminControlController extends Controller
{
    //
    public function index()
    {
        $users=User::get();
        return view('admin.adminControl', ['users'=>$users]);
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

}
