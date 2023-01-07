<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mediumPriority extends Model
{
    use HasFactory;
    protected $fillable=['title','description','done'];

    public function User(){
        return $this->belongsTo('App\Models\User'); 
    }

    public function mark() {
        $this->done = $this->done ? false : true;
        $this->point = 0;
       
        if($this->done == true) {
            
            $this->point = $this->point +5;
        }
        $this->save();
    }
}
