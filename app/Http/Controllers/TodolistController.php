<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowPriority;
use App\Models\mediumPriority;
use App\Models\highPriority;
use DB;
use App\Models\Goal;
use App\Models\febGoal;
use App\Models\marGoal;
use App\Models\aprilGoal;
use App\Models\mayGoal;
use App\Models\juneGoal;
use App\Models\julyGoal;
use App\Models\auGoal;
use App\Models\sepGoal;
use App\Models\ocGoal;
use App\Models\novGoal;
use App\Models\decGoal;
use Session;

class TodolistController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('auth');//construct require user login before access the controller function
    }
    public function addHighPriority(){
        $r=request(); 
        $highTasks=highPriority::create([ 
            'title'=>$r->highTitle,
            'description'=>$r->highDes,
        ]);
        Session::flash('status',"New High Priority Todo Added");
        return back();
    }

    public function addMediumPriority(){
        $r=request(); 
        $mediumTasks=mediumPriority::create([ 
            'title'=>$r->mediumTitle,
            'description'=>$r->mediumDes,
        ]);
        Session::flash('status',"New Medium Priority Todo Added");
        return back();
    }

    public function addLowPriority(){
        $r=request(); 
        $lowTasks=lowPriority::create([ 
            'title'=>$r->lowTitle,
            'description'=>$r->lowDes,
        ]);
        Session::flash('status',"New Low Priority Todo Added");
        return back();
    }

    public function view1() {
        $highTasks=highPriority::all();
        $mediumTasks=mediumPriority::all();
        $lowTasks=lowPriority::all();
        return view('todolist.todolist',compact('highTasks','mediumTasks','lowTasks'));
        // return view('todolist')->with(compact('viewAll1'))->with(compact('viewAll2'))->with(compact('viewAll3'));
    }

    public function view2() {
        $highTasks=highPriority::all();
        $mediumTasks=mediumPriority::all();
        $lowTasks=lowPriority::all();
        $goals=Goal::all();
        $febgoals=febGoal::all();
        $margoals=marGoal::all();
        $aprilgoals=aprilGoal::all();
        $maygoals=mayGoal::all();
        $junegoals=juneGoal::all();
        $julygoals=julyGoal::all();
        $augoals=auGoal::all();
        $sepgoals=sepGoal::all();
        $ocgoals=ocGoal::all();
        $novgoals=novGoal::all();
        $decgoals=decGoal::all();
        return view('profile',compact('highTasks','mediumTasks','lowTasks','goals','febgoals','margoals','aprilgoals','maygoals','junegoals','julygoals','augoals','sepgoals','ocgoals','novgoals','decgoals'));
        // return view('todolist')->with(compact('viewAll1'))->with(compact('viewAll2'))->with(compact('viewAll3'));
    }

    public function clearAllHigh(){
        highPriority::truncate();
        return back();
    }

    public function clearAllMedium(){
        mediumPriority::truncate();
        return back();
    }

    public function clearAllLow(){
        lowPriority::truncate();
        return back();
    }

    public function deleteHigh($id) {
        $deleteHigh=highPriority::find($id);
        $deleteHigh->delete();
        return back();
    }

    public function deleteMedium($id) {
        $deleteMedium=mediumPriority::find($id);
        $deleteMedium->delete();
        return back();
    }

    public function deleteLow($id) {
        $deleteLow=lowPriority::find($id);
        $deleteLow->delete();
        return back();
    }

    public function tickHigh() {
        $r=request();//retrive submited form data
        $high =highPriority::find($r->highID);  //get the record based on income ID     
        $high->mark();
        Session::flash('success',"You've received 10 points !");
        return back();
    }

    public function tickMedium() {
        $r=request();//retrive submited form data
        $medium =mediumPriority::find($r->mediumID);  //get the record based on income ID     
        $medium->mark();
        Session::flash('success',"You've received 5 points !");
        return back();
    }

    public function tickLow() {
        $r=request();//retrive submited form data
        $low =lowPriority::find($r->lowID);  //get the record based on income ID     
        $low->mark();
        Session::flash('success',"You've received 3 points !");
        return back();
    }

    public function editHighTask($id) {
        $highTasks=highPriority::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('todolist.editHighTask')->with('highTasks',$highTasks);
   }

   public function updateHighTask(){
       $r=request();//retrive submited form data
       $highTasks =highPriority::find($r->highTaskID);        
       $highTasks->title=$r->highName;
       $highTasks->description=$r->highDes;
       $highTasks->save();
       return redirect()->route('todolist');
   }

   public function editMediumTask($id) {
    $mediumTasks=mediumPriority::all()->where('id',$id);
  
   // select * from Expenses where id='$id'
   return view('todolist.editMediumTask')->with('mediumTasks',$mediumTasks);
}

public function updateMediumTask(){
   $r=request();//retrive submited form data
   $mediumTasks =mediumPriority::find($r->mediumTaskID);        
   $mediumTasks->title=$r->mediumName;
   $mediumTasks->description=$r->mediumDes;
   $mediumTasks->save();
   return redirect()->route('todolist');
}

public function editLowTask($id) {
    $lowTasks=lowPriority::all()->where('id',$id);
  
   // select * from Expenses where id='$id'
   return view('todolist.editLowTask')->with('lowTasks',$lowTasks);
}

public function updateLowTask(){
   $r=request();//retrive submited form data
   $lowTasks =lowPriority::find($r->lowTaskID);        
   $lowTasks->title=$r->lowName;
   $lowTasks->description=$r->lowDes;
   $lowTasks->save();
   return redirect()->route('todolist');
}
}
