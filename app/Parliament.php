<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Parliament extends Model
{
    public function duns()
    {
        return $this->hasMany(Dun::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
