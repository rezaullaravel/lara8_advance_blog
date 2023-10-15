<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionAnswerController extends Controller
{
    //question answer
    public function questionAnswer(){
        $questions = Question::orderBy('id','desc')->paginate(8);
        return view('frontend.question_answer.index',[
            'questions' => $questions,
        ]);
    }//end method


    //question store
    public function questionStore(Request $request){

        if(Auth::check()){
            $question = new Question();
            $question->user_id = Auth::user()->id;
            $question->question = $request->question;
            $question->save();
            return redirect()->back()->with('info-message','Your question has been published');
        } else{
            return redirect('/login');
        }
    }//end method


    //question delete
    public function questionDelete($id){
        $question = Question::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $question->delete();
        return redirect()->back();
    }//end method







}//end class
