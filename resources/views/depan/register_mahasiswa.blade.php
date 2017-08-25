@extends('depan.layouts.master')
@section('content')
        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Selamat Datang</strong>, Silakan Register (Dosen)</div>
                    <form action="{{ route('register') }}" class="form-horizontal" method="post">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="text" name="nomorinduk" class="form-control" placeholder="NPM"/ required autofocus" pattern="(?=.*[0-9]).{5,}" tittle="minimal sekian" value={{old('nomorinduk')}}>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="text" name="nama" class="form-control" placeholder="Nama"/ required value={{old('nama')}}>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP"/ required pattern="(?=.*[0-9]).{10,}" value={{old('no_hp')}}>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="email" name="email" class="form-control" placeholder="E-Mail"/ required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autocomplete="off" value={{old('email')}}>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="file" name="foto" class="form-control" placeholder="Foto"/ accept="image/*" required value={{old('foto')}}>
                          </div>
                      </div>

                      <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username"/ required pattern=".{5,}" value={{old('username')}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/ required pattern=".{5,}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password"/ required pattern=".{5,}">
                        </div>
                    </div>
                    <input type="hidden" name="tipe" class="form-control" placeholder="Re-Password" value="2"/>
                    <div class="form-group">
                        <div class="col-md-6">
                            {{-- <a href="#" class="btn btn-link btn-block">Lupa Password?</a> --}}
                        </div>
                        <div class="col-md-6">
                          {{ csrf_field() }}
                            <button class="btn btn-info btn-block">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 FTI UNISKA
                    </div>
                </div>
            </div>
        </div>
@endsection
