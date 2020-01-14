<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBayar extends Model
{
    protected $table = 'status_bayars';

    protected $fillable = [
        'id_arisan_anggota', 'id_periode', 'status'
    ];

}
