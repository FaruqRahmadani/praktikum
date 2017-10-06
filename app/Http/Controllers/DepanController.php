<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Mahasiswa;
use App\User;
use App\Materi;
use App\Berita;
use App\Galeri;
use Mail;

class DepanController extends Controller
{
    public function index()
    {
      $Materi = Materi::all();
      $Berita = Berita::with('admin')->limit(4)->orderBy('id', 'desc')->get();
      $Galeri = Galeri::all();
      // dd($Berita);
      return view('depan.index', ['materi' => $Materi, 'berita' => $Berita, 'galeri' => $Galeri]);
    }

    public function ForgotPassword()
    {
      return view('depan.ForgotPassword');
    }

    public function storeForgotPassword(Request $request)
    {
      $Mahasiswa = Mahasiswa::where('NPM', $request->NPM)->first();
      if (count($Mahasiswa) < 1) {
        return redirect('/forgotpassword')->with('status', 'NPM Tidak Ditemukan, Coba Lagi')
                                          ->withInput();
      }

      $link = $request->url().'/'.Crypt::encryptString($Mahasiswa->id).'/'.Crypt::encryptString(Carbon::now()->addHour());

      $to   = $Mahasiswa->email;
      $nama = $Mahasiswa->nama;
      $data = array($nama,$link);
        //
        Mail::send('email.forgotpassword', ['data' => $data], function ($mail) use ($to,$nama)
        {
          // Email dikirimkan ke address "momo@deviluke.com"
          // dengan nama penerima "Momo Velia Deviluke"
          $mail->to($to, $nama);

          // Copy carbon dikirimkan ke address "haruna@sairenji"
          // dengan nama penerima "Haruna Sairenji"
          // $mail->cc('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

          $mail->subject('Praktikum FTI UNISKA : Permintaan Ganti Password');
        });

      return view('depan.ForgotPassword_sukses')->with('status', 'Link Ganti Password Telah Dikirimkan ke E-Mail Anda');
    }

    public function EditForgotPassword($id,$waktu)
    {
      try {
        $waktus = Crypt::decryptString($waktu);
        if ($waktus < Carbon::now()) {
          return view('depan.ForgotPassword_kadaluarsa');
        }

        $ids = Crypt::decryptString($id);

        $Mahasiswa = Mahasiswa::find($ids);

        return view('depan.editForgotPassword', ['mahasiswa' => $Mahasiswa]);
      } catch (DecryptException $e) {
        abort(404);
      }
    }

    public function storeEditForgotPassword(request $request, $id)
    {
      $ids = Crypt::decryptString($id);

      $Mahasiswa = Mahasiswa::find($ids);
      $User = User::find($Mahasiswa->id_user);

      $this->validate($request, [
        // 'password_lama' => 'required|string|min:6',
        'password'      => 'required|string|min:6|confirmed',
      ]);

      $User->password = bcrypt($request->password);
      $User->save();

      return redirect('/login')->with('status', 'Password Telah di Update, Silahkan Login');
    }

}
