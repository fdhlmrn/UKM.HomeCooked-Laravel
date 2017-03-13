<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
    	'id', 'address', 'phone', 'state', 'district', 'subdistrict'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
