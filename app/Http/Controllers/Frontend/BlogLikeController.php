<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PostLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogLikeController extends Controller
{
    //blog like
    public function blogLike(Request $request){

       if(Auth::check()){
        $postLike = new PostLike();
        $postLike->blog_id = $request->blogId;
        $postLike->user_id = Auth::user()->id;
        $postLike->save();
        return redirect()->back();
       } else {
        return redirect('/login');
       }
    }//end method


    //blog dislike
    public function blogDisLike($id){

       if(Auth::check()){
        $postLike = PostLike::where('blog_id',$id)->where('user_id',Auth::user()->id)->first();
        $postLike->delete();
        return redirect()->back();
       } else{
        return redirect('/login');
       }

    }//end mthod





}//end class
