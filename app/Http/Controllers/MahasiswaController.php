<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Mahasiswa;
use App\JadwalDosen;

class MahasiswaController extends Controller
{
  public function dashboard()
  {
    // return view('depan.index');
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    return view('mahasiswa.dashboard', ['data' => $data]);
  }

  public function materi(){
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    if (date('n') > 8){
      $tambahsemester = 1;
    } else {
      $tambahsemester = 0;
    }
    $semester = (((date('y'))-(substr($data->NPM, 0, 2)))*2)+$tambahsemester;
    $jadwal = JadwalDosen::with('materi','dosen')->get()->where('materi.semester', '<=', $semester);
    return view('mahasiswa.materi', ['data' => $data, 'jadwal' => $jadwal]);
  }

  public function showmateri($id){
    dd(Crypt::decryptString($id));
  }
}
