<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Calendar;
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
use App\Models\Notebook;
use Auth;
use Session;
use JavaScript;
use JSON;

class CalendarController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');//construct require user login before access the controller function
  }
  public function add()
  {
    $events = array();
    $calendars = Calendar::all();
    foreach ($calendars as $calendar) {
      $events[] = [
        'id' => $calendar->id,
        'description' => $calendar->description,
        'title' => $calendar->title,
        'color' => $calendar->color,
        'start' => $calendar->start_date,
        'end' => $calendar->end_date,
        // 'color' => $color,
        'textColor' => 'white',
        'borderColor' => 'white',
      ];
    }
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
    $notebooks = DB::table('notebooks')
    ->where('userID','=',Auth::id())
    ->latest()
    ->get();    
    return view('calendar.calendar', ['events' => $events,'goals'=>$goals,'notebooks'=>$notebooks,'febgoals'=>$febgoals,'margoals'=>$margoals,'aprilgoals'=>$aprilgoals,'maygoals'=>$maygoals,'junegoals'=>$junegoals,'julygoals'=>$julygoals,'augoals'=>$augoals,'sepgoals'=>$sepgoals,'ocgoals'=>$ocgoals,'novgoals'=>$novgoals,'decgoals'=>$decgoals,]);
  }
  
  public function store(Request $request)
  {
      $request->validate([
          'title' => 'required|string'
      ]);

      $calendar = Calendar::create([
        'title' => $request->title,
        'description' => $request->description,
        'color' => $request->color,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);
    return response()->json($calendar);
  }

  public function update(Request $request,$id) 
  {
    $calendar = Calendar::find($id);
    if(! $calendar) {
      return response()->json([
        'error' => 'Unable to locate the event'
      ], 404);
    }
    $calendar -> update([
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
    ]);
    return response()->json('Event Updated');
  }

  public function delete($id) {
    $calendar = Calendar::find($id);
    if(! $calendar) {
      return response()->json([
        'error' => 'Unable to locate the event'
      ], 404);
    }
    $calendar->delete();
    return $id;
  }

}
?>