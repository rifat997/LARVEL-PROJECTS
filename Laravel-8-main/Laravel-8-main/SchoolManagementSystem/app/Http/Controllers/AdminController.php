<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Resort;
use App\Models\Attendance;
use Illuminate\Support\Facades\File;
use DB;

class AdminController extends Controller
{
    //
    public function panel(){
        return view('admin.panel');
    }

    public function login(){
        return view('admin.login');
    }
    public function loginSubmit(Request $req){
        $this->validate($req,
        [
            'name'=>'required|regex:/^[A-Z a-z]+$/',
            'password'=>'required|min:6'
            //"email"=>"required|email|unique:officers,email",
        ],
        [
            'name.required'=>'Please provide name',
            'name.max'=>'Username must not exceed 10 alphabets'
        ]);
        if($req->name == 'aunoy' && $req->password == '123456'){
            session()->flash('msg', 'Login Succesful');
            return redirect()->route('admin.panel');
        }
        return "Invalid username or password";
    }  

    public function resortList(){
        $resorts = Resort::all();
        return view('resort.list')->with('resorts',$resorts);
    }

    public function addResort(){
        return view('resort.add');
    }

    public function addResortSubmit(Request $req){
        $this->validate($req,
        [
            'name'=>'required|regex:/^[A-Z a-z]+$/',
            'image'=>'required|mimes:jpg,png',
        ],
        [
            'name.required'=>'Please provide the resort name'
        ]);
        $resort = new Resort();
        $resort->name = $req->name;
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/resorts', $filename);
            $resort->image = $filename;
        }
        $resort->save();
        session()->flash('msg', 'Prduct Add Succesful');
        return redirect()->route('resort.list');
    }

    public function deleteResort(Request $req){
        $resort = Resort::where('id',($req->id))->delete();
        session()->flash('msg3','Resort deleted successfully!');
        return redirect ()->route ('resort.list');
    }

    public function editResort(Request $req){
        $resort = Resort::where('id', $req->id)->first();
        return view('resort.edit')->with('resort', $resort);
    }

    public function editResortSubmit(Request $req){
        $resort = Resort::where('id', $req->id)->first();
        $resort->name=$req->name;
        if($req->hasfile('image')){
            $destination = 'uploads/resorts'.$resort->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/resorts', $filename);
            $resort->image = $filename;
        }
        $resort->save();
        return redirect ()->route ('resort.list');
    }

    public function list(){
        $resorts = Resort::all();
        return view('list')->with('resorts',$resorts);
    }

    public function listSubmit(Request $request){
        //dd($req->all());
        for($i=0; $i<count($request->attendance); $i++){
           $att = new Attendance;

           $att->resort_id = $request->resort[$i];
           $att->status = $request->attendance[$i];
           if($att->save()){
                //return "Added to DB";
           }
        }
        //DB::table('attendances')->insert($data);
    }

    // public function attendances(Request $request){
    //     $attendance = Attendance::where('resort_id', $request->id)->get();
    //     return view('show')->with('attendance', $attendance);
    // }
    // public function attendances($id){
    //     // dd($id);
    //     $attendance = Attendance::where('student_id', $id)->get();
    //     return view('show')->with('attendance', $attendance);
    // }
}