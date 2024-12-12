<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    /**
     * 
     * 
     * @var array
     */
    protected $fillable = [
      'product_name',
       'quantity',
    ];
}
