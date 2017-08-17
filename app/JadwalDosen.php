<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalDosen extends Model
{
    //
    protected $table = 'tabel_jadwal_dosen';
    protected $fillable = [
        'id_praktikum', 'id_dosen', 'id_periode', 'tipe',
    ];

    public function materi(){
      return $this->belongsTo('App\Materi', 'id_praktikum');
    }
}
