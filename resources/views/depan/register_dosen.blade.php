@extends('depan.layouts.master')
@section('content')
        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Selamat Datang</strong>, Silakan Register (Dosen)</div>
                    {{-- <form action="{{ route('register') }}" class="form-horizontal" enctype="multipart/form-data" method="post"> --}}
                      {!! Form::open(['url'=>route('register'),'files'=>true,'class'=>'form-horizontal', 'method' => 'POST', 'role' => 'form']) !!}

                      <div class="form-group">
                          <div class="col-md-12">
                              {{-- <input type="text" name="nomorinduk" class="form-control" placeholder="NIDN"/ required autofocus" pattern="[0-9]{5,}" value={{old('nomorinduk')}}> --}}
                              {!! Form::text('nomorinduk', old('nomorinduk'),['placeholder' => 'NIDN','class' => 'form-control', 'required', 'pattern' => '[0-9]{8,}' ,'title'=>'NIDN berupa angka minimal 8 digit']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              {{-- <input type="text" name="nama" class="form-control" placeholder="Nama"/ required value={{old('nama')}}> --}}
                              {!! Form::text('nama', old('nama'),['placeholder' => 'Nama','class' => 'form-control', 'required','pattern'=>'[a-zA-Z\s.,]{3,}','title'=>'nama tidak boleh mengandung angka']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              {{-- <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP"/ required pattern="[0-9]){10,}" value={{old('no_hp')}}> --}}
                              {!! Form::text('no_hp', old('no_hp'),['placeholder' => 'Nomor HP','class' => 'form-control', 'required', 'pattern' => '[0-9]{10,12}','title'=>'No.hp berupa angka 8-12 digit']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              {{-- <input type="email" name="email" class="form-control" placeholder="E-Mail"/ required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autocomplete="off" value={{old('email')}}> --}}
                              {!! Form::email('email', old('email'),['placeholder' => 'E-mail','class' => 'form-control', 'required', 'autocomplete' => 'off', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              {{-- <input type="file" name="foto" class="form-control" placeholder="Foto"/ accept="image/*" required value={{old('foto')}}> --}}
                              {{-- {!! Form::file('foto',['placeholder' => 'Foto', 'class' => 'form-control', 'required', 'accept' => 'image/*']) !!} --}}
                          </div>
                      </div>

                      <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            {{-- <input type="text" name="username" class="form-control" placeholder="Username"/ required pattern=".{5,}" value={{old('username')}}> --}}
                            {!! Form::text('username', old('username'),['placeholder' => 'Username','class' => 'form-control', 'required', 'pattern' => '.{5,}','title'=>'username minimal 5 karakter']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {{-- <input type="password" name="password" class="form-control" placeholder="Password"/ required pattern=".{5,}"> --}}
                            {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required', 'pattern' => '.{5,}']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {{-- <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password"/ required pattern=".{5,}"> --}}
                            {!! Form::password('password_confirmation',['placeholder' => 'Re-Password','class' => 'form-control', 'required', 'pattern' => '.{5,}']) !!}
                        </div>
                    </div>
                    {{-- <input type="hidden" name="tipe" class="form-control" placeholder="Re-Password" value="2"/> --}}
                    {!! Form::hidden('tipe', '1',['placeholder' => 'Username','class' => 'form-control', 'required', 'pattern' => '.{5,}']) !!}

                    <div class="form-group">
                        <div class="col-md-6">
                            {{-- <a href="#" class="btn btn-link btn-block">Lupa Password?</a> --}}
                        </div>
                        <div class="col-md-6">
                          {{ csrf_field() }}
                            {{-- <button class="btn btn-info btn-block">Register</button> --}}
                            {!! Form::submit('Register', ['class' => 'btn btn-info btn-block']) !!}
                        </div>
                    </div>
                    {{-- </form> --}}
                    {!! Form::close() !!}
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 FTI UNISKA
                    </div>
                </div>
            </div>
        </div>
@endsection
