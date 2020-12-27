<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = "fasilitas"; 
    public $timestamps=false;
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'id_fasilitas', 'id');
    }
}
