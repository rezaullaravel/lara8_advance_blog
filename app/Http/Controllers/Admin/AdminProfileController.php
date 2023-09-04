<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //admin password change form
    public function passwordChangeForm(){
        return view('admin.profile.password_change_form');
    }//end method


    //admin password update
    public function passwordUpdate(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);


        //update password
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success-message','Password changed successfully');

    }//end method
}
