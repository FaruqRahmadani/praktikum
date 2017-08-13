<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

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
}
