<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\Feedback;
use App\Models\FeedbackReply;


class FeedbackController extends Controller
{
    public function addFeedback(){
        $r = request();
         $feedback=Feedback::create([
            'name'=>$r->fname,
            'email'=>$r->femail,
            'subject'=>$r->fsubject,
            'message'=>$r->fmessage,
        ]);
        Session::flash('status',"Feedback Submitted!!");
        return back();
       // return redirect()->route('viewExpenses');
    }

    public function view() {
        $feedbacks=Feedback::all();
        return view('admin.feedback',['feedbacks' => $feedbacks]);
    }

    public function deleteFeedback($id) {
        $deleteFeedback=Feedback::find($id);
        $deleteFeedback->delete();
        return back();
    }

    public function feedbackID($id) {
        $feedbacks=Feedback::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('admin.replyFeedback')->with('feedbacks',$feedbacks);
   }

   public function replyFeedback(){
       $r=request();//retrive submited form data
       $feedback =Feedback::find($r->feedbackID);         
       $reply=FeedbackReply::create([
        'subject'=>$r->rsubject,
        'message'=>$r->rmessage,
    ]);
       Session::flash('status',"Reply sent!!");
       return redirect()->route('viewFeedback');
    // return view('admin.feedback');
   }

   public function viewReply() {
    $feedbacks=Feedback::all();
    return view('viewReply',['feedbacks'=>$feedbacks]);
   }

   public function viewReplyDetails($id) {
    $feedbacks=Feedback::all()->where('id',$id);
    $replies=FeedbackReply::all()->where('id',$id);
    // $feedbacks =Feedback::find($r->replyID);   
    // $replies=FeedbackReply::all();
     return view('viewReplyDetails',['feedbacks'=>$feedbacks,'replies'=>$replies]);
}
    // public function showReplyDetails(){
    //     $reply =FeedbackReply::find($r->replyID);        
    //     $replies=FeedbackReply::all();
    //     return view('viewReplyDetails')->with('replies',$replies);
    // }

    public function search(){
        $r=request();
        $keyword=$r->keyword;
        $feedbacks=DB::table('feedback')
        ->where('feedback.subject','like','%'.$keyword.'%')
        ->orwhere('feedback.name','like','%'.$keyword.'%')
        ->orwhere('feedback.message','like','%'.$keyword.'%')
        ->get();
        return view('admin.feedback')->with('feedbacks',$feedbacks);
    }
}
