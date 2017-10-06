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
                    <div class="alert alert-info">
                      <ul>
                        Link Ganti Password Telah Kada Luarsa, Silahkan Ulangi
                      </ul>
                    </div>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 FTI UNISKA
                    </div>
                </div>
            </div>
        </div>
@endsection
