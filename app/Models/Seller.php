<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
      public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
