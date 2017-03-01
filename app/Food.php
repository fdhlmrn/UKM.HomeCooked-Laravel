<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
      'nama_makanan', 'saiz_hidangan', 'gambar', 'harga', 'status'
    ];

    public function jualan(){
      return $this->belongsToMany(Jualan::class);
    }
}
