<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decGoal extends Model
{
    protected $fillable=['name','done'];

    public function User(){
        return $this->belongsTo('App\Models\User'); 
    }

    public function mark() {
        $this->done = $this->done ? false : true;
        $this->point = 0;
       
        if($this->done == true) {
            
            $this->point = $this->point +20;
        }
        $this->save();
    }
}
