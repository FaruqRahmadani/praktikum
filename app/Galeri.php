<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    //
    protected $table = 'tabel_gallery';

    public function admin(){
      return $this->belongsTo('App\Admin', 'id_admin');
    }
}
