<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'state_id', 'name', 'code3',
    ];

    public function food(){
        return $this->hasMany(Food::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function profile(){
        return $this->belongsToMany(Profile::class);
    }

}
