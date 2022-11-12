<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
    //
    public function front(){
        return view('front.index');
    }

    public function createBlog(){
        return view('front.createblog');
    }
    
    public function createBlogSubmit(Request $request){

    }

    public function home(){
        return view('front.home');
    }
}
