<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CommentLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    //comment like
    public function commentLike(Request $request){
        $commentLike = new CommentLike();
        $commentLike->user_id = Auth::user()->id;
        $commentLike->comment_id = $request->commentId;

        $commentLike->save();

        return redirect()->back();
    }//end method


    //comment dislike
    public function commentDislike(Request $request){
        $commentLike = CommentLike::where('user_id',Auth::user()->id)->where('comment_id',$request->commentId)->delete();

        return redirect()->back();
    }//end method
}
