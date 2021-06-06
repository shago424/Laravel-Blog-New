<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\CommentReply;
class CommentReplyController extends Controller
{
    public function commentreplystroe(Request $request, $comment){

        $this->validate($request,[ 'message' =>'required']);

        $reply = new CommentReply();
        $reply->comment_id = $comment;
        $reply->user_id = Auth::user()->id;
        $reply->message = $request->message;
        $reply->save();

        return redirect()->back()->with('message','Comment Reply Sent Successfully');

    }
}
