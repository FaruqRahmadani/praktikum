<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use App\Dosen;
use App\AbsensiMahasiswa;
use App\Mahasiswa;
use App\Materi;
use App\JadwalDosen;
use App\JadwalPraktikum;
use App\Periode;
use Auth;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Jobs\SendEmailKelasBatal;

class DosenController extends Controller
{
  public function dashboard()
  {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.dashboard', ['datauser' => $datauser]);
  }

  public function viewprofil()
  {
      $username = Auth::user()->username;
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.detail_dosen', ['datauser' => $datauser, 'data' => $datauser, 'username' => $username]);
  }

  public function editprofil()
  {
      $username = Auth::user()->username;
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.edit_dosen', ['datauser' => $datauser, 'data' => $datauser, 'username' => $username]);
  }

  public function storeeditprofil(Request $request)
  {
    $user = Auth::user();
    $data = Dosen::where('id_user', $user->id)->first();
    if($request->foto != null)
    {
      $this->validate($request, [
        'foto' => 'image',
      ]);
      $namagambar = $request->NIDN.'.'.$request->foto->getClientOriginalExtension();
      $request->foto->move(public_path('images/dosen'), $namagambar);
    }
    $this->validate($request, [
      'NIDN' => [
        'required',
        Rule::unique('tabel_dosen')->ignore($data->NIDN, 'NIDN'),
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
    $updatedosen = Dosen::where('id_user', $user->id)->First();
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
    $updatedosen->NIDN    = $request->NIDN;
    $updatedosen->nama    = $request->nama;
    $updatedosen->email   = $request->email;
    $updatedosen->no_hp   = $request->no_hp;

    $updateuser->save();
    $updatedosen->save();

    return redirect('/dosen')->with('status', 'Data Anda Telah di Update');
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
      $data     = Mahasiswa::find(Crypt::decryptString($id));
      return view('dosen.detail_mahasiswa', ['datauser' => $datauser, 'data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function datadosen()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = Dosen::all();
    return view('dosen.data_dosen', ['datauser' => $datauser, 'data' => $data]);
  }

  public function datadosendetail($id)
  {
    try {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      $data     = Dosen::find(Crypt::decryptString($id));
      return view('dosen.detail_dosen', ['datauser' => $datauser, 'data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function datamateri()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = JadwalDosen::with('materi')->where('id_dosen', $datauser->id)->get();
    return view('dosen.materi_dosen', ['datauser' => $datauser, 'data' => $data]);
  }

  public function deletemateri($id)
  {
    $idx = Crypt::decryptString($id);
    $data = JadwalDosen::find($idx);
    $materi = JadwalDosen::with('materi')->where('id', $idx)->first();
    $data->delete();
    return redirect('/dosen/materi')->with('status', 'Data Materi '.$materi->materi->materi_praktikum.' Telah di Hapus');
  }

  public function tambahmateri(){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data = Materi::all();
    $jadwaldosen = JadwalDosen::where('id_dosen', $datauser->id)->get();
    return view('dosen.tambahmateri', ['datauser' => $datauser, 'data' => $data, 'jadwaldosen' => $jadwaldosen]);
  }

  public function storetambahmateri($id){
    $idx = Crypt::decryptString($id);
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $periode  = Periode::all()->last();
    $data  = Materi::find($idx);
    $store = new JadwalDosen;
    $store->id_praktikum = $idx;
    $store->id_dosen = $datauser->id;
    $store->id_periode = $periode->id;
    $store->save();
    return redirect('/dosen/materi/add')->with('status', 'Data Materi '.$data->materi_praktikum.' Telah di Tambahkan');
  }

  public function datajadwal(){
    $iduser        = Auth::user()->id;
    $datauser      = Dosen::where('id_user', $iduser)->first();
    $data          = JadwalDosen::with('JadwalPraktikum', 'materi')->where('id_dosen', $datauser->id)->get();
    return view('dosen.jadwal_dosen', ['datauser' => $datauser, 'data' => $data]);
  }

  public function tambahjadwal(){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = JadwalDosen::with('materi')->where('id_dosen', $datauser->id)->get();
    $datapraktikum = JadwalPraktikum::all();
    return view('dosen.tambah_jadwal', ['datauser' => $datauser, 'data' => $data, 'datapraktikum' => $datapraktikum]);
  }

  public function storetambahjadwal(Request $request){
    $this->validate($request, [
      'materi_praktikum' => 'required|digits_between:1,35',
      'pertemuan'        => 'required|digits_between:1,35',
      'nama_kelas'       => 'required|string|min:6',
      'ruangan'          => 'required|string|min:6',
      'tanggal'          => 'required||date_format:Y-m-d|after:'.date('Y-m-d'),
      'waktu_mulai'      => 'required|date_format:g:i A',
      'waktu_selesai'    => 'required|date_format:g:i A',
    ]);
    $waktumulai   = Carbon::parse($request->waktu_mulai)->format('H:i:s');
    $waktuselesai = Carbon::parse($request->waktu_selesai)->format('H:i:s');

    $store = new JadwalPraktikum;
    $store->id_jadwal_dosen = $request->materi_praktikum;
    $store->pertemuan       = $request->pertemuan;
    $store->nama_kelas      = $request->nama_kelas;
    $store->ruangan         = $request->ruangan;
    $store->tanggal         = $request->tanggal;
    $store->waktu_mulai     = $waktumulai;
    $store->waktu_selesai   = $waktuselesai;
    $store->save();

    return redirect('/dosen/jadwal/add')->with('status', 'Jadwal Materi Telah di Tambahkan');
  }

  public function editjadwal($ids){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    // $data     = JadwalDosen::with('materi')->where('id_dosen', $datauser->id)->get();
    $id = Crypt::decryptString($ids);
    $data = JadwalPraktikum::find($id);
    // dd($data);
    return view('dosen.edit_jadwal', ['datauser' => $datauser, 'data' => $data]);
  }

  public function storeeditjadwal(Request $request, $ids){
    $this->validate($request, [
      'nama_kelas'       => 'required|string|min:6',
      'ruangan'          => 'required|string|min:6',
      'tanggal'          => 'required||date_format:Y-m-d|afterorequal:'.date('Y-m-d'),
      'waktu_mulai'      => 'required|date_format:g:i A',
      'waktu_selesai'    => 'required|date_format:g:i A',
    ]);
    $waktumulai   = Carbon::parse($request->waktu_mulai)->format('H:i:s');
    $waktuselesai = Carbon::parse($request->waktu_selesai)->format('H:i:s');

    $id = Crypt::decryptString($ids);
    $store = JadwalPraktikum::find($id);

    $store->nama_kelas      = $request->nama_kelas;
    $store->ruangan         = $request->ruangan;
    $store->tanggal         = $request->tanggal;
    $store->waktu_mulai     = $waktumulai;
    $store->waktu_selesai   = $waktuselesai;

    $store->save();

    return redirect('/dosen/jadwal')->with('status', 'Jadwal Materi Telah di Update');
  }

  public function ubahstatusjadwal($id,$status){
    // dd(Crypt::decryptString($status));
    $tipe = Crypt::decryptString($status);
    $store = JadwalPraktikum::find(Crypt::decryptString($id));
    $dataabsensi = AbsensiMahasiswa::where('id_jadwal_praktikum', Crypt::decryptString($id))->get();
    foreach ($dataabsensi as $dataabsensis) {

      $datamahasiswa = Mahasiswa::find($dataabsensis->id_mahasiswa);
      $datajadwaldosen = JadwalDosen::find($store->id_jadwal_dosen);
      $datadosen = Dosen::find($datajadwaldosen->id_dosen);
      $datamateri = Materi::find($datajadwaldosen->id_praktikum);

      if ($tipe == 0) {
        $pesan = 'Telah di Batalkan';
      } else {
        $pesan = 'Diaktifkan Kembali';
      }
      //NPM, nama, email, nama materi, nama dosen, nama kelas, pertemuan, tanggal, pesan$datamahasiswa->NPM,$datamahasiswa->nama,$datamahasiswa->email,$datamateri->materi_praktikum,$datadosen->nama,$store->nama_kelas,$store->pertemuan,$store->tanggal,$pesan
      $job = New SendEmailKelasBatal($datamahasiswa->NPM,$datamahasiswa->nama,$datamahasiswa->email,$datamateri->materi_praktikum,$datadosen->nama,$store->nama_kelas,$store->pertemuan,$store->tanggal,$pesan);
      $this->dispatch($job);
    }

    $store->tipe = $tipe;
    $store->save();

    if ($tipe == 0)
    {
      $message = 'Jadwal Kelas '.$store->nama_kelas.' Pertemuan Ke-'.$store->pertemuan.' Telah di Non-Aktifkan';
    }else{
      $message = 'Jadwal Kelas '.$store->nama_kelas.' Pertemuan Ke-'.$store->pertemuan.' Telah di Aktifkan';
    }
    return redirect('/dosen/jadwal')->with('status', $message);
  }

  public function viewabsen(){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data = JadwalDosen::with('JadwalPraktikum','materi')->where('id_dosen', $datauser->id)->get();
    return view('dosen.absensi', ['datauser' => $datauser, 'data' => $data]);
  }

  public function viewfilterabsen(Request $request){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data = JadwalDosen::with('JadwalPraktikum','materi')->where('id_dosen', $datauser->id)->get();
    return view('dosen.absen', ['datauser' => $datauser, 'data' => $data, 'filter' => $request->filter]);
  }

  public function viewdetailabsen($id){
    $ids = Crypt::decryptString($id);
    $JadwalPraktikum = JadwalPraktikum::find($ids);
    $JadwalDosen = JadwalDosen::find($JadwalPraktikum->id_jadwal_dosen);
    $Materi = Materi::find($JadwalDosen->id_praktikum);
    $Dosen = Dosen::find($JadwalDosen->id_dosen);

    $data = AbsensiMahasiswa::with('Mahasiswa')->where('id_jadwal_praktikum', $ids)->get();

    $pdf = PDF::loadView('pdf.absensi', ['data' => $data, 'dosen' => $Dosen, 'materi' => $Materi, 'JadwalPraktikum' => $JadwalPraktikum]);
    $pdf->setPaper('a4', 'potrait');
  	return $pdf->stream('absensi.pdf');
  }

  // public function cetakabsen(Request $request){
  //   $iduser   = Auth::user()->id;
  //   $datauser = Dosen::where('id_user', $iduser)->first();
  //   $data = JadwalDosen::with('JadwalPraktikum','materi')->where('id_dosen', $datauser->id)->get();
  //   return view('dosen.absen', ['datauser' => $datauser, 'data' => $data, 'filter' => $request->filter]);
  // }

}
