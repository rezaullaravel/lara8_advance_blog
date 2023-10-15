<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactMessageController extends Controller
{
    //show contact message
    public function showMesage(){
        $contactMessages = Contact::orderBy('id','desc')->get();
        return view('admin.contact_message.show',compact('contactMessages'));
    }//end method


    //details message
    public function detailsMesage($id){

        $contactMessage = Contact::find($id);
        $contactMessage->view_status=1;
        $contactMessage->save();
        //Contact::where('id',$id)->increment('view_status');
        return redirect('admin/message/details')->with('contactMessage',$contactMessage);

    }//end method


    //message details show page
    public function details(){
        $contactMessage=Session::get('contactMessage');
        return view('admin.contact_message.details',compact('contactMessage'));
    }//end method



}
