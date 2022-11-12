<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Resort;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //
    public function addStudent(){
        return view('student.add');
    }

    public function addStudentSubmit(Request $request){
        $this->validate($request,
        [
            'name'=>'required|regex:/^[A-Z a-z]+$/',
        ],
        [
            'name.required'=>'Please provide the studnet name'
        ]);
        $student = new Student();
        $student->name = $request->name;
        // if($req->hasfile('image')){
        //     $file = $req->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('uploads/resorts', $filename);
        //     $resort->image = $filename;
        // }
        $student->save();
        session()->flash('msg', 'Student Added Succesful');
        return redirect()->route('student.list');
    }

    public function stduentList(){
        $students = Student::all();
        return view('student.list')->with('students',$students);
    }

    public function list(){
        $students = Student::all();
        return view('list')->with('students',$students);
    }


    public function listSubmit(Request $request){
        //dd($req->all());
        for($i=0; $i<count($request->attendance); $i++){
           $att = new Attendance;

           $att->student_id = $request->student[$i];
           $att->status = $request->attendance[$i];
           if($att->save()){
                //return "Added to DB";
           }
        }
        //DB::table('attendances')->insert($data);
    }

    public function attendances($id){
            // dd($id);
            $attendance = Attendance::where('student_id', $id)->get();
            return view('show')->with('attendance', $attendance);
        }
}
