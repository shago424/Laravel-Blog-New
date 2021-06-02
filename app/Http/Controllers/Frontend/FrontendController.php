<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
class FrontendController extends Controller
{
    public function index(){

        $data['posts'] = Post::latest()->paginate(4);
        $data['populars'] = Post::inRandomOrder()->limit(4)->get();
        $data['recents'] = Post::latest()->limit(4)->get();
        $data['hots'] = Post::latest()->paginate(5);
         $data['importants'] = Post::inRandomOrder()->paginate(5);
        $data['first_sections'] = Post::inRandomOrder()->limit(3)->get();
        $data['sidebar_categories'] = Category::latest()->get();
        $data['header_categories'] = Category::latest()->get();
        return view('frontend.layouts.home',$data);

    }

    public function single_post($slug){

        $data['post'] = Post::where('slug',$slug)->first();
         $data['populars'] = Post::inRandomOrder()->limit(4)->get();
        $data['recents'] = Post::latest()->limit(4)->get();
        $data['sidebar_categories'] = Category::latest()->get();
        $data['header_categories'] = Category::latest()->get();
         $data['hots'] = Post::latest()->paginate(5);
         $data['importants'] = Post::inRandomOrder()->paginate(5);
        $data['first_sections'] = Post::inRandomOrder()->limit(3)->get();
        return view('frontend.single_page.single_post',$data);
    }

     public function allcategory($slug){

     $id = Category::where('slug',$slug)->pluck('id');
      $data['categoryIdByPosts'] = Post::with('user','category')->where('category_id',$id)
      ->orderBy('id','DESC')->paginate(8);
      $data['post'] = Post::where('slug',$slug)->first();
         $data['populars'] = Post::inRandomOrder()->limit(4)->get();
        $data['recents'] = Post::latest()->limit(4)->get();
        $data['sidebar_categories'] = Category::latest()->get();
        $data['header_categories'] = Category::latest()->get();
         $data['hots'] = Post::latest()->paginate(5);
         $data['importants'] = Post::inRandomOrder()->paginate(5);
        $data['first_sections'] = Post::inRandomOrder()->limit(3)->get();
        return view('frontend.single_page.allcategory_post',$data);
    }

     public function alltag($name){

     $id = Tag::where('name',$name)->pluck('postID');
      $data['tagIdByPosts'] = Post::with('user','category','tags')->where('id',$id)
      ->orderBy('id','DESC')->paginate(8);
      // $data['post'] = Post::where('slug',$slug)->first();
         $data['populars'] = Post::inRandomOrder()->limit(4)->get();
        $data['recents'] = Post::latest()->limit(4)->get();
        $data['sidebar_categories'] = Category::latest()->get();
        $data['header_categories'] = Category::latest()->get();
         $data['hots'] = Post::latest()->paginate(5);
         $data['importants'] = Post::inRandomOrder()->paginate(5);
        $data['first_sections'] = Post::inRandomOrder()->limit(3)->get();
        return view('frontend.single_page.alltag_post',$data);
    }
}
