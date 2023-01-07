<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;
    protected $fillable=['userID','title'];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function Note(){
        return $this->belongsTo('App\Models\Note');
    }
}
