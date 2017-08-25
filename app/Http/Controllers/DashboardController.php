<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use File;
use PDF;
use Mail;
use Config;

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

  public function registermahasiswa()
  {
    return view('depan.register_mahasiswa');
  }

  public function registerdosen()
  {
    return view('depan.register_dosen');
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

  public function mail(){
    // dd(Config::get('mail'));
    $data = 'TEST';
    Mail::send('emails', ['data' => $data], function ($mail)
    {
      // Email dikirimkan ke address "momo@deviluke.com"
      // dengan nama penerima "Momo Velia Deviluke"
      $mail->to('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

      // Copy carbon dikirimkan ke address "haruna@sairenji"
      // dengan nama penerima "Haruna Sairenji"
      $mail->cc('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

      $mail->subject('Hello World!');
    });
  }
}
