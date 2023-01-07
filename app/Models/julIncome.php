<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class julIncome extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description', 'amount', 'date', 'category', 'image'];

}
