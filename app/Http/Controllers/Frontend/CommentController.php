<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function commentstroe(Request $request, $post){

        $this->validate($request,[ 'comment' =>'required']);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success','Comment Sent Successfully');

    }
}
