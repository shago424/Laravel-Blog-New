<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
use App\Models\Comment;
use App\Models\CommentReply;
use Str;
use Storage;
class CommentReplyController extends Controller
{
      public function index(){
    
    $replies = CommentReply::where('user_id',Auth::user()->id)->orderby('id','DESC')->get();
    return view('user.commentreply.view-commentreply',compact('replies'));

    }

    public function delete($id){
    
     
        $reply = CommentReply::findorfail($id);
        if($reply->user->id == Auth::user()->id){

        $reply->delete();
        Toastr::success('Comment Reply Deleted Successfully');
            return redirect()->back();
        }else{
        
        Toastr::error('You can not  delete this comment');
            return redirect()->back();
        }
        
        
      
       

    }


     public function active($id){
         $reply = CommentReply::findorfail($id);
         $reply->status = 1;
         $reply->save();
        Toastr::success('Comment Reply Activated Successfully');
            return redirect()->back();
    }

    public function inactive($id){
        $reply = CommentReply::findorfail($id);
         $reply->status = 0;
         $reply->save();
        Toastr::success('Comment Reply Inactivated Successfully');
            return redirect()->back();
    }
}
