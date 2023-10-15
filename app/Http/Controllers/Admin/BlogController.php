<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //add blog
    public function add(){
        $categories = Category::all();
        return view('admin.blog.blog_add',compact('categories'));
    }//end method


    //store blog
    public function store(Request $request){
        $this->validate($request,[
            'category_id' =>'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ],[
            'category_id.required'=>'The category field is required',
            'image.image'=>'The file must be an image'
        ]);

        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/blog_images/',$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        //data insert
        $blog = new Blog();
        $blog->category_id = $request->category_id;

        $blog->title = $request->title;

        $blog->description = $request->description;

        $creatorId = Auth::guard('admin')->user()->id;

        $userEmail = Auth::guard('admin')->user()->email;

        $blog->creator_id =  $creatorId;

        $blog->user_type = 'admin';

        $blog->user_email = $userEmail;

        $blog->image = $imagePath;
        $blog->save();

        return redirect()->back()->with('message','Blog created successfully');
    }//end method


    //manage blog
    public function manage(){
        $blogs = Blog::where('user_type','admin')->orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }//end method


    //blog status deactive
    public function blogStatusDeactive($id){
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();
        return redirect()->back()->with('message','Blog status deactivated successfully');
    }//end method


    //blog status active
    public function blogStatusActive($id){
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();
        return redirect()->back()->with('message','Blog status activated successfully');
    }//end method


    //blog delete
    public function blogDelete($id){
        $blog = Blog::find($id);
        if(File::exists($blog->image)){
            unlink($blog->image);
        }

        $blog->delete();
        return redirect()->back()->with('message','Blog deleted successfully');
    }//end method


    //blog edit
    public function blogEdit($id){
        $blog = Blog::find($id);
        $categories = Category::all();
        return view('admin.blog.blog_edit',compact('blog','categories'));
    }//end method


    //blog update
    public function blogUpdate(Request $request){
        $blog = Blog::find($request->id);

        $this->validate($request,[
            'category_id' =>'required',
            'title' => 'required',
            'description' => 'required',
        ],[
            'category_id.required'=>'The category field is required',
        ]);

        //image upload
        if($request->image){
            if(File::exists($blog->image)){
                unlink($blog->image);
            }

            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/blog_images/',$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        //data insert
        $blog->category_id = $request->category_id;

        $blog->title = $request->title;

        $blog->description = $request->description;

        $creatorId = Auth::guard('admin')->user()->id;

        $userEmail = Auth::guard('admin')->user()->email;

        $blog->creator_id =  $creatorId;

        $blog->user_type = 'admin';

        $blog->user_email = $userEmail;

        // $blog->image = $request->image ? $imagePath : $blog->image;


        $blog->save();

        return redirect('/admin/blog/manage')->with('message','Blog updated successfully');
    }//end method


    //blog details
    public function blogDetails($id){
        $blog = Blog::find($id);
        return view('admin.blog.blog_details',compact('blog'));
    }//end method









}//end class
