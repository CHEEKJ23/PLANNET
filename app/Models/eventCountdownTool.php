<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventCountdownTool extends Model
{
    use HasFactory;
    protected $fillable=['name', 'date', 'image', 'status'];

    public function User(){
        return $this->belongsTo('App\Models\User'); 
    }
}
