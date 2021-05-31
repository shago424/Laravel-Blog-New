<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
use App\Models\Category;
use App\Models\Post;
use Str;
use Storage;
Use Image;
use Carbon\Carbon;
class PostController extends Controller
{
     public function index(){
    
        $posts = Post::with('user')->latest()->get();
        $categories = Category::orderby('name','ASC')->get();
        return view('admin.post.view-post',compact('posts','categories'));

    }


     public function create(){
    
       $categories = Category::orderby('name','ASC')->get();
        return view('admin.post.add-post',compact('categories'));

    }


     public function store(Request $request)
    {

       $this->validate($request, [
            'title' => 'required',
             'image' => 'required|sometimes|image|mimes:png,jpg,jpeg,bmp',
            // 'slug' => 'required',
            'body' => 'required',
            'tag' => 'required',
            
        ]);


        // image
        $slug = Str::slug($request->title, '-');
        $image = $request->image;
        $imageName = $slug . '-'  . uniqid() . Carbon::now()->timestamp . '.' .$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('post')){
            Storage::disk('public')->makeDirectory('post');
        }

        $img = Image::make($image)->resize(752, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->stream();


        Storage::disk('public')->put('post/' . $imageName, $img);


        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id; 
        $post->slug = $slug;
        $post->body = $request->body;
        $post->tag = $request->tag;
        $post->user_id = Auth::user()->id;
        $post->image = $imageName;
        $post->save();

        if($post){
             Toastr::success('Post Added Successfully');
            return redirect()->back(); 
        }else{
                 Toastr::error('Post Added Not Successfully');
            return redirect()->route("post.list"); 
        }

       

    }

       public function edit($id){
        $post = Post::find($id);
       $categories = Category::orderby('name','ASC')->get();
        return view('admin.post.edit-post',compact('post','categories'));

    }

     public function update(Request $request,$id)
    {

        if($request->title == Post::findorfail($id)->title){
            $this->validate($request, [
            'title' => 'required',
            // 'image' => 'sometimes|image|mimes:png,jpg,jpeg,bmp',
           
            'body' => 'required',
            
        ]);

        }else{
             $this->validate($request, [
            'title' => 'required|unique:posts',
            // 'image' => 'sometimes|image|mimes:png,jpg,jpeg,bmp',

            'body' => 'required',
            
        ]);

        }

       
        $post = Post::findorfail($id);
     $slug = Str::slug($request->title, '-');

     
        if(isset($request->image)){

        // image
       
        $image = $request->image;
        $imageName = $slug . '-'  . uniqid() . Carbon::now()->timestamp . '.' .$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('post')){
            Storage::disk('public')->makeDirectory('post');
        }

         if(Storage::disk('public')->exists('post/' . $post->image)){
            Storage::disk('public')->delet('post/' . $post->image);
        }

        $img = Image::make($image)->resize(752, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->stream();


        Storage::disk('public')->put('post/' . $imageName, $img);
    }else{

        $request->image = $post->image;

    }
       
        $post->title = $request->title;
        $post->category_id = $request->category_id; 
        $post->slug = $slug;
        $post->body = $request->body;
        $post->tag = $request->tag;
        $post->updated_by = Auth::user()->id;
        $post->image = $imageName;
        $post->save();
        
       

        if($post){
             Toastr::success('Post Updated Successfully');
            return redirect()->back(); 
        }else{
                 Toastr::error('Post Updated Not Successfully');
            return redirect()->back(); 
        }
    }

     public function delete($id){
    
     
        $post = Post::findorfail($id);
        
        $post->delete();
        Toastr::success('Post Deleted Successfully');
            return redirect()->back();
      
       

    }


     public function active($id){
         $post = Post::findorfail($id);
         $post->status = 1;
         $post->save();
        Toastr::success('Post Activated Successfully');
            return redirect()->back();
    }

    public function inactive($id){
        $post = Post::findorfail($id);
         $post->status = 0;
         $post->save();
        Toastr::success('Post Inactivated Successfully');
            return redirect()->back();
    }

}
