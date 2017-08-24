<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $table = 'tabel_berita';

    public function admin(){
      return $this->belongsTo('App\Admin', 'id_admin');
    }
}
