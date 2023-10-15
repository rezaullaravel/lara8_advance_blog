<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Mail\MailSend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailSendingController extends Controller
{
    //mail sending form
    public function mailSendingForm(){
        return view('admin.mail.mail_send_form');
    }//end method


    //mail sending
    public function mailSend(Request $request){
        $data = [];
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        Mail::to($request->email)->send(new MailSend($data));

        return redirect()->back()->with('message','Your mail has been sent successfully');
    }//end method









}//end class
