<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiMahasiswa extends Model
{
    //
    protected $table = 'tabel_absensi_mahasiswa';
    protected $fillable = [
        'id_mahasiswa', 'id_jadwal_praktikum', 'status',
    ];
}
