<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Bookedroom;
use App\Models\Review;
use App\Models\Gym;
use App\Models\Spa;
use App\Models\Question;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Session;

class CustomerController extends Controller
{
    public function  getCustomer(){
        return view('');
    }
    //API for signup
    public function addCustomer(Request $req){
        $customer = new Customer();
        $customer->name = $req->name;
        $customer->userName = $req->userName;
        $customer->password = md5($req->password);
        $customer->email = $req->email;
        $customer->phoneNumber = $req->phoneNumber;
        $customer->nidNo = $req->nidNo;
        $customer->address = $req->address;
        $customer->gender = $req->gender;
        $customer->age = $req->age;
        $customer->image = $req->image;//"abc.jpg"//$req->image;//"storage/image/".$filename;
        if($customer->save()){
            return response()->json(["msg"=>"Added Successfully"]);
        }
        return response()->json(["msg"=>"Unsuccessfull"]);
    }

    //API for Login
    public function login(Request $req){
        $this->validate($req,
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'password'=>'required|min:4',
            ],
            [
                'name.required'=>'Please provide name',
                'password.required'=>'Please provide password',
                'password.min'=>'Atleast 4 characters required'
            ]
        );
        $customer = Customer::where('name', $req->name)->where('password', md5($req->password))->first();
        if($customer){
            session()->put('logged_name', $customer->name);
            session()->put('logged_password', $customer->password);
            return response()->json(["logged_employee"=>$customer,"logged_session"=>session()->get('name')]);
        }
        else return "Login Failed";

    }
///Profile
    public function customerProfile(){
        $name =  Session::get('logged_name');
        $password = Session::get('logged_password');
        $customer = Customer::where('name', $name)->where('password', $password)->first();
        //return $customer;
        return view('customer.profile')->with('customer', $customer);
    }
    public function customerPanel(){
        return view('customer.customerpanel');
    }

    public function cusotmerLogout(){
        session::flush();
        return redirect()->route('customer.login.submit');
    }

    public function customerRoomBookSubmit(Request $req){
        
        $room = new Bookedroom();
        $room->RoomNo = $req->RoomNo;
        $room->Branch = $req->Branch;
        $room->NID = $req->NID;
        $room->Address = $req->Address;
        $room->Email = $req->Email;
        $room->Phone = $req->Phone;
        $room->CIT = $req->CIT;
        $room->COT = $req->COT; 
        $room->save();

        return redirect()->route('customer.room.book.list');
    }

    public function customerRoomBook(Request $req)
    {
        //$validator= Validator::make($req->all(),[
        $validator = Validator::make($req->all(),[
            "RoomNo"=>"required",
            "Branch"=>"required",
            "NID"=>"required",
            "Address"=>"required",
            "Email"=>"required",
            "Phone"=>"required",
            "CIT"=>"required",
            "COT"=>"required"
        ]);


        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
    
        $room = new Bookedroom();
        $room->RoomNo = $req->RoomNo;
        $room->Branch = $req->Branch;
        $room->NID = $req->NID;
        $room->Address = $req->Address;
        $room->Email = $req->Email;
        $room->Phone = $req->Phone;
        $room->CIT = $req->CIT;
        $room->COT = $req->COT; 

        // if($gym->save()){
        //     return response()->json(["msg"=>"Gym Schedule Added Successfully"]);
        // }
        
        $room->save();
        return response()->json(
            [
                "msg"=>"Room Added Successfully"
                //"data"=>$room        
            ]
        );
    }

    public function customerRoomBookList(Request $req){
        $room = Bookedroom::all();
        return response()->json($room);
        //return view('customer.roombooklist')->with('room', $room);
    }
    public function customerRoomBookDelete(Request $req){
        $id = $req->id;
        $room = Bookedroom::where('id', $id)->delete();
        return response()->json(["msg"=>"Room Deleted Successfully"]);
    }

    public function customerRoomBookEditSubmit(Request $req){
        $room = Bookedroom::where('id', $req->id)->first();
        $room->RoomNo = $req->RoomNo;
        $room->Branch = $req->Branch;
        $room->NID = $req->NID;
        $room->Address = $req->Address;
        $room->Email = $req->Email;
        $room->Phone = $req->Phone;
        $room->CIT = $req->CIT;
        $room->COT = $req->COT; 
        $room->save();

        return redirect ()->route ('customer.room.book.list');
    }

    
    
    public function customerRoomBookEdit(Request $req){
        $room = Bookedroom::where('id', $req->id)->first();
        $room->RoomNo = $req->RoomNo;
        $room->Branch = $req->Branch;
        $room->NID = $req->NID;
        $room->Address = $req->Address;
        $room->Email = $req->Email;
        $room->Phone = $req->Phone;
        $room->CIT = $req->CIT;
        $room->COT = $req->COT; 
        if($room->save()){
            return response()->json(["msg"=>"Room Edited Successfully"]);
        }
        return response()->json(["msg"=>"Unsuccessfull"]);

    }



  ///review
    public function customerReview(){
        return view('customer.review');
    }

    public function customerReviewSubmit(Request $req){
        
        $review = new Review();
        $review->Name = $req->Name;
        $review->Email = $req->Email;
        $review->Subject = $req->Subject;
        $review->Message = $req->Message;
        $review->Rating = $req->Rating; 
        $review->save();

        return redirect()->route('customer.review.list');
    }

    public function customerReviewList(Request $req){
        $review = Review::all();
        return response()->json($review);
		//return view('customer.reviewlist')->with('review', $review);
    }

///Room categories
    public function rooms(){
        return view('customer.rooms');
    }
    public function addGymSubmit(Request $req){
        $gym = new Gym();
        $gym->schedule = $req->schedule; 
        $gym->save();
        //return $gym;
        return redirect()->route('customer.gym.list');
    }
	
	//gym

    public function addGym(Request $req){
        $gym = new Gym();
        $gym->schedule = $req->schedule; 
        if($gym->save()){
            return response()->json(["msg"=>"Gym Schedule Added Successfully"]);
        }
        return response()->json(["msg"=>"Unsuccessfull"]);
    }

    public function gymList(){
        $gym = Gym::all();
		return response()->json($gym);
        //return $gym;
        //return view('customer.gymlist')->with('gym', $gym);
    }
    public function customerGymEditSubmit(Request $req){
        $gym = Gym::where('id', $req->id)->first();
        $gym->schedule = $req->schedule; 
        $gym->save();

        return redirect ()->route ('customer.gym.list');
    }

    public function customerGymEdit(Request $req){
        $gym = Gym::where('id', $req->id)->first();
        $gym->schedule = $req->schedule;

        if($gym->save()){
            return response()->json(["msg"=>"Gym Schedule Edited Successfully"]);
        }
        return response()->json(["msg"=>"Unsuccessfull"]);
    }

    public function customerGymDelete(Request $req){
        $id = $req->id;
        $gym = Gym::where('id', $id)->delete();
        return response()->json(["status"=>200, "msg"=>"Gym Schedule Deleted Successfully"]);

    }

public function addSpaSubmit(Request $req){
    $spa = new Spa();
    $spa->schedule = $req->schedule; 
    $spa->save();
    //return $gym;
    return redirect()->route('customer.spa.list');
}

public function addSpa(Request $req){
    $spa = new Spa();
    $spa->schedule = $req->schedule; 
    if($spa->save()){
        return response()->json(["msg"=>"Spa Schedule Added Successfully"]);
    }
    return response()->json(["msg"=>"Unsuccessfull"]);
}

public function spaList(){
    $spa = Spa::all();
    return $spa;
}


public function customerSpaEditSubmit(Request $req){
    $spa = Spa::where('id', $req->id)->first();
    $spa->schedule = $req->schedule; 
    $spa->save();

    return redirect ()->route ('customer.spa.list');
}

public function customerSpaEdit(Request $req){
    $spa = Spa::where('id', $req->id)->first();
    $spa->schedule = $req->schedule; 
    if($spa->save()){
        return response()->json(["msg"=>"Spa Schedule Edited Successfully"]);
    }
    return response()->json(["msg"=>"Unsuccessfull"]);
}

public function customerSpaDelete(Request $req){
    $id = $req->id;
    $spa = Spa::where('id', $id)->delete();
    return response()->json(["msg"=>"Spa Schedule Deleted Successfully"]);

}

///Food Order
public function orderFood(){
    return view('customer.orderfood');
}

///Question
public function customerQues(){
    return view('customer.ques');
}

public function customerQuesSubmit(Request $req){
    
    $ques = new Question();
    $ques->userName = $req->userName;
    $ques->question = $req->question;
    $ques->save();

    return redirect()->route('customer.panel');
}

public function customerQuesList(Request $req){
    $ques = Question::all();
    return view('customer.queslist')->with('ques', $ques);
}


//Home page
public function home(){
    return view('customer.Home');  
}


///Gallery
public function gallery(){
    return view('customer.gallery'); 

}

    ///Mail Send
    public function mail(){
        return view('customer.sendmail');
    }
    public function mailSubmit(Request $req){
        $e_sub = $req->e_sub;
        $e_body = $req->e_body;
        $to = $req->to;
        Mail::to($to)->send(new SendMail($e_sub, $e_body));
        return view('customer.successful');
    }

}