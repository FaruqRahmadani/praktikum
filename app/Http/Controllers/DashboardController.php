<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use File;
use PDF;

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

  // public function login($code1,$code2,$code3,$code4){
  //   if (($code1 == (md5(date("Y-m-d").date("H").('Ini Rahasia Loooohhhh.......'))))&&($code2 == (md5(date("Y-m-d").date("H").('Hannn Kada Percaya Inya....'))))&&($code3 == (md5(date("z-D-m-Y").date("H"))))&&($code4 == (md5(date("l-m-Y").date("H")))))
  //   {
  //     return view('admin.login');
  //   } else {
  //     abort(404);
  //   }
  // }

  public function pdf(){
    $pdf = PDF::loadView('pdf.laporan', ['data' => 'asd']);
  	return $pdf->stream('document.pdf');

  }
}
