<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerAPIController extends Controller
{
    public function store(Request $request){
        // return $request;
        $this->validate($request,[
              'name'=>'required',
              'phone'=>'required',
              'address'=>'required|min:6',
              'email'=>'required',
              'alternate_no'=>'required',
              'courier_address'=>'required',
          ]);
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->pincode=$request->pincode;
        $customer->city=$request->city;
        $customer->state=$request->state;
        $customer->alternate_no=$request->alternate_no;
        $customer->courier_address=$request->courier_address;
        $customer->date=date('y-m-d');
        $customer->save();
        Toastr::success('Create Customer successful','Success');
         return back();
      }
}
