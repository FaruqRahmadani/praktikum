@extends('mahasiswa.layouts.master')
@section('tittle')
  Mahasiswa -  {{$data->nama}}
@endsection
@section('content')

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Profil</li>
                </ul>
                <!-- END BREADCRUMB -->
                 <div class="row">
                 <div class="page-title">
                    <h2>Edit Profil</h2>
                </div>
                <!-- END PAGE TITLE -->


            <div class="container">
                <div class="row">
                  <!-- left column -->
                  {{-- <form class="form-horizontal" role="form" accept="image/jpeg" method="post" action="{{url()->current()}}"> --}}
                    {{ csrf_field() }}
                  {!! Form::open(['url'=>url()->current(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                  <div class="col-md-3">
                    <div class="text-center">
                         <img src="/images/mahasiswa/{{$data->foto}}" alt="" class="img-rounded img-responsive" class="avatar img-circle" alt="avatar"/>
                      <h6>Ganti foto</h6>
                      {{-- <input type="file" name="foto" class="form-control"> --}}
                      {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}


                    </div>
                  </div>

                  <!-- edit form column -->
                  <div class="col-md-4 personal-info">
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a>
                      <i class="fa fa-warning"></i>
                        Silakan Edit Foto Dan Profil Anda.
                    </div>
                    @if(count($errors) > 0)
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li> {{$error}} </li>
                        @endforeach
                      </ul>
                    @endif
                    <br>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">NIDN</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="NIDN" type="text" value="{{$data->NIDN}}"> --}}
                          {!! Form::text('NPM', $data->NPM ,['class' => 'form-control', 'required', 'pattern' => '(?=.*[0-9]).{5,}']) !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Nama</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="nama" type="text" value="{{$data->nama}}"> --}}
                          {!! Form::text('nama', $data->nama ,['class' => 'form-control', 'required', 'pattern' => '.{2,}']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">E-mail</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="email" type="text" value="{{$data->email}}"> --}}
                          {!! Form::email('email', $data->email ,['class' => 'form-control', 'required']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">No Hp</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="no_hp" type="text" value="{{$data->no_hp}}"> --}}
                          {!! Form::text('no_hp', $data->no_hp ,['class' => 'form-control', 'required', 'pattern' => '(?=.*[0-9]).{10,}']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Username</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="username" type="text" value="{{$username}}"> --}}
                          {!! Form::text('username', $username ,['class' => 'form-control', 'required', 'pattern' => '.{5,}']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Password Lama</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password_lama" type="password" value="" placeholder="Isi Jika Ingin Ganti Password"> --}}
                          {!! Form::text('password_lama', '' ,['class' => 'form-control', 'placeholder' => 'Isi Jika Ingin Ganti Password']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password" type="password" value="" placeholder="Isi Jika Ingin Ganti Password"> --}}
                          {!! Form::text('password', '' ,['class' => 'form-control', 'placeholder' => 'Isi Jika Ingin Ganti Password']) !!}

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Confirm Password</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password_confirmation" type="password" value="" placeholder="Isi Jika Ingin Ganti Password"> --}}
                          {!! Form::text('password_confirmation', '' ,['class' => 'form-control', 'placeholder' => 'Isi Jika Ingin Ganti Password']) !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                          <button type="reset" class="btn btn-danger btn-rounded">
                            <span class="fa fa-times" aria-hidden="true"></span>
                            Batal
                          </button>
                          {{-- <button type="submit" class="btn btn-primary btn-rounded">
                            <span class="fa fa-save" aria-hidden="true"></span>
                            Simpan
                          </button> --}}

                          {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-rounded']) !!}
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </form>
                  </div>
              </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection
