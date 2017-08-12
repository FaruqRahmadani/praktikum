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
        return Validator::make($data, [
            'nomorinduk' => 'required|numeric',
            'nama'       => 'required|string|max:255',
            'no_hp'      => 'required|numeric',
            'email'      => 'required|string|email|max:255',
            'foto'       => 'required|string',
            'username'   => 'required|string|max:255|unique:users',
            'password'   => 'required|string|min:6|confirmed',
        ]);
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

      $iduser = (User::all()->last()->id + 1);

        if ($data['tipe']==1)
        {
          $dosen->id_user = $iduser;
          $dosen->NIDN    = $data['nomorinduk'];
          $dosen->nama    = $data['nama'];
          $dosen->no_hp   = $data['no_hp'];
          $dosen->foto    = $data['foto'];
          $dosen->email   = $data['email'];

          $dosen->save();
        } else
        if ($data['tipe']==2)
        {
          $mahasiswa->id_user = $iduser;
          $mahasiswa->NPM     = $data['nomorinduk'];
          $mahasiswa->nama    = $data['nama'];
          $mahasiswa->no_hp   = $data['no_hp'];
          $mahasiswa->foto    = $data['foto'];
          $mahasiswa->email   = $data['email'];

          $mahasiswa->save();
        }

        return User::create([
          'username' => $data['username'],
          'password' => bcrypt($data['password']),
          'tipe'     => $data['tipe'],
        ]);
    }
}
