<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
use App\Models\Comment;
use Str;
use Storage;
use App\Models\CommentReply;
class CommentReplyController extends Controller
{
    public function index(){
    
    $replies = CommentReply::with('post')->orderby('id','DESC')->get();
        return view('admin.commentreply.view-commentreply',compact('replies'));

    }

    public function delete($id){
    
     
        $reply = CommentReply::findorfail($id);
        
        $reply->delete();
        Toastr::success('Comment Reply Deleted Successfully');
            return redirect()->back();
      
       

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
