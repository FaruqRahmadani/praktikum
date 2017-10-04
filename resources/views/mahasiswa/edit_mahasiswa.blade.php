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
          <div class="page-content-wrap">
          <div class="row">
          <div class="col-md-12">
          <div class="panel panel-default">
          <div class="panel-heading">
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
                         <img style="margin-left: -30px;margin-top: 65px;" src="/images/mahasiswa/{{$data->foto}}" alt="" class="img-rounded img-responsive" class="avatar img-circle" alt="avatar"/>
                      <h6 style="margin-left: -30px;">Ganti foto</h6>
                      {{-- <input style="margin-left: -310px;" type="file" name="foto" class="form-control"> --}}
                      {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}


                    </div>
                  </div>

                  <!-- edit form column -->
                  <div class="col-md-3 personal-info">
                    <div class="alert alert-success1 alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a>
                        <h4>Silakan Edit Foto Dan Profil Anda.</h4>
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
                        <label class="col-lg-3 control-label">NPM</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="NIDN" type="text" value="{{$data->NIDN}}" > --}}
                          {!! Form::text('NPM', $data->NPM ,['class' => 'form-control', 'required', 'pattern' => '[0-9]{5,8}','title'=>'NPM berupa angka 8 digit','maxlength'=>'8']) !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Nama</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="nama" type="text" value="{{$data->nama}}"> --}}
                          {!! Form::text('nama', $data->nama ,['class' => 'form-control', 'required', 'pattern' => '[a-zA-Z\s]{3,}','title'=>'nama tidak bolaeh mengandung angka','maxlength'=>'50']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">E-mail</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="email" type="text" value="{{$data->email}}"> --}}
                          {!! Form::email('email', $data->email ,['class' => 'form-control', 'required','maxlength'=>'50']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">No Hp</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="no_hp" type="text" value="{{$data->no_hp}}"> --}}
                          {!! Form::text('no_hp', $data->no_hp ,['class' => 'form-control', 'required', 'pattern' => '[0-9]{10,12}','title'=>'No.hp berupa angka 10-12 digit','maxlength'=>'12']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Username</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="username" type="text" value="{{$username}}"> --}}
                          {!! Form::text('username', $username ,['class' => 'form-control', 'required', 'pattern' => '.{5,}','title'=>'Username minimal 5 karakter','maxlength'=>'25']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Password Lama</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password_lama" type="password" value="" placeholder="Masukkan Password Lama"> --}}
                          {!! Form::text('password_lama', '' ,['class' => 'form-control', 'placeholder' => 'Masukkan Password Lama']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Password Baru</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password" type="password" value="" placeholder="Masukkan Password Baru"> --}}
                          {!! Form::text('password', '' ,['class' => 'form-control', 'placeholder' => 'Masukkan Password Baru']) !!}

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Konfirmasi Password</label>
                        <div class="col-lg-8">
                          {{-- <input class="form-control" name="password_confirmation" type="password" value="" placeholder="Masukkan Ulang Password"> --}}
                          {!! Form::text('password_confirmation', '' ,['class' => 'form-control', 'placeholder' => 'Konfirmasi Password Baru']) !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                          <button type="submit" class="btn btn-primary btn-rounded">
                            <span class="fa fa-save" aria-hidden="true"></span>
                            Simpan
                          </button>
                          <button type="reset" class="btn btn-danger btn-rounded">
                            <span class="fa fa-times" aria-hidden="true"></span>
                            Batal
                          </button>
                          {{-- {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-rounded']) !!} --}}
                        </div>
                      </div>

                      {!! Form::close() !!}
                    </form>
                  </div>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection
