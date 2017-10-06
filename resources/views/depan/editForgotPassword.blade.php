@extends('depan.layouts.master')
@section('content')
        <div class="login-container">
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                  @if((session('status')))
                    <div class="alert alert-info">
                      <ul>
                        {{(session('status'))}}
                      </ul>
                    </div>
                  @endif
                    <div class="login-title"><strong>Lupa Password</strong></div>
                    <form action="{{Request::url()}}" class="form-horizontal" method="post">
                      <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="NPM" class="form-control" placeholder="Masukan NPM"/ required value={{$mahasiswa->NPM}} disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="Nama" class="form-control" placeholder="Masukan NPM"/ required value={{$mahasiswa->nama}} disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/ required pattern=".{6,}" title="Minimal 6 Karakter" autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password"/ required pattern=".{6,}" title="Minimal 6 Karakter">
                        </div>
                      </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            {{-- <a href="/forgotpassword" class="btn btn-link btn-block">Lupa Password?</a> --}}
                        </div>
                        <div class="col-md-6">
                          {{ csrf_field() }}
                            <button class="btn btn-info btn-block">Confirm</button>
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
