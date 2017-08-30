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
use App\User;
use App\JadwalDosen;
use App\JadwalPraktikum;
use App\Admin;
use App\Materi;
use App\Periode;
use App\Berita;
use Auth;
use PDF;
use Hash;

class AdminController extends Controller
{
  public function dashboard()
  {
      return view('admin.dashboard');
  }

  public function EditProfil()
  {
    $iduser   = Auth::guard('admin')->user()->id;
    $Admin = Admin::find($iduser)->first();
    return view('admin.edit_admin', ['data' => $Admin]);
  }

  public function storeEditProfil(Request $request)
  {
    $iduser   = Auth::guard('admin')->user()->id;
    $Admin = Admin::find($iduser);

    $Admin->nama = $request->nama;
    $Admin->email = $request->email;
    $Admin->username = $request->username;

    if ($request->password != null) {
      $this->validate($request, [
        'password_lama' => 'required|string|min:6',
        'password'      => 'required|string|min:6|confirmed',
      ]);

      if (Hash::check($request->password_lama, $Admin->password)) {
        $Admin->password = bcrypt($request->password);
      }
    }

    $Admin->save();

    return redirect('/admin/edit')->with('status', 'Data Anda Telah di Update');
  }

  public function DataPeriode()
  {
    $Periode = Periode::all();
    return view('admin.periode', ['periode' => $Periode]);
  }

  public function tambahDataPeriode()
  {
    return view('admin.tambah_periode');
  }

  public function storetambahDataPeriode(Request $request)
  {
    dd($request);

    $Periode = new Periode;

    $Periode->periode = $request->periode;
    $Periode->tanggal_tutup = $request->tanggal_tutup;
    $Periode->status = $request->status;

    $Periode->save();

    return redirect('/admin/periode')->with('status', 'Data Periode Telah di Tambahkan');
  }

  public function editDataPeriode($id)
  {
    $ids = Crypt::decryptString($id);
    $Periode = Periode::find($ids);

    return view('admin.edit_periode', ['periode' => $Periode]);
  }

  public function storeeditDataPeriode(Request $request, $id)
  {
    $ids = Crypt::decryptString($id);
    $Periode = Periode::find($ids);

    $Periode->tanggal_tutup = $request->tanggal_tutup;
    $Periode->status = $request->status;
    $Periode->save();

    return redirect('/admin/periode')->with('status', 'Data Periode Telah di Update');
  }

  public function datamahasiswa()
  {
    $data = Mahasiswa::with('user')->get();
    return view('admin.mahasiswa_data', ['data' => $data]);
  }

  public function editDataMahasiswa($id)
  {
    $ids = Crypt::decryptString($id);
    $Mahasiswa = Mahasiswa::find($ids);
    $User = User::find($Mahasiswa->id_user);
    // dd($User);
    return view('admin.mahasiswa_edit', ['mahasiswa' => $Mahasiswa, 'user' => $User]);
  }

  public function storeeditDataMahasiswa(Request $request, $id)
  {
    $ids = Crypt::decryptString($id);

    $Mahasiswa = Mahasiswa::find($ids);
    $User = User::find($Mahasiswa->id_user);

    $this->validate($request, [
      'NPM' => [
        'required',
        Rule::unique('tabel_mahasiswa')->ignore($Mahasiswa->NPM, 'NPM'),
      ],
      'username' => [
        'required',
        Rule::unique('users')->ignore($User->username, 'username'),
      ],
    ]);

    if($request->foto != null)
    {
      $this->validate($request, [
        'foto' => 'image',
      ]);
      $namagambar = $request->NIDN.'.'.$request->foto->getClientOriginalExtension();
      $request->foto->move(public_path('images/dosen'), $namagambar);
      $Mahasiswa->foto = $namagambar;
    }

    $User->username = $request->username;
    $Mahasiswa->NPM    = $request->NPM;
    $Mahasiswa->nama    = $request->nama;
    $Mahasiswa->email   = $request->email;
    $Mahasiswa->no_hp   = $request->no_hp;

    $User->save();
    $Mahasiswa->save();

    return redirect('/admin/datamahasiswa')->with('status', 'Data Mahasiswa Telah di Update');
  }

  public function datadosen()
  {
    $data = Dosen::with('user')->get();
    return view('admin.dosen_data', ['data' => $data]);
  }

  public function editDataDosen($id)
  {
    $ids = Crypt::decryptString($id);
    $Dosen = Dosen::find($ids);
    $User = User::find($Dosen->id_user);
    // dd($User);
    return view('admin.dosen_edit', ['dosen' => $Dosen, 'user' => $User]);
  }

  public function storeeditDataDosen(Request $request, $id)
  {
    $ids = Crypt::decryptString($id);

    $Dosen = Dosen::find($ids);
    $User = User::find($Dosen->id_user);

    $this->validate($request, [
      'NIDN' => [
        'required',
        Rule::unique('tabel_dosen')->ignore($Dosen->NIDN, 'NIDN'),
      ],
      'username' => [
        'required',
        Rule::unique('users')->ignore($User->username, 'username'),
      ],
    ]);

    if($request->foto != null)
    {
      $this->validate($request, [
        'foto' => 'image',
      ]);
      $namagambar = $request->NIDN.'.'.$request->foto->getClientOriginalExtension();
      $request->foto->move(public_path('images/dosen'), $namagambar);
      $Dosen->foto = $namagambar;
    }

    if($request->password != null)
    {
      $this->validate($request, [
        'password_lama' => 'required|string|min:6',
        'password'      => 'required|string|min:6|confirmed',
      ]);

      if (Hash::check($request->password, $user->password)) {
        $User->password = $request->password;
      }
    }

    $User->username = $request->username;
    $Dosen->NIDN    = $request->NIDN;
    $Dosen->nama    = $request->nama;
    $Dosen->email   = $request->email;
    $Dosen->no_hp   = $request->no_hp;

    $User->save();
    $Dosen->save();

    return redirect('/admin/datadosen')->with('status', 'Data Dosen Telah di Update');
  }

  public function datagaleri()
  {
    return view('admin.galeri');
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
      return view('admin.edit_materi', ['data' => $data]);
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

      if ($request->gambar != null) {
        $namagambar = 'materi-'.$idmateri.'.'.$request->gambar->getClientOriginalExtension();
        $materi->gambar         = $request->semester;
        $request->gambar->move(public_path('images/materi'), $namagambar);
      }

      $materi->save();

      return redirect('/admin/datamateri')->with('status', 'Data Materi '.$request->materi.' Telah di Update');
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function viewlaporanabsen()
  {
    $Periode = Periode::orderBy('id', 'desc')->get();
    $idPeriode = $Periode->first()->id;

    $data = JadwalDosen::with('materi', 'JadwalPraktikum', 'Dosen')->where('id_periode', $idPeriode)->get();
    // dd($data);
    // dd($data->first()->materi->materi_praktikum);
    return view('admin.laporan_absen', ['data' => $data, 'periode' => $Periode]);
  }

  public function viewLaporanAbsenSpesified(Request $request)
  {
    $Periode = Periode::orderBy('id', 'desc')->get();
    $idPeriode = $Periode->first()->id;

    $data = JadwalDosen::with('materi', 'JadwalPraktikum', 'Dosen')->where('id_periode', $request->periode)->get();
    // dd($data);
    // dd($data->first()->materi->materi_praktikum);
    return view('admin.laporan_absen', ['data' => $data, 'periode' => $Periode]);
  }

  public function printlaporanabsen($id)
  {
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

  public function viewLaporanPraktikum()
  {
    $Periode = Periode::orderBy('id','desc')->get();
    $idperiode = $Periode->last()->id;
    $JadwalDosen = JadwalDosen::where('id_periode', $idperiode)->with('materi','dosen')->get();
    return view('admin.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode, 'idperiode' => $idperiode]);
  }

  public function viewLaporanPraktikumPeriode(Request $request)
  {
    $JadwalDosen = JadwalDosen::where('id_periode', $request->periode)->with('materi','dosen')->get();
    $Periode = Periode::orderBy('id','desc')->get();
    return view('admin.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode, 'idperiode' => $request->periode]);
  }

  public function printLaporanPraktikum($id)
  {
    $Admin = Auth::guard('admin')->user();
    $ids = Crypt::decryptString($id);
    $Periode = Periode::find($ids);
    $JadwalDosen = JadwalDosen::where('id_periode', $ids)->with('materi','dosen')->get();

    $pdf = PDF::loadView('pdf.laporan_praktikum', ['data' => $JadwalDosen, 'periode' => $Periode, 'admin' => $Admin]);
    $pdf->setPaper('a4', 'potrait');
    return $pdf->stream('absensi.pdf');
  }

  public function viewDetailLaporanPraktikum()
  {
    $Dosen = Dosen::all();
    $Periode = Periode::orderBy('id','desc')->get();
    return view('admin.form_detaillaporan_praktikum', ['dosen' => $Dosen, 'periode' => $Periode]);
  }

  public function viewDetailLaporanPraktikumSelected(Request $request)
  {
    $Dosen = Dosen::find($request->idDosen);
    $Periode = Periode::find($request->idPeriode);
    $JadwalDosen = JadwalDosen::where('id_dosen', $request->idDosen)->where('id_periode', $request->idPeriode)->with('materi','dosen','JadwalPraktikum')->get();
    // dd($JadwalDosen->first()->materi->materi_praktikum);
    return view('admin.detaillaporan_praktikum', ['dosen' => $Dosen, 'periode' => $Periode, 'JadwalDosen' => $JadwalDosen, 'idDosen' => $request->idDosen, 'idPeriode' => $request->idPeriode]);
  }

  public function printDetailLaporanPraktikum($idDosen, $idPeriode)
  {
    $idsDosen = Crypt::decryptString($idDosen);
    $idsPeriode = Crypt::decryptString($idPeriode);
    $Admin = Auth::guard('admin')->user();

    $Dosen = Dosen::find($idsDosen);
    $Periode = Periode::find($idsPeriode);
    $JadwalDosen = JadwalDosen::where('id_dosen', $idsDosen)->where('id_periode', $idsPeriode)->with('materi','dosen','JadwalPraktikum')->get();

    $pdf = PDF::loadView('pdf.detaillaporan_praktikum', ['dosen' => $Dosen, 'periode' => $Periode, 'jadwaldosen' => $JadwalDosen, 'admin' => $Admin]);
    $pdf->setPaper('a4', 'potrait');
    return $pdf->stream('absensi.pdf');
  }

  public function tambahberita()
  {
    return view('admin.input_berita');
  }

  public function storetambahberita(Request $request)
  {
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

  public function listberita()
  {
    $berita = Berita::with('admin')->get();
    return view('admin.list_berita', ['berita' => $berita]);
  }

  public function editberita($id)
  {
    $ids = Crypt::decryptString($id);
    $data = Berita::find($ids);
    return view('admin.edit_berita', ['data' => $data]);
  }

  public function storeeditberita(Request $request,$id)
  {
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

  public function deleteberita($id)
  {
    $ids = Crypt::decryptString($id);
    $data = Berita::find($ids);
    $data->delete();
    return redirect('/admin')->with('status', 'Berita Telah Di Hapus');
  }
}
