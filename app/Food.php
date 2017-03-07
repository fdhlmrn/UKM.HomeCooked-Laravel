<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
      'nama_makanan', 'saiz_hidangan', 'harga'
    ];


    public function user(){
      return $this->belongsTo(User::class);
    }

    public function pivots(){
      return $this->belongsToMany(User::class, 'pivots');

    }
}
