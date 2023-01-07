<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model 
{
    use HasFactory;
    protected $fillable=['notebookID','title','image','body'];

    public function Notebook(){
        return $this->hasMany('App\Models\Notebook');
    }
}
