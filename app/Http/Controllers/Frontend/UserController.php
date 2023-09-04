<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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









}//end class
