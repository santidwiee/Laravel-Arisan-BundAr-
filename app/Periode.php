<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periodes';

    protected $fillable = [
        'Idarisan', 'tglPeriode', 'pemenang'
    ];

    public function arisan(){

        return $this->belongsTo('App\Arisan', 'Idarisan');
    }

    public function arisan_anggota(){
        return $this->hasOne('App\StatusBayar', 'id_periode');
    }

    public function total_bayar(){
        
    }
}
