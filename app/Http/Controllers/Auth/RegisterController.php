<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $username   = 'username';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      if($data['tipe'] == 1){
        return Validator::make($data, [
          'nomorinduk' => 'required|numeric|unique:tabel_dosen,NIDN',
          'nama'       => 'required|string|max:255',
          'no_hp'      => 'required|numeric',
          'email'      => 'required|string|email|max:255',
          'foto'       => 'required',
          'username'   => 'required|string|max:255|unique:users,username',
          'password'   => 'required|string|min:6|confirmed',
        ]);
      }else{
        return Validator::make($data, [
          'nomorinduk' => 'required|numeric|unique:tabel_mahasiswa,NPM',
          'nama'       => 'required|string|max:255',
          'no_hp'      => 'required|numeric',
          'email'      => 'required|string|email|max:255',
          'foto'       => 'required',
          'username'   => 'required|string|max:255|unique:users,username',
          'password'   => 'required|string|min:6|confirmed',
        ]);
      }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user      = new User;
      $dosen     = new Dosen;
      $mahasiswa = new Mahasiswa;


      if (count(User::all()) < 1) {
        $iduser = 1;
      } else {
        $iduser = (User::all()->last()->id + 1);
      }

      $namagambar = $data['nomorinduk'].'.'.$data['foto']->getClientOriginalExtension();

        if ($data['tipe']==1)
        {
          $dosen->id_user = $iduser;
          $dosen->NIDN    = $data['nomorinduk'];
          $dosen->nama    = $data['nama'];
          $dosen->no_hp   = $data['no_hp'];
          $dosen->foto    = $namagambar;
          $dosen->email   = $data['email'];
          $data['foto']->move(public_path('images/dosen'), $namagambar);

          $dosen->save();
        } else
        if ($data['tipe']==2)
        {
          $mahasiswa->id_user = $iduser;
          $mahasiswa->NPM     = $data['nomorinduk'];
          $mahasiswa->nama    = $data['nama'];
          $mahasiswa->no_hp   = $data['no_hp'];
          $mahasiswa->foto    = $namagambar;
          $mahasiswa->email   = $data['email'];
          $data['foto']->move(public_path('images/mahasiswa'), $namagambar);

          $mahasiswa->save();
        }

        return User::create([
          'username' => $data['username'],
          'password' => bcrypt($data['password']),
          'tipe'     => $data['tipe'],
        ]);
    }
}
