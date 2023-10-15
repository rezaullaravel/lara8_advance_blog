<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendBlogManageController extends Controller
{
    //frontend blog manage
    public function blogManage(){
        $blogs = Blog::where('user_type','user')->orderBy('id','desc')->get();
        return view('admin.frontend_blog.index',compact('blogs'));
    }//end method


    //blog approve
    public function blogApprove($id){
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();
        return redirect()->back()->with('message','Blog approved successfully');
    }//end method


    //blog reject
    public function blogReject($id){
        $blog = Blog::find($id);
        $blog->status = 2;
        $blog->save();
        return redirect()->back()->with('message','Blog rejected successfully');
    }//end method










}//end class
