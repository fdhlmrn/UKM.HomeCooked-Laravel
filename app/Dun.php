<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Dun extends Model
{
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function parliament()
    {
        return $this->belongsTo(Parliament::class);
    }
}
