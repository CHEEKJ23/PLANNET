<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eventCountdownTool;
use DB;
use Session;

class EventCountdownToolController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');//construct require user login before access the controller function
    }
    
    public function addcountDownEvent(){
        $r=request(); 
        if($r->file('image')!=''){
            $image=$r->file('image');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            }
            else {
                $imageName="n.jpg";//default image
            }
        
        $countDownEvent=eventCountdownTool::create([ 
            'name'=>$r->eventName,
            'date' => $r->eventDate,
            'image'=>$imageName,
            'status' => $r->eventStatus,
        ]);
        // $timer_id ='1';
        // $timer = eventCountdownTool::findOrNew($timer_id);
        // $timer->date = $r->eventDate;
        // $timer->status = $r->timer_status;
        // $timer->save();
        Session::flash('status',"New Event Added");
        return back();
    }
    // public function addcountDownEvent(Request $request)
    // {
    //     $timer_id ='1';
    //     $timer = eventCountdownTool::findOrNew($timer_id);
    //     $timer->name = $request->eventName;
    //     $timer->date = $request->eventDate;
    //     $timer->status = $request->eventStatus;
    //     $timer->save();
    //     Session::flash('status',"New Event Added");
    //     return back();
    // }

    public function viewCoundown() {
        $countDownEvents=eventCountdownTool::all();
        return view('eventCountdown')->with('countDownEvents',$countDownEvents);
        // , ['events' => $events,
    }

    public function deleteCountdownEvent($id) {
        $deleteCountdownEvent=eventCountdownTool::find($id);
        $deleteCountdownEvent->delete();
        return back();
    }

    public function editCountdownEvent($id) {
        $countDownEvents=eventCountdownTool::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('editCountdownEvent')->with('countDownEvents',$countDownEvents);
   }

   public function updateCountdownEvent(){
       $r=request();//retrive submited form data
       $countDownEvents =eventCountdownTool::find($r->countdownEventID);   
       if($r->file('image')!=''){
        $image=$r->file('image');        
        $image->move('images',$image->getClientOriginalName());                   
        $imageName=$image->getClientOriginalName();  
        $countDownEvents->image=$imageName;
        }
        else {
            $imageName="n.jpg";//default image
        } 
       $countDownEvents->name=$r->eventName;
       $countDownEvents->date=$r->eventDate;
       $countDownEvents->date=$r->eventDate;
       $countDownEvents->status=$r->eventStatus;
       $countDownEvents->save();
       return redirect()->route('eventCountdown');
   }

//    public function viewTimer(){
//        $timer = eventCountdownTool::first();
//        return view('eventCountdown',compact('timer'));
//    }
}
