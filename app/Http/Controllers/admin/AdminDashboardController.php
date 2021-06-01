<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class AdminDashboardController extends Controller
{
    public function index(){
    
        return view('admin.layouts.home');

    }

     public function profile(){
    
    $user = User::find(Auth::user()->id);
        return view('admin.profile.view-profile',compact('user'));

    }
}
