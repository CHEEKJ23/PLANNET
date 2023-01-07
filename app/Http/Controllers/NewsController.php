<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Models\User;
use DB;
use Session;
use App\Models\News;

class NewsController extends Controller
{
    public function addNews(){
        $r = request();
        if($r->file('newsImage')!=''){
        $image=$r->file('newsImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        }
        else {
            $imageName="noImage.jpg";//default image
        }
         $news=News::create([
            'title'=>$r->newsTitle,
            'content'=>$r->newsContent,
            'image'=>$imageName,
        ]);
        Session::flash('status',"News Created!!");
        return back();
       // return redirect()->route('viewExpenses');
    }

    // public function view() {
    //     $news=News::all();
    //     return view('admin.news',['news' => $news]);
    // }

    public function showToUser(){
        // $news = DB::table('news')
        // ->latest()
        // ->get();
        $news=News::all();
        return view('viewNews')->with('news',$news);
    }
    // public function showNewsDetail($id){
    //     $news = News::all()->where('id',$id);
    //     return view('newsContent')->with('news',$news);
    // }
    public function view(){
        $news=News::all();
        return view('admin.news')->with('news',$news);
    }

    public function deleteNews($id) {
        $deleteNews=News::find($id);
        $deleteNews->delete();
        return back();
    }

    public function editNews($id) {
        $news=News::all()->where('id',$id);
      
       // select * from Expenses where id='$id'
       return view('admin.editNews')->with('news',$news);
   }

   public function updateNews(){
       $r=request();//retrive submited form data
       $news =News::find($r->newsID);   
       if($r->file('image')!=''){
        $image=$r->file('image');        
        $image->move('images',$image->getClientOriginalName());                   
        $imageName=$image->getClientOriginalName();  
        $news->image=$imageName;
        }
        else {
            $imageName="noImage.png";//default image
        } 
       $news->title=$r->nTitle;
       $news->content=$r->nContent;
       $news->save();
       return redirect()->route('viewNews');
   }

   public function search(){
    $r=request();
    $keyword=$r->keyword;
    $news = DB::table('news')
    ->where('news.title','like','%'.$keyword.'%')      
    ->latest()
    ->get();
    return view('admin.news')->with('news',$news);
}
}
