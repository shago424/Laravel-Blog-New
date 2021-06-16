<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Str;
use Toastr;
class ContactController extends Controller
{
    public function index(){
    
    $contacts = contact::orderby('id','DESC')->get();
        return view('admin.contact.view-contact',compact('contacts'));

    }

    public function delete($id){
     
        $contact = Contact::findorfail($id);
        
        $contact->delete();
        Toastr::success('Contact Deleted Successfully');
            return redirect()->back();  

    }

}
