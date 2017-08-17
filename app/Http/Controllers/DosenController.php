<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Materi;
use App\JadwalDosen;
use App\Periode;
use Auth;

class DosenController extends Controller
{
  public function dashboard()
  {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.dashboard', ['datauser' => $datauser]);
  }

  public function viewprofil()
  {
      $username = Auth::user()->username;
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.detail_dosen', ['datauser' => $datauser, 'data' => $datauser, 'username' => $username]);
  }

  public function editprofil()
  {
      $username = Auth::user()->username;
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      return view('dosen.edit_dosen', ['datauser' => $datauser, 'data' => $datauser, 'username' => $username]);
  }

  public function storeeditprofil(Request $request)
  {
    $user = Auth::user();
    $data = Dosen::where('id_user', $user->id)->first();
    if($request->foto != null)
    {
      $this->validate($request, [
        'foto' => 'image',
      ]);
      $namagambar = $request->NIDN.'.'.$request->foto->getClientOriginalExtension();
      $request->foto->move(public_path('images/dosen'), $namagambar);
    }
    $this->validate($request, [
      'NIDN' => [
        'required',
        Rule::unique('tabel_dosen')->ignore($data->NIDN, 'NIDN'),
      ],
      'nama'       => 'required|string|max:255',
      'email'      => 'required|string|email|max:255',
      'no_hp'      => 'required|numeric',
      'username' => [
        'required',
        Rule::unique('users')->ignore($user->username, 'username'),
      ],
    ]);

    $updateuser  = User::find($user->id);
    $updatedosen = Dosen::where('id_user', $user->id)->First();
    if($request->password != null)
    {
      $this->validate($request, [
        'password_lama' => 'required|string|min:6',
        'password'      => 'required|string|min:6|confirmed',
      ]);

      if (Hash::check($request->password, $user->password)) {
        $updateuser->password = $request->password;
      }
    }

    $updateuser->username = $request->username;
    $updatedosen->NIDN    = $request->NIDN;
    $updatedosen->nama    = $request->nama;
    $updatedosen->email   = $request->email;
    $updatedosen->no_hp   = $request->no_hp;

    $updateuser->save();
    $updatedosen->save();

    return redirect('/dosen')->with('status', 'Data Anda Telah di Update');
  }

  public function datamahasiswa()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = Mahasiswa::all();
    return view('dosen.data_mahasiswa', ['datauser' => $datauser, 'data' => $data]);
  }

  public function datamahasiswadetail($id)
  {
    try {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      $data     = Mahasiswa::find(Crypt::decryptString($id));
      return view('dosen.detail_mahasiswa', ['datauser' => $datauser, 'data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function datadosen()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = Dosen::all();
    return view('dosen.data_dosen', ['datauser' => $datauser, 'data' => $data]);
  }

  public function datadosendetail($id)
  {
    try {
      $iduser   = Auth::user()->id;
      $datauser = Dosen::where('id_user', $iduser)->first();
      $data     = Dosen::find(Crypt::decryptString($id));
      return view('dosen.detail_dosen', ['datauser' => $datauser, 'data' => $data]);
    } catch (DecryptException $e) {
      return back();
    }
  }

  public function datamateri()
  {
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data     = JadwalDosen::with('materi')->where('id_dosen', $datauser->id)->get();
    return view('dosen.materi_dosen', ['datauser' => $datauser, 'data' => $data]);
  }

  public function deletemateri($id)
  {
    $idx = Crypt::decryptString($id);
    $data = JadwalDosen::find($idx);
    $materi = JadwalDosen::with('materi')->where('id', $idx)->first();
    $data->delete();
    return redirect('/dosen/materi')->with('status', 'Data Materi '.$materi->materi->materi_praktikum.' Telah di Hapus');
  }

  public function tambahmateri(){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $data = Materi::all();
    $jadwaldosen = JadwalDosen::where('id_dosen', $datauser->id)->get();
    return view('dosen.tambahmateri', ['datauser' => $datauser, 'data' => $data, 'jadwaldosen' => $jadwaldosen]);
  }

  public function storetambahmateri(Request $request){
    $iduser   = Auth::user()->id;
    $datauser = Dosen::where('id_user', $iduser)->first();
    $periode  = Periode::all()->last();
    $data  = Materi::all();
    foreach ($data as $datas) {
      $idx = $datas->id;
      $id  = 'data'.$idx;
      if ($request->$id == 'true')
      {
        //pakai query builder - insert data mutiple
        DB::table('tabel_jadwal_dosen')->insert([
          'id_praktikum' => $idx,
          'id_dosen'     => $datauser->id,
          'id_periode'   => $periode->id,
          'tipe'         => 0,
        ]);
      }
    }
    return redirect('/dosen/materi')->with('status', 'Data Materi Telah di Tambahkan');
  }

}
