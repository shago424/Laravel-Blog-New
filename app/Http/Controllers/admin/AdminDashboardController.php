<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use App\Models\Category;
use Toastr;
use Hash;

use Str;
class AdminDashboardController extends Controller
{
    public function index(){

        $data['posts']= Post::all();
        $data['categories']= Category::all();
        $data['comments']= Comment::latest()->get();
        $data['rcomments']= CommentReply::all();
        $data['users']= User::all();

        return view('admin.layouts.home',$data);

    }

     public function profile(){
    
    $user = User::find(Auth::user()->id);
        return view('admin.profile.view-profile',compact('user'));

    }

     public function profileupdate(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'mobile' => 'required',
            'ocap' => 'required',
            'about' => 'required',
            'name' => 'required',
            // 'user_id' => 'required',
        ]);

         

        $user = User::find(Auth::user()->id);
        // $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->ocap = $request->ocap;
        $user->about = $request->about;

        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->website = $request->website;

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
        
        return view('admin.liked.like-post');
    }
}
