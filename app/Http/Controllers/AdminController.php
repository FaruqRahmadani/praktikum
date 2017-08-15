<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    $data = Mahasiswa::all();
    return view('admin.mahasiswa_data', ['data' => $data]);
  }

  public function datadosen()
  {
    $data = Dosen::all();
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
      'materi' => 'required',
      'semester' => 'required|numeric',
    ]);

    $materi = new Materi;

    $materi->materi_praktikum = $request->materi;
    $materi->semester         = $request->semester;

    $materi->save();

    return redirect('/admin/datamateri');
  }
}
