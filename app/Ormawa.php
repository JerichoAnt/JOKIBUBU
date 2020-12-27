<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    protected $table = "ormawas"; 
    public $timestamps=false;
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'id_ormawa', 'id');
    }
}
