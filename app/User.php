<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Food;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     *Ni nak bgtahu user ada bnayak roles ( Many to Many)
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function food(){
        return $this->hasMany(Food::class);
    }

    public function order(){
      return $this->hasMany(Order::class);
    }

    public function pivots(){

      return $this->belongsToMany(Food::class, 'pivots');

    }
}
