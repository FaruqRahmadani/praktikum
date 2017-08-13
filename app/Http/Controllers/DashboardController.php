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

  public function login($code1,$code2,$code3,$code4){
    if (($code1 == (md5(date("Y-m-d").date("H").('Ini Rahasia Loooohhhh.......'))))&&($code2 == (md5(date("Y-m-d").date("H").('Hannn Kada Percaya Inya....'))))&&($code3 == (md5(date("z-D-m-Y").date("H"))))&&($code4 == (md5(date("l-m-Y").date("H")))))
    {
      dd('INI NANTINYA FORM LOGIN ADMIN');
    } else {
      abort(404);
    }
  }
}
