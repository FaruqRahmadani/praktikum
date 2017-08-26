<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\Rule;
use App\Mahasiswa;
use App\AbsensiMahasiswa;
use App\Dosen;
use App\JadwalDosen;
use App\JadwalPraktikum;
use App\Admin;
use App\Materi;
use App\Periode;
use App\Berita;
use Auth;
use PDF;

class AdminController extends Controller
{
  public function dashboard()
  {
      return view('admin.dashboard');
  }

  public function datamahasiswa()
  {
    $data = Mahasiswa::with('user')->get();
    return view('admin.mahasiswa_data', ['data' => $data]);
  }

  public function datadosen()
  {
    $data = Dosen::with('user')->get();
    return view('admin.dosen_data', ['data' => $data]);
  }

  public function datamateri()
  {
    $data = Materi::all();
    return view('admin.materi_data', ['data' => $data]);
  }

  public function formtambahmateri()
  {
    return view('admin.tambah_materi');
  }

  public function storetambahmateri(Request $request)
  {
    $this->validate($request, [
      'kode_mk' => 'required|unique:tabel_materi_praktikum,kode_mk',
      'materi' => 'required',
      'semester' => 'required|numeric',
      'gambar' => 'required',
    ]);

    if (count(Materi::all()) == 0) {
      $id = 1;
    } else {
      $id = (Materi::all()->last()->id)+1;
    }


    $namagambar = 'materi-'.$id.'.'.$request->gambar->getClientOriginalExtension();

    $materi = new Materi;

    $materi->kode_mk          = $request->kode_mk;
    $materi->materi_praktikum = $request->materi;
    $materi->semester         = $request->semester;
    $materi->gambar           = $namagambar;

    $materi->save();
    $request->gambar->move(public_path('images/materi'), $namagambar);

    return redirect('/admin/datamateri')->with('status', 'Data Materi '.$request->materi.' Telah di Simpan');
  }

  public function formeditmateri($id)
  {
    try {
      $data = Materi::find(Crypt::decryptString($id));
      return view('admin.tambah_materi', ['data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function storeeditmateri(Request $request, $id)
  {
    try {
      $idmateri = Crypt::decryptString($id);
      $materi   = Materi::find($idmateri);

      $this->validate($request, [
        'kode_mk' => [
          'required',
          Rule::unique('tabel_materi_praktikum')->ignore($idmateri),
        ],
        'materi' => 'required',
        'semester' => 'required|numeric',
      ]);

      $materi->kode_mk          = $request->kode_mk;
      $materi->materi_praktikum = $request->materi;
      $materi->semester         = $request->semester;

      $materi->save();

      return redirect('/admin/datamateri')->with('status', 'Data Materi '.$request->materi.' Telah di Update');
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function viewlaporanabsen(){
    $data = JadwalDosen::with('materi', 'JadwalPraktikum', 'Dosen')->get();
    // dd($data);
    // dd($data->first()->materi->materi_praktikum);
    return view('admin.laporan_absen', ['data' => $data]);
  }

  public function printlaporanabsen($id){
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

  public function viewLaporanPraktikum(){
    $Periode = Periode::orderBy('id','desc')->get();
    $idperiode = $Periode->last()->id;
    $JadwalDosen = JadwalDosen::where('id_periode', $idperiode)->with('materi','dosen')->get();
    return view('admin.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode, 'idperiode' => $idperiode]);
  }

  public function viewLaporanPraktikumPeriode(Request $request){
    $JadwalDosen = JadwalDosen::where('id_periode', $request->periode)->with('materi','dosen')->get();
    $Periode = Periode::orderBy('id','desc')->get();
    return view('admin.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode, 'idperiode' => $request->periode]);
  }

  public function printLaporanPraktikum($id){
    $ids = Crypt::decryptString($id);
    $Periode = Periode::find($ids);
    $JadwalDosen = JadwalDosen::where('id_periode', $ids)->with('materi','dosen')->get();

    $pdf = PDF::loadView('pdf.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode]);
    $pdf->setPaper('a4', 'potrait');
    return $pdf->stream('absensi.pdf');
  }

  public function tambahberita(){
    return view('admin.input_berita');
  }

  public function storetambahberita(Request $request){
    $idadmin = Auth::guard('admin')->user()->id;
    $jmlhberita = Berita::all();
    if (count($jmlhberita) == 0) {
      $idberita = 1;
    } else {
      $idberita = ($jmlhberita->max('id'))+1;
    }
    $namagambar = $idberita.'.'.$request->gambar_artikel->getClientOriginalExtension();
    $store = new Berita;
    $store->id_admin = $idadmin;
    $store->judul    = $request->judul_artikel;
    $store->konten   = $request->isi_artikel;
    $store->gambar   = $namagambar;

    $request->gambar_artikel->move(public_path('images/berita'), $namagambar);

    $store->save();
    return redirect('/admin')->with('status', 'Berita Telah Di Tambahkan');
  }

  public function listberita(){
    $berita = Berita::with('admin')->get();
    return view('admin.list_berita', ['berita' => $berita]);
  }

  public function editberita($id){
    $ids = Crypt::decryptString($id);
    $data = Berita::find($ids);
    return view('admin.edit_berita', ['data' => $data]);
  }

  public function storeeditberita(Request $request,$id){
    $ids = Crypt::decryptString($id);
    $data = Berita::find($ids);

    if (isset($request->gambar_artikel)) {
      $namagambar = $ids.'.'.$request->gambar_artikel->getClientOriginalExtension();
      $request->gambar_artikel->move(public_path('images/berita'), $namagambar);
      $data->gambar   = $namagambar;
    }
    $data->judul    = $request->judul_artikel;
    $data->konten   = $request->isi_artikel;
    $data->save();
    return redirect('/admin')->with('status', 'Berita Telah Di Edit');
  }

  public function deleteberita($id){
    $ids = Crypt::decryptString($id);
    $data = Berita::find($ids);
    $data->delete();
    return redirect('/admin')->with('status', 'Berita Telah Di Hapus');
  }
}
