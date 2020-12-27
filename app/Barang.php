<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barangs"; 
    public $timestamps=false;
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'id_barang', 'id');
    }
}
