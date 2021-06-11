<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Toastr;
use Hash;
class UserDashboardController extends Controller
{
    public function index(){
    
        return view('user.layouts.home');

    }

    public function profile(){
    
    $user = User::find(Auth::user()->id);
        return view('user.profile.view-profile',compact('user'));

    }

     public function profileupdate(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'mobile' => 'required',
            'ocap' => 'required',
            'about' => 'required',
            'name' => 'required',
            'user_id' => 'required',
        ]);

         

        $user = User::find(Auth::user()->id);
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->ocap = $request->ocap;
        $user->about = $request->about;

         if ($request->file('image')){
          $file = $request->file('image');
         @unlink(public_path('upload/userimage'.$data->image));
          $filename =date('Ymd').$file->getClientOriginalName();
          $file->move(public_path('upload/userimage'), $filename);
          $user['image'] = $filename;
        }

        $user->save();

        Toastr::success('Profile Updated Successfully');
            return redirect()->back();
  
    }

    public function passwordupdate(Request $request){

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed',
            
        ]);

        $oldPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $oldPassword)){
            if(!Hash::check($request->password, $oldPassword)){
                $user =User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            Toastr::success('Password Updated Successfully');
            return redirect()->back();

        }else{

            Toastr::error('New Password are Not Same Old Password');
            return redirect()->back();
        }
            
        }else{

            Toastr::error('Incorrect Old Password');
            return redirect()->back();
        }
    }

    public function userPostLiked(){
        return view('user.liked.like-post');
    }

}
