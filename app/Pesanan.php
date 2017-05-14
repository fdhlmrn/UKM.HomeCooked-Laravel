<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
      'nama_makanan', 'saiz_hidangan', 'harga'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

	public function state(){
      return $this->belongsTo(State::class);
    }

    public function district(){
      return $this->belongsTo(District::class);
    }

}
