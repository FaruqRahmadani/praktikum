<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Dosen;
use App\Mahasiswa;
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

}
