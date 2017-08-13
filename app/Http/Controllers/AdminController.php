<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Dosen;

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
}
