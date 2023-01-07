<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Notebook;
use App\Models\Note;
use Auth;

class NotebookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//construct require user login before access the controller function
    }
    public function store(){
        $currentTime = Carbon::now("GMT+8");
        $r = request();
        $storeNotebook = Notebook::create([
            'userID'=>Auth::id(),
            'title'=>$r->notebookTitle,
        ]);
        return back();
    }
    public function show(){
        $notebooks = DB::table('notebooks')
        ->where('userID','=',Auth::id())
        ->latest()
        ->get();
        return view('note.notebook')->with('notebooks',$notebooks);
    } 
    public function removeNotebook($id){
        $note= Note::where('notebookID',$id);
        $notebooks=Notebook::find($id);
        $note->delete();
        $notebooks->delete();
        return back();
    }
    public function openNote($id){
        $notebooks=Notebook::all()->where('id',$id);
        $notes= Note::all()->where('notebookID',$id);
        return view('note.note')
        ->with('notebooks',$notebooks)
        ->with('notes',$notes);
    }

    public function editNotebook($id){
        $notebooks = Notebook::all()->where('id',$id);
        return view('note.editNotebook')->with('notebooks',$notebooks);
    }
    public function updateNotebook(){
        $r=request();
        $notebook= Notebook::find($r->notebookID);
        $notebook->title=$r->notebookTitle;
        $notebook->save();
        return redirect()->route('showNotebook');
    }
}
