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

}
