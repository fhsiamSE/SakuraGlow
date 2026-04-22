<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
     public $timestamps = false;
     protected $guarded = [];
    //accessor
      public function getDateAttribute($value)
      {
        return date('d M Y', strtotime($value));
       }
       
       
}
