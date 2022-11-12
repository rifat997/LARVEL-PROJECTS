<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    //
    public function showAuthUser(Request $request){
        //return Auth::user();
        return $request->user();

        //return Auth::user()->name;
        //return Auth::user()->id; 
        //return Auth::id();
    }

    public function checkAuthUser(){
        if(Auth::check()){
            return "User Authenticate User";
        }else{
            return "User does not authenticate";
        }
    }
}
