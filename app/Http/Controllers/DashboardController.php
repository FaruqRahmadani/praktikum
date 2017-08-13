<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
  protected $user;

  public function index()
  {
    if (Auth::user()->tipe == 1){
      return redirect('/dosen');
    } else {
      return redirect('/mahasiswa');
    }
  }
}
