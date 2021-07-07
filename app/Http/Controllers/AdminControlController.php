<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminControlController extends Controller
{
    //
    public function index()
    {
        return view("admin.adminControl");
    }
}
