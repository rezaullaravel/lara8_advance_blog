<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogHomeController extends Controller
{
    //home page
    public function index(){
        $blogs = Blog::where('status',1)->paginate(3);
        return view('frontend.home.index',compact('blogs'));
    }//end method


   //blog single page
   public function blogSingle($id){
    $blog = Blog::find($id);

    $comments = DB::table('comments')->where('commentable_id',$blog->id)->get();

    return view('frontend.home.blog-single',compact('blog','comments'));
   }//end method


   //category wise blog
   public function categorywiseBlog($id){
    $blogs = Blog::where('category_id',$id)->orderBy('id','desc')->paginate(3);
    return view('frontend.blog.categorywise-blog',compact('blogs'));

   }//end method








}//end class
