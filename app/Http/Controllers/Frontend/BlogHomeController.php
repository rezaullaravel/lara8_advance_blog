<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogHomeController extends Controller
{
    //home page
    public function index(){
        $blogs = Blog::where('status',1)->orderBy('id','desc')->paginate(3);
        return view('frontend.home.index',compact('blogs'));
    }//end method


   //blog single page
   public function blogSingle($id){

        $blog = Blog::find($id);
        Blog::where('id',$id)->increment('view_post');
        $comments = DB::table('comments')->where('commentable_id',$blog->id)->get();
        return view('frontend.home.blog-single',compact('blog','comments'));



   }//end method


   //category wise blog
   public function categorywiseBlog($id){
    $blogs = Blog::where('category_id',$id)->orderBy('id','desc')->paginate(3);
    return view('frontend.blog.categorywise-blog',compact('blogs'));

   }//end method


   //blog search
   public function blogSearch(Request $request){
    $title = $request->title;
    $blogs = Blog::where('title','Like','%'.$request->title.'%')->paginate(3);
    return view('frontend.blog.blog_search_result',compact('blogs','title'));
   }//end method








}//end class
