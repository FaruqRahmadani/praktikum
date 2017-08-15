<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Dosen;
use App\Mahasiswa;
use Auth;

class DosenController extends Controller
{
  public function dashboard()
  {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.dashboard', ['datauser' => $datauser]);
      // dd('Dashboard Dosen testing !!!');
  }

  public function datamahasiswa()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = Mahasiswa::all();
    return view('dosen.data_mahasiswa', ['datauser' => $datauser, 'data' => $data]);
  }

  public function datamahasiswadetail($id)
  {
    try {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      $data = Mahasiswa::find(Crypt::decryptString($id));
      return view('dosen.detail_mahasiswa', ['datauser' => $datauser, 'data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }
}
