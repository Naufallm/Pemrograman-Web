<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deskripsi extends Model
{
    use HasFactory;
    /**
     * 
     * 
     * @var array
     */
    protected $fillable = [
      'level_sugar',
       'temperature',
    ];
}
