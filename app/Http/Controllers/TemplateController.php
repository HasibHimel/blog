<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function aboutUs(){
        return view('frontend.aboutUs');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function blogDetails(){
        return view('frontend.blogDetails');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function team(){
        return view('frontend.team');
    }
}
