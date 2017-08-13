<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
  public function dashboard()
  {
    // return view('depan.index');
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    return view('mahasiswa.dashboard')->with('data', $data);
  }
}
