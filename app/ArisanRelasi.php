<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArisanRelasi extends Model
{
    protected $table = 'arisan_anggota';

    protected $fillable = [
        'anggota_id', 'arisan_id'
    ];

    public function periode(){
        return $this->belongsToMany(Periode::class, 'status_bayars', 'id_arisan_anggota', 'id_periode');
    }
}
