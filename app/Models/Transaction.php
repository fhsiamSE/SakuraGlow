<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
     public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function product()
    {

        return $this->belongsTo(Product::class);
    }
    //Accessors 
   public function getCreatedAtAttribute($value){
    return date('d M Y', strtotime($value));
    }
}
