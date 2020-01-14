<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arisan extends Model
{
    protected $table = 'arisans';

    protected $fillable = [
        'namaArisan', 'kapasitas', 'iuran',
        'tglMulai', 'tglAkhir',
        'deskripsi', 'id_user'
    ];


    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    //relasi arisan dan anggota
    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'arisan_anggota', 'arisan_id','anggota_id');
    }

    public function periode(){
        return $this->hasMany(Periode::class, 'Idarisan');
    }


}
