<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function  getCustomer(){


        return view('name');
    }
    
    public function customerList(){
        $name = 'alishhdiasnicjln';
        $time = 20;
        $customers = ['Rifat', 'Antu', 'Dil', 'Aunoy'];
        return view('customer/customerList')->with('c', $customers)->with('name', $name)->with('t', $time);
    }

    public function customer(Request $req){
        return view('customer/customerName')->with('abc',$req->id);
    }

    public function dynamicCustomer(Request $reqqq){
        $na = $reqqq->name;
        $idd = $reqqq->id;
       return view('customer/dynamic')
       ->with('n',  $na)
       ->with('i', $idd );
    }







    ///new 
    public function addCustomer(){
        return view('customer.addcustomer');
    }

    public function addCustomerSubmit(Request $req){
 
        $this->validate($req,
            [
                'name' => 'required',
                'userName' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
                'email' => 'required',
                'phoneNumber' => 'required',
                'nidNo' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'age' => 'required'
            ],
            [
                'name.required' => 'Please provide your name',
                'userName.required' => 'Please provide your user name',
                'password.required' => 'Please enter password',
                'confirm_passworde.required' => 'Password did not match!',
                'email.required' => 'Please provide your email',
                'phoneNumber.required' => 'Please provide your contact number',
                'nidNo.required' => 'Please provide your nid number',
                'address.required' => 'Please provide your address',
                'gender.required' => 'Please provide your gender',
                'age.required' => 'Please provide your age'
            ]
        );

        $customer = new Customer();
        $customer->name = $req->name;
        $customer->userName = $req->userName;
        $customer->password = $req->password;
        $customer->email = $req->email;
        $customer->phoneNumber = $req->phoneNumber;
        $customer->nidNO = $req->nidNo;
        $customer->address = $req->address;
        $customer->gender = $req->gender;
        $customer->age = $req->age;
        $customer->image = "123";
        $customer->save();
    }


    
}
