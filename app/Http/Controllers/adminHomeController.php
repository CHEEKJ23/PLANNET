<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class adminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        $totalUser = DB::table('users')
        ->where('role_as','=','0')
        ->count();
        // return view('adminHome',compact('totalUser'));
        return view('admin.adminHome')->with('totalUser',$totalUser);
    }    
}
