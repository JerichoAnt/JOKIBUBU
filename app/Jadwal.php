<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $timestamps = false;
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
    public function fasilitas()
    {
        return $this->belongsTo('App\Fasilitas', 'id_fasilitas');
    }
    public function ormawa()
    {
        return $this->belongsTo('App\Ormawa', 'id_ormawa');
    }
}
