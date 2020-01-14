<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';

    protected $fillable = [
        'namaAnggota', 'tlpAnggota', 'alamatAnggota', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //relasi arisan dan anggota
    public function arisan()
    {
        return $this->belongsToMany(Arisan::class, 'arisan_anggota',  'arisan_id','anggota_id');
    }

    public function status_bayar($id_periode){
        $data = \App\StatusBayar::where('id_anggota',$this->id)
        ->where('id_periode',$id_periode)->first();
        return $data;
    }

    // public function arisun($id_arisan)
    // {
    //     $status = \App\ArisanRelasi::where('anggota_id',$this->id)
    //     ->where('arisan_id',$id_arisan)->first();
    //     return $status;
    // }
}
