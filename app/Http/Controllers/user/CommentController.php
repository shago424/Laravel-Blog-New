<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
use App\Models\Comment;
use Str;
use Storage;
class CommentController extends Controller
{
    public function index(){
    
    $comments = Comment::where('user_id',Auth::user()->id)->orderby('id','DESC')->get();
        return view('user.comment.view-comment',compact('comments'));

    }

    public function delete($id){
    
     
        $comment = Comment::findorfail($id);
        
        if($comment->user->id == Auth::user()->id){
             $comment->delete();
        Toastr::success('Comment Deleted Successfully');
            return redirect()->back();
        }else{
        Toastr::success('You can not  delete this comment');
            return redirect()->back();
        }
       
      
       

    }


     public function active($id){
         $comment = comment::findorfail($id);
         $comment->status = 1;
         $comment->save();
        Toastr::success('Comment Activated Successfully');
            return redirect()->back();
    }

    public function inactive($id){
        $comment = Comment::findorfail($id);
         $comment->status = 0;
         $comment->save();
        Toastr::success('Comment Inactivated Successfully');
            return redirect()->back();
    }
}
