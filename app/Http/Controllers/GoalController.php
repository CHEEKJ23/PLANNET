<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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


class GoalController extends Controller
{
    public function add(){
        $r=request(); 
        $goals=Goal::create ([ 
            'name'=>$r->name,        
        ]);
        Session::flash('success',"January Goal Added");
        return back();
    }

    public function add2(){
        $r=request(); 
        $febgoals=febGoal::create ([ 
            'name'=>$r->febname,        
        ]);
        Session::flash('success',"February Goal Added");
        return back();
    }

    public function add3(){
        $r=request(); 
        $margoals=marGoal::create ([ 
            'name'=>$r->marname,        
        ]);
        Session::flash('success',"March Goal Added");
        return back();
    }

    public function add4(){
        $r=request(); 
        $aprilgoals=aprilGoal::create ([ 
            'name'=>$r->aprilname,        
        ]);
        Session::flash('success',"April Goal Added");
        return back();
    }

    public function add5(){
        $r=request(); 
        $maygoals=mayGoal::create ([ 
            'name'=>$r->mayname,        
        ]);
        Session::flash('success',"May Goal Added");
        return back();
    }

    public function add6(){
        $r=request(); 
        $junegoals=juneGoal::create ([ 
            'name'=>$r->junename,        
        ]);
        Session::flash('success',"June Goal Added");
        return back();
    }

    public function add7(){
        $r=request(); 
        $julygoals=julyGoal::create ([ 
            'name'=>$r->julyname,        
        ]);
        Session::flash('success',"July Goal Added");
        return back();
    }

    public function add8(){
        $r=request(); 
        $augoals=auGoal::create ([ 
            'name'=>$r->auname,        
        ]);
        Session::flash('success',"August Goal Added");
        return back();
    }

    public function add9(){
        $r=request(); 
        $sepgoals=sepGoal::create ([ 
            'name'=>$r->sepname,        
        ]);
        Session::flash('success',"September Goal Added");
        return back();
    }

    public function add10(){
        $r=request(); 
        $ocgoals=ocGoal::create ([ 
            'name'=>$r->ocname,        
        ]);
        Session::flash('success',"October Goal Added");
        return back();
    }

    public function add11(){
        $r=request(); 
        $novgoals=novGoal::create ([ 
            'name'=>$r->novname,        
        ]);
        Session::flash('success',"November Goal Added");
        return back();
    }

    public function add12(){
        $r=request(); 
        $decgoals=decGoal::create ([ 
            'name'=>$r->decname,        
        ]);
        Session::flash('success',"December Goal Added");
        return back();
    }

    public function clearJanGoal(){
        Goal::truncate();
        return back();
    }

    public function clearFebGoal(){
        febGoal::truncate();
        return back();
    }

    public function clearMarGoal(){
        marGoal::truncate();
        return back();
    }

    public function clearAprGoal(){
        aprilGoal::truncate();
        return back();
    }

    public function clearMayGoal(){
        mayGoal::truncate();
        return back();
    }

    public function clearJunGoal(){
        juneGoal::truncate();
        return back();
    }

    public function clearJulGoal(){
        julyGoal::truncate();
        return back();
    }

    public function clearAugGoal(){
        auGoal::truncate();
        return back();
    }

    public function clearSepGoal(){
        sepGoal::truncate();
        return back();
    }

    public function clearOctGoal(){
        ocGoal::truncate();
        return back();
    }

    public function clearNovGoal(){
        novGoal::truncate();
        return back();
    }

    public function clearDecGoal(){
        decGoal::truncate();
        return back();
    }

    public function deleteGoal($id){
        $deleteGoal=Goal::find($id);
        $deleteGoal->delete();
        return back();   
    }

    public function deletefebGoal($id){
        $deletefebGoal=febGoal::find($id);
        $deletefebGoal->delete();
        return back();   
    }

    public function deletemarGoal($id){
        $deletemarGoal=marGoal::find($id);
        $deletemarGoal->delete();
        return back();   
    }

    public function deleteaprilGoal($id){
        $deleteaprilGoal=aprilGoal::find($id);
        $deleteaprilGoal->delete();
        return back();   
    }

    public function deletemayGoal($id){
        $deletemayGoal=mayGoal::find($id);
        $deletemayGoal->delete();
        return back();   
    }

    public function deletejuneGoal($id){
        $deletejuneGoal=juneGoal::find($id);
        $deletejuneGoal->delete();
        return back();   
    }

    public function deletejulyGoal($id){
        $deletejulyGoal=julyGoal::find($id);
        $deletejulyGoal->delete();
        return back();   
    }

    public function deleteauGoal($id){
        $deleteauGoal=auGoal::find($id);
        $deleteauGoal->delete();
        return back();   
    }

    public function deletesepGoal($id){
        $deletesepGoal=sepGoal::find($id);
        $deletesepGoal->delete();
        return back();   
    }

    public function deleteocGoal($id){
        $deleteocGoal=ocGoal::find($id);
        $deleteocGoal->delete();
        return back();   
    }

    public function deletenovGoal($id){
        $deletenovGoal=novGoal::find($id);
        $deletenovGoal->delete();
        return back();   
    }

    public function deletedecGoal($id){
        $deletedecGoal=decGoal::find($id);
        $deletedecGoal->delete();
        return back();   
    }

    public function tick() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $goal =Goal::find($r->comGoalID);  //get the record based on income ID     
        $goal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick2() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $febgoal =febGoal::find($r->comfebGoalID);  //get the record based on income ID     
        $febgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick3() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $margoal =marGoal::find($r->commarGoalID);  //get the record based on income ID     
        $margoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick4() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $apgoal =aprilGoal::find($r->comapGoalID);  //get the record based on income ID     
        $apgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick5() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $maygoal =mayGoal::find($r->commayGoalID);  //get the record based on income ID     
        $maygoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick6() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $junegoal =juneGoal::find($r->comjuneGoalID);  //get the record based on income ID     
        $junegoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick7() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $julygoal =julyGoal::find($r->comjulyGoalID);  //get the record based on income ID     
        $julygoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick8() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $augoal =auGoal::find($r->comauGoalID);  //get the record based on income ID     
        $augoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick9() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $sepgoal =sepGoal::find($r->comsepGoalID);  //get the record based on income ID     
        $sepgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick10() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $ocgoal =ocGoal::find($r->comocGoalID);  //get the record based on income ID     
        $ocgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick11() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $novgoal =novGoal::find($r->comnovGoalID);  //get the record based on income ID     
        $novgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }

    public function tick12() {
        // $id = Input::get('id');
        // $goal=Goal::findOrfail($id);
        $r=request();//retrive submited form data
        $decgoal =decGoal::find($r->comdecGoalID);  //get the record based on income ID     
        $decgoal->mark();
        Session::flash('goal',"You've received 20 points !");
        return back();
    }
}