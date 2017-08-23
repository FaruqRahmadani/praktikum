<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Mahasiswa;
use App\JadwalDosen;
use App\AbsensiMahasiswa;

class MahasiswaController extends Controller
{
  public function dashboard()
  {
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    return view('mahasiswa.dashboard', ['data' => $data]);
  }

  public function materi(){
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    //kalo september (semester ganjil) tambah 1
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
    $ids    = Crypt::decryptString($id);
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    $jadwal = JadwalDosen::with('materi','dosen','JadwalPraktikum')->get()->where('id', $ids)->first();
    $absensi = AbsensiMahasiswa::with('JadwalPraktikum')->where('id_mahasiswa', $data->id)->get();
    $jumlah = 0;
    foreach ($absensi as $absensis) {
      if ($absensis->JadwalPraktikum->id_jadwal_dosen == $ids) {
        $jumlah = $jumlah +1;
      }
    }
    if ($jumlah == $jadwal->JadwalPraktikum->max('pertemuan')) {
      if ($jumlah > 0) {
        $status = 'Anda Sudah Mengambil Jadwal Materi Ini !';
      } else {
        $status = 'Jadwal Materi Belum Tersedia';
      }

      return view('mahasiswa.jadwalmaterisudah', ['data' => $data, 'idjadwaldosen' =>$ids, 'absensi' => $absensi, 'jadwal' => $jadwal, 'status' => $status]);
    }
    return view('mahasiswa.jadwalmateri', ['data' => $data, 'jadwal' => $jadwal]);
  }

  public function storeshowmateri(Request $request, $id){
    // dd($request->idpertemuan);
    $idpertemuans = $request->idpertemuan;
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    $idmahasiswa = $data->id;
    for ($i=1; $i <= (count($request->except('_token'))/2); $i++) {
      $this->validate($request, [
        'pertemuan'.$i => 'required'
      ]);
    }

    // $store = New AbsensiMahasiswa;
    for ($i=1; $i <= (count($request->except('_token'))/2); $i++) {
      $pertemuan = 'idpertemuan'.$i;
      $store = \App\AbsensiMahasiswa::create([
            'id_mahasiswa'        => $idmahasiswa,
            'id_jadwal_praktikum' => $request->$pertemuan,
      ]);
    }
    return redirect('/mahasiswa/materi')->with('status', 'Jadwal Telah Diambil');
    // foreach ($idpertemuans as $idpertemuan) {
    //   $data[] =  new AbsensiMahasiswa([
    //     'id_mahasiswa'        => $idmahasiswa,
    //     'id_jadwal_praktikum' => $idpertemuan,
    //   ]);
    // }

    // $store->saveMany($data);

    // for ($i=1; $i <= (count($request->except('_token'))/2); $i++) {
    //   $store->id_mahasiswa        = $idmahasiswa;
    //   $pertemuan = 'idpertemuan'.$i;
    //   $store->id_jadwal_praktikum = $request->$pertemuan;
    //   $store->save();
    // }
  }

  public function jadwalsaya(){
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    $jadwal = AbsensiMahasiswa::with('JadwalPraktikum')->where('id_mahasiswa', $data->id)->get();
    // dd($jadwal);
    return view('mahasiswa.jadwal_saya', ['data' => $data, 'jadwal' => $jadwal]);
  }
}
