<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
     public function index()
    {
     $profile=User::with('role')->findOrFail(Auth::user()->id);
       return view('dashboard.auth-pages.profile',compact('profile'));
    }
    public function update(Request $request){
        // return $request;
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
        ]);
      $user=User::findOrFail(Auth::user()->id);
      $user->name=$request->name;
      $user->phone=$request->phone;
      $user->email=$request->email;
      $user->address=$request->address;
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
      Toastr::success('Profile updated','Success');
      return back();
    }
    public function SoftDelete($id){
      $user=User::findOrFail($id);
        if ($User->delete_status==1){
          $user->delete_status=0;
          $user->status=0;
        }else{
          $user->delete_status=1;
          $user->status=1;
        }
      $user->save();
        return response()->json(['success']);
    }
    public function ProfilePasswordUpdate(Request $request){
       
      $this->validate($request, [
          'oldPassword' => 'required',
          'password' => 'required|confirmed'
      ]);
      
      $hashedPassword = Auth::user()->password;
      if (Hash::check($request->oldPassword, $hashedPassword))
      {
          if (!Hash::check($request->password,$hashedPassword))
          {
              $user = User::find(Auth::user()->id);
              $user->password = Hash::make($request->password);
              $user->save();
              Auth::logout();
            return redirect()->route('login');
          }else{
            //   return response()->json(['newnotmatch']);
        Toastr::error('Your new password not match','Info');
        return back();
          }
      }else{
        Toastr::error('Your Old Password Not match','Info');
        return back();
        //   return response()->json(['oldnotmatch']);
      }

  }
}
