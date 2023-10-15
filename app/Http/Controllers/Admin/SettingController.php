<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    //logo setting
    public function logoSetting(){
      $logo = Setting::find(1);
      return view('admin.setting.logo_setting',[
        'logo' => $logo,
      ]);
    }//end method


    //logo update
    public function logoUpdate(Request $request){
        $logo = Setting::find($request->id);
  //image upload
  if($request->logo){
    if(File::exists($logo->logo)){
        unlink($logo->logo);
    }

    $image = $request->logo;
    $imageName = rand().'.'.$image->getClientOriginalName();
    $image->move('upload/logo_image/',$imageName);
    $imagePath = 'upload/logo_image/'.$imageName;

    $logo->logo =  $imagePath;
}

  $logo->save();

  return redirect()->back()->with('message','Logo updated successfully');

    }//end method


    //header setting
    public function headerSetting(){
        $setting = Setting::find(1);
        return view('admin.setting.header_setting',[
          'setting' => $setting,
        ]);
    }//end method


    //header update
    public function headerUpdate(Request $request){
        $setting = Setting::find($request->id);
        $setting->header_phone = $request->header_phone;
        $setting->header_address = $request->header_address;
        $setting->header_email = $request->header_email;
        $setting->save();

        return redirect()->back()->with('message','Header info updated successfully');
    }//end method


    //footer left setting
    public function footerLeftSetting(){
        $setting = Setting::find(1);
        return view('admin.setting.footer_left_setting',[
          'setting' => $setting,
        ]);
    }//end method


    //footer left update
    public function footerLeftUpdate(Request $request){
        $setting = Setting::find($request->id);
        $setting->footer_fb_link = $request->footer_fb_link;
        $setting->footer_twitter_link = $request->footer_twitter_link;
        $setting->footer_linkedin_link = $request->footer_linkedin_link;
        $setting->save();

        return redirect()->back()->with('message','Footer left info updated successfully');
    }//end method



    //about us setting
    public function aboutusSetting(){
        $setting = Setting::find(1);
        return view('admin.setting.about_us_setting',compact('setting'));
    }


    //about us update
    public function aboutusUpdate(Request $request){
        $setting = Setting::find($request->id);
        //abou us image upload
        if($request->about_img){
          if(File::exists($setting->about_img)){
              unlink($setting->about_img);
          }

          $image = $request->about_img;
          $imageName = rand().'.'.$image->getClientOriginalName();
          $image->move('upload/about_image/',$imageName);
          $imagePath = 'upload/about_image/'.$imageName;

          $setting->about_img =  $imagePath;
      }

      $setting->about_description = $request->about_description;
      $setting->save();

      return redirect()->back()->with('message','About us info updated successfully');

    }











}//end class
