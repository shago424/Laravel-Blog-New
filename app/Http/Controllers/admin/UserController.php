<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
class UserController extends Controller
{
    public function index(){
    
    $users = User::with('role')->get();
    $roles = Role::all();

        return view('admin.view-user',compact('users','roles'));

    }

     public function update(Request $request,$id)
    {
        // $this->validate($request, [
        //     // 'user_id' => 'required|unique:users'.$id,
        //     // 'email' => 'required|unique:users'.$id,
        //     'role_id' => 'required',
            
        // ]);

        $user = User::find($id);
        if(Auth::user()->id ==$id){
            Toastr::error('Error', 'Upadated No Permission');
            return redirect()->back();
        }
        $user->user_id = $request->user_id;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->updated_by = Auth::user()->id;
        $user->save();

        Toastr::success('Success', 'User Updated Successfully');
            return redirect()->back();

     
       

    }

     public function delete($id)
    {
     
        $user = User::find($id);
        if(Auth::user()->id ==$id){
            return back()->with('error','Admin Delete No Permission');
        }
        $user->delete();
        Toastr::success('Success', 'User Deleted Successfully');
            return redirect()->back();
      
       

    }
}
