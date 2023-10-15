<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //user profile page
    public function userProfile(){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('frontend.user.user_profile',compact('user'));
    }//end method


    //user profile edit
    public function userProfileEdit(){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('frontend.user.user_profile_edit',compact('user'));
    }//end method


    //user profile update
    public function userProfileUpdate(Request $request){
        $user = User::find($request->id);

         //image upload
         if($request->image){
            if(File::exists($user->image)){
                unlink($user->image);
            }

            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/user_images/',$imageName);
            $imagePath = 'upload/user_images/'.$imageName;

            $user->image =  $imagePath;
        }

        //data update
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('info-msg','User profile updated successfully');
    }//end method


    //blog post create from user panel
    public function userBlogCreate(){
        $blogCategories = Category::orderBy('id','asc')->get();
        return view('frontend.user.blog.blog_create',compact('blogCategories'));
    }//end method


    //user blog store
    public function userBlogStore(Request $request){
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

        $creatorId = Auth::user()->id;

        $userEmail = Auth::user()->email;

        $blog->creator_id =  $creatorId;

        $blog->user_type = 'user';

        $blog->user_email = $userEmail;

        $blog->image = $imagePath;
        $blog->save();

        return redirect()->back()->with('info-message','Your blog post has been submitted to admin. If admin approve it then it will be published.');
    }//end method


    //user blog post show(list)
    public function userBlogShow(){
        $blogs = Blog::where('user_type','user')->where('creator_id',Auth::user()->id)->paginate(20);
        return view('frontend.user.blog.blog_show',compact('blogs'));
    }//end method


//user password change
public function userPasswordChange(){
    return view('frontend.user.password_change');
}//end method


//user password update
public function userPasswordUpdate(Request $request){

    $request->validate([
        'password' => ['required', 'string', 'confirmed','min:8'],
        'password_confirmation' => ['required'],
    ]);

    $id = Auth::user()->id;
    $user = User::find($id);

    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->back()->with('info-message','Your Password Has Been Changed Successfully.');
}//end method







}//end class
