<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    //
    public function login(){
        return view('author.login');
    }

    public function loginsubmit(Request $req){
        $this->validate($req,
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'password'=>'required|min:4',
            ],
            [
                'name.required'=>'Please provide name',
            ]
        );
        
        $of = Author::where('name', $req->name)->where('password', $req->password)->first();
        if($of){
            //session()->put('logged', $of->name);
            //session()->put('pass', $req->password);
            return redirect()->route('front.home');
            //return "Success";
        }

        session()->flash('msg', 'username password invalid');
        return redirect()->route('login.submit');
    }
}
