<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    protected $fillable = [
      'seller_id', 'buyer_id', 'food_id','quantity','totalPrice', 
    ];

}
