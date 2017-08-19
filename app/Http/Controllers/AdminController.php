<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\Rule;
use App\Mahasiswa;
use App\Dosen;
use App\Admin;
use App\Materi;
use Auth;

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
      'gambar' => 'required|image',
    ]);

    $id = (Materi::all()->last()->id)+1;
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
}
