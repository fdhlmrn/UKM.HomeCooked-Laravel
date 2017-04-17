<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'name', 'name_long', 'code2', 'code3', 'capital',
    ];

    public function food(){
        return $this->hasMany(Food::class);
    }

    public function profile(){
        return $this->belongsToMany(State::class);
    }

}
