<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use App\Periode;
use App\Mahasiswa;
use App\JadwalDosen;
use App\JadwalPraktikum;
use App\AbsensiMahasiswa;
use App\Jobs\SendEmailAmbilJadwal;
use App\Jobs\SendEmailReminderKelas;
use Carbon\Carbon;

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

    $Periode = Periode::all()->last();
    $JadwalDosen = JadwalDosen::where('id_periode', $Periode)->get();

    //kalo september (semester ganjil) tambah 1
    if (date('n') > 8){
      $tambahsemester = 1;
    } else {
      $tambahsemester = 0;
    }
    $semester = (((date('y'))-(substr($data->NPM, 0, 2)))*2)+$tambahsemester;

    //Periode 1 Hidden, 0 Buka
    if ($Periode->status == '0') {
      $jadwal = JadwalDosen::with('materi','dosen')->get()->where('materi.semester', '<=', $semester)->where('id_periode', $Periode->id);
    } else {
      $jadwal = JadwalDosen::with('materi','dosen')->get()->where('materi.semester', '=', '01012011')->where('id_periode', $Periode->id);
    }


    $index=0;

    // $AbsensiMahasiswa = AbsensiMahasiswa::with('JadwalPraktikum')->where('id_mahasiswa', $data->id)->get();
    if (count($JadwalDosen) < 1) {
      $this->idJadwalDosen[1] = 01012011;
      $AbsensiMahasiswa = AbsensiMahasiswa::with(['JadwalPraktikum' => function($query) {
        $query->where('id_jadwal_dosen', $this->idJadwalDosen);
      }])->where('id_mahasiswa', '01012011')->get();
    } else {
      foreach ($JadwalDosen as $dataJadwalDosen) {
        $index+=1;
        $this->idJadwalDosen[$index] = $dataJadwalDosen->id;
        $AbsensiMahasiswa = AbsensiMahasiswa::with(['JadwalPraktikum' => function($query) {
          $query->where('id_jadwal_dosen', $this->idJadwalDosen);
        }])->where('id_mahasiswa', $data->id)->get();
      }
    }

    //Menghitung Jumlah Materi yang Sudah di Ambil
    $JumlahMateri = 0;
    $DumpIdJadwalDosen = 0;
    foreach ($AbsensiMahasiswa as $dataAbsensiMahasiswa) {
      if ($DumpIdJadwalDosen != $dataAbsensiMahasiswa['JadwalPraktikum']['id_jadwal_dosen']) {
        $JumlahMateri += 1;
        $DumpIdJadwalDosen = $dataAbsensiMahasiswa['JadwalPraktikum']['id_jadwal_dosen'];
      }
    }

    return view('mahasiswa.materi', ['data' => $data, 'jadwal' => $jadwal, 'jumlahmateri' => $JumlahMateri, 'periode' => $Periode]);
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
      $idjadwaldosen[$i] = $request->$pertemuan; //data absensinya
      $store = \App\AbsensiMahasiswa::create([
            'id_mahasiswa'        => $idmahasiswa,
            'id_jadwal_praktikum' => $request->$pertemuan,
      ]);
    }

    $job = new SendEmailAmbilJadwal($idmahasiswa, $idjadwaldosen);
    $this->dispatch($job);

    foreach ($idjadwaldosen as $idjadwal) {
      $data = JadwalPraktikum::find($idjadwal);
      $date = Carbon::parse($data->tanggal);
      $time = Carbon::parse($data->waktu_mulai);

      $delay = Carbon::create($date->format('Y'),$date->format('m'),$date->format('d'),$time->format('H'),$time->format('i'))->subMinute(15);
      // echo Carbon::now();
      $joblater = (new SendEmailReminderKelas($idmahasiswa, $idjadwal))->delay($delay);
      $this->dispatch($joblater);
    }


    return redirect('/mahasiswa/materi')->with('status', 'Jadwal Telah Diambil');
    }

    /**
         KADA TAHU NIH APA DI BAWAH NI KOLER JUA MEHAPUS KALO TEPAKAI
    */

    // $store->saveMany($data);
    //
    // for ($i=1; $i <= (count($request->except('_token'))/2); $i++) {
    //   $store->id_mahasiswa        = $idmahasiswa;
    //   $pertemuan = 'idpertemuan'.$i;
    //   $store->id_jadwal_praktikum = $request->$pertemuan;
    //   $store->save();
    // }
  // }

  public function jadwalsaya(){
    $iduser = Auth::user()->id;
    $data   = Mahasiswa::where('id_user', $iduser)->first();
    $Periode = Periode::all()->last()->id;
    $JadwalDosen = JadwalDosen::where('id_periode', $Periode)->get();

    //Supaya yang tampil periode sekarang aja !
    $index = 0;
    if (count($JadwalDosen) < 1) {
      $this->idJadwalDosen = 01012011;
      $jadwal = AbsensiMahasiswa::with(['JadwalPraktikum' => function($query) {
        $query->where('id_jadwal_dosen', $this->idJadwalDosen);
      }])->where('id_mahasiswa', $this->idJadwalDosen)->get();
    } else {
      foreach ($JadwalDosen as $dataJadwalDosen) {
        $index+=1;
        $this->idJadwalDosen[$index] = $dataJadwalDosen->id;
      }

      $jadwal = AbsensiMahasiswa::with(['JadwalPraktikum' => function($query) {
        $query->where('id_jadwal_dosen', $this->idJadwalDosen);
      }])->where('id_mahasiswa', $data->id)->get();

      // EDITAN BARU NI SAGAN TANGGAL ERROR JAR TGL 14 - 10 - 2017
    // $jadwal = AbsensiMahasiswa::with('JadwalPraktikum')->where('id_mahasiswa', $data->id)->get();
    }
    // dd($jadwal);
    return view('mahasiswa.jadwal_saya', ['data' => $data, 'jadwal' => $jadwal]);
  }

  public function viewprofil()
  {
    $user = Auth::user();
    $data   = Mahasiswa::where('id_user', $user->id)->first();
    return view('mahasiswa.detail_mahasiswa', ['data' => $data, 'username' => $user->username]);
  }

  public function vieweditprofil()
  {
    $user = Auth::user();
    $data   = Mahasiswa::where('id_user', $user->id)->first();
    return view('mahasiswa.edit_mahasiswa', ['data' => $data, 'username' => $user->username]);
  }

  public function storeeditprofil(Request $request)
  {
    $user = Auth::user();
    $data = Mahasiswa::where('id_user', $user->id)->first();

    if($request->foto != null)
    {
      $namagambar = $request->NIDN.'.'.$request->foto->getClientOriginalExtension();
      $request->foto->move(public_path('images/mahasiswa'), $namagambar);
    }
    $this->validate($request, [
      'NPM' => [
        'required',
        Rule::unique('tabel_mahasiswa')->ignore($data->NPM, 'NPM'),
      ],
      'nama'       => 'required|string|max:255',
      'email'      => 'required|string|email|max:255',
      'no_hp'      => 'required|numeric',
      'username' => [
        'required',
        Rule::unique('users')->ignore($user->username, 'username'),
      ],
    ]);

    $updateuser  = User::find($user->id);
    $updatemahasiswa = Mahasiswa::where('id_user', $user->id)->First();

    if($request->password != null)
    {
      $this->validate($request, [
        'password_lama' => 'required|string|min:6',
        'password'      => 'required|string|min:6|confirmed',
      ]);

      if (Hash::check($request->password, $user->password)) {
        $updateuser->password = $request->password;
      }
    }

    $updateuser->username = $request->username;
    $updatemahasiswa->NPM    = $request->NPM;
    $updatemahasiswa->nama    = $request->nama;
    $updatemahasiswa->email   = $request->email;
    $updatemahasiswa->no_hp   = $request->no_hp;

    $updateuser->save();
    $updatemahasiswa->save();

    return redirect('/mahasiswa')->with('status', 'Data Anda Telah di Update');
  }
}
