<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Toastr;
use App\Models\Category;
use Str;
use Storage;
class CategoryController extends Controller
{
    public function index(){
    
    $categories = Category::all();
        return view('admin.category.view-category',compact('categories'));

    }


     public function store(Request $request)
    {

       $this->validate($request, [
            'name' => 'required|unique:categories',
             'image' => 'sometimes|image|mimes:png,jpg,jpeg,bmp',
            // 'slug' => 'required',
            'description' => 'required',
            
        ]);


        // image

        $image = $request->image;
        $imageName = Str::slug($request->name,'-') . uniqid() . '.' .$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('category')){
            Storage::disk('public')->makeDirectory('category');
        }

        $image->storeAs('category',$imageName,'public');


        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name,'-');
        $category->description = $request->description;
        // $category->created_by = Auth::user()->id;
        $category->image = $imageName;
        $category->save();

        if($category){
             Toastr::success('Category Added Successfully');
            return redirect()->back(); 
        }else{
                 Toastr::error('Category Added Not Successfully');
            return redirect()->back(); 
        }

       

    }

     public function update(Request $request,$id)
    {

        if($request->name == Category::findorfail($id)->name){
            $this->validate($request, [
            'name' => 'required',
            // 'image' => 'sometimes|image|mimes:png,jpg,jpeg,bmp',
           
            'description' => 'required',
            
        ]);

        }else{
             $this->validate($request, [
            'name' => 'required|unique:categories',
            // 'image' => 'sometimes|image|mimes:png,jpg,jpeg,bmp',

            'description' => 'required',
            
        ]);

        }

       
        $category = Category::findorfail($id);

        if($request->image != null){

        $image = $request->image;
        $imageName = Str::slug($request->name,'-') . uniqid() . '.' .$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('category')){
            Storage::disk('public')->makeDirectory('category');
        }

        if(Storage::disk('public')->exists('category/' . $category->image)){
            Storage::disk('public')->delete('category/' . $category->image);
        }

        $image->storeAs('category',$imageName,'public');
    }else{

        $imageName = $category->image;

    }
       
        $category->name = $request->name;
        $category->slug = Str::slug($request->name,'-');
        $category->description = $request->description;
        $category->image = $imageName;
        // $category->updated_by = Auth::user()->id;
        
        $category->save();

        if($category){
             Toastr::success('Category Updated Successfully');
            return redirect()->back(); 
        }else{
                 Toastr::error('Category Updated Not Successfully');
            return redirect()->back(); 
        }
    }

     public function delete($id){
    
     
        $category = Category::findorfail($id);
        
        $category->delete();
        Toastr::success('Category Deleted Successfully');
            return redirect()->back();
      
       

    }


     public function active($id){
         $category = Category::findorfail($id);
         $category->status = 1;
         $category->save();
        Toastr::success('Category Activated Successfully');
            return redirect()->back();
    }

    public function inactive($id){
        $category = Category::findorfail($id);
         $category->status = 0;
         $category->save();
        Toastr::success('Category Inactivated Successfully');
            return redirect()->back();
    }

}
