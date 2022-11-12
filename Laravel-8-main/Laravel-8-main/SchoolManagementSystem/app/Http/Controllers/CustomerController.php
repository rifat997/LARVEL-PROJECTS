<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resort;

class CustomerController extends Controller
{
    //
    public function resortList(){
        $resorts = Resort::all();
        return view('customer.panel')->with('resorts',$resorts);
    }
}
