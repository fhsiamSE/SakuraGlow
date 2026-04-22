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

       public function getAmountAttribute($value)
{
    // If you want to format the amount (e.g., as a currency or with two decimal places)
    return number_format($value, 2, '.', ','); // Adjust this depending on your formatting needs
}
}
