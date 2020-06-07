<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class AdminController extends Controller
{
  // public function __construct()
  //   {
  //       $this->middleware('guest')->except('logout');
  //   }
    public function index(){
        $admins=User::with('role')->where('delete_status',1)->where('id','!=', Auth::user()->id)->get();
        $roles=Role::where('delete_status',1)->get();
        return view('dashboard.pages.admins',compact('admins','roles'));
      }
      public function role(){
        return $role=Role::all();
      }
      public function store(Request $request){
        // return $request;
        $this->validate($request,[
              'name'=>'required',
              'role_id'=>'required',
              'phone'=>'required|unique:users',
              'address'=>'required|min:6',
              'email'=>'required|email|unique:users',
              'password' => 'required|min:6',
              'image'=>'nullable|image|mimes:jpg,jpeg,png|max:200',
          ]);
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->role_id=$request->role_id;
        $user->creator_id=Auth::user()->id;
        $user->password=Hash::make($request->password);
          $image=$request->file('image');
          if ($image){
              $imageName='/backend/user-image/'.uniqid().$image->getClientOriginalExtension();
              $image->move(public_path() . '/backend/user-image', $imageName);
            $user->image=$imageName;
          }
    $user->save();
    Toastr::success('Create admin successful','Success');
      return back();
      }
      public function edit($id){
        return $user=User::findOrFail($id);
      }
      public function update(Request $request){
        // return $request;
          $this->validate($request,[
              'name'=>'required',
              'phone'=>'required',
              'email'=>'required',
              'image'=>'nullable|image|mimes:jpg,jpeg,png|max:200',
          ]);
        $user=User::findOrFail($request->id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->role_id=$request->role_id;
        $user->password=Hash::make($request->password);
          $image=$request->file('image');
          if ($image){
              $imageName='/backend/user-image/'.uniqid().$image->getClientOriginalExtension();
              if(!empty($image->image)) {
                  if (file_exists(public_path( $image->image))) {
                      unlink(public_path( $image->image));
                  }
              }
              $image->move(public_path() . '/backend/user-image', $imageName);
            $user->image=$imageName;
          }
        $user->save();
    Toastr::success('Update admin successful','Success');
      return back();
      }
      public function SoftDelete($id){
        $user=User::findOrFail($id);
          if ($user->delete_status==1){
            $user->delete_status=0;
            $user->status=0;
          }else{
            $user->delete_status=1;
            $user->status=1;
          }
        $user->save();
        Toastr::success('Delete admin successful','Success');
      return back();
      }
      public function ActiveDe($id){
        $user=User::findOrFail($id);
          if ($user->status==1){
            $user->status=0;
          }else{
            $user->status=1;
          }
        $user->save();
        Toastr::success('Active status Update','Success');
      return back();
      }
}
