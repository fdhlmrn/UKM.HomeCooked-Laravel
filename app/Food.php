<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Food extends Model
{
    //
    use Notifiable;

    protected $fillable = [
      'nama_makanan', 'saiz_hidangan', 'harga', 
    ];


    public function user(){
      return $this->belongsTo(User::class);
    }

    public function pivots(){
      return $this->belongsToMany(User::class, 'pivots');
    }

    public function state(){
      return $this->belongsTo(State::class);
    }

    public function district(){
      return $this->belongsTo(District::class);
    }

    public function cartDetail(){
      return $this->hasMany(CartDetail::class,'food_id');
    }

    public function bought(){
      return $this->belongsToMany(Bought::class,'food_id');
    }

}
