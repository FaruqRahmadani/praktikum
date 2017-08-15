<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest:admin')->except('logout');
  }

  public function LoginForm($code1,$code2,$code3,$code4){
    if (($code1 == (md5(date("Y-m-d").date("H").('Ini Rahasia Loooohhhh.......'))))&&($code2 == (md5(date("Y-m-d").date("H").('Hannn Kada Percaya Inya....'))))&&($code3 == (md5(date("z-D-m-Y").date("H"))))&&($code4 == (md5(date("l-m-Y").date("H")))))
    {
      return view('admin.login');
    } else {
      abort(404);
    }
  }

  public function login(Request $request){
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required',
    ]);

    $credentials = [
      'username' => $request['username'],
      'password' => $request['password'],
    ];
    if (Auth::guard('admin')->attempt($credentials)) {
      // dd(Auth::guard());
      return redirect('/admin');
    }
    return redirect()->back()->withInput($request->only('username', 'remember'));
  }

  protected function guard()
  {
      return Auth::guard('admin');
  }
}
