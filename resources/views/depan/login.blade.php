@extends('depan.layouts.master')
@section('content')
        <div class="login-container">
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                  @if (session('status'))
                    <div class="alert alert-info">
                      {{session('status')}}
                    </div>
                  @endif
                  @if(count($errors) > 0)
                    <div class="alert alert-info">
                      <ul>
                        @if ($errors->first() == 'These credentials do not match our records.')
                          Username dan Password Tidak Ditemukan
                        @else
                          @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                          @endforeach
                        @endif
                      </ul>
                    </div>
                  @endif
                    <div class="login-title"><strong>Selamat Datang</strong>, Silakan Masuk</div>
                    <form action="{{ route('login') }}" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username"/ required autofocus value={{old('username')}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/forgotpassword" class="btn btn-link btn-block">Lupa Password?</a>
                        </div>
                        <div class="col-md-6">
                          {{ csrf_field() }}
                            <button class="btn btn-info btn-block">Masuk</button>
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
