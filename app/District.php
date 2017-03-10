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

}
