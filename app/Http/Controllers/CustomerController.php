<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use Illuminate\Support\Facades\Auth;

use App\User;
use Brian2694\Toastr\Facades\Toastr;

class CustomerController extends Controller
{
    public function PenddingCustomers(){
      if(Auth::user()->role_id==1){
        $agents=User::with('role')->where('delete_status',1)->where('role_id','!=', '1')->where('id','!=', Auth::user()->id)->get();
        $customers=Customer::where('delete_status',1)->where('pendding_status',0)->get();
        return view('dashboard.pages.pendding-customers',compact('customers','agents'));
      }else{
        return back();
      }
      }
    public function index(){
      if(Auth::user()->role_id==1){
        $customers=Customer::with('agent')->where('delete_status',1)->where('pendding_status',1)->get();
      }else{
        $customers=Customer::where('delete_status',1)->where('pendding_status',1)->where('agent_id',Auth::user()->id)->get();
      }
        return view('dashboard.pages.customers',compact('customers'));
      }
      public function role(){
        return $role=Role::all();
      }
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
      public function edit($id){
        return $customer=Customer::findOrFail($id);
      }
      public function update(Request $request){
        // return $request;
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required|min:6',
            'email'=>'required',
            'alternate_no'=>'required',
            'courier_address'=>'required',
        ]);
        $customer=Customer::findOrFail($request->id);
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
        Toastr::success('Update customer successful','Success');
        return back();
      }
      public function SoftDelete($id){
        $customer=Customer::findOrFail($id);
          if ($customer->delete_status==1){
            $customer->delete_status=0;
          }else{
            $customer->delete_status=1;
          }
        $customer->save();
        Toastr::success('Delete Customer successful','Success');
      return back();
      }

      public function AcceptCustomers(Request $request){
          $customer=Customer::findOrFail($request->id);
         if($customer && !empty($request->agent_id)){
           $customer->pendding_status=1;
           $customer->agent_id=$request->agent_id;
           $customer->save();
           Toastr::success('Accept Customer successful','Success');
            return back();
         }else{
          Toastr::error('You have something wrong','Error');
          return back();
         }
      }
}
