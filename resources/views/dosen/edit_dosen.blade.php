@extends('dosen.layouts.master')
@section('content')

  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li class="active">Edit Profil</li>
  </ul>
  <!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <!-- START VALIDATIONENGINE PLUGIN -->
          <div class="block">
            <h2>Edit Profil</h2>
            <!-- left column -->
            <div class="alert alert-success" role="alert">
              <div class=class"col-md-5">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4>Data Profil Dosen Berhasil Disimpan.</h4>
              </div>
              @if(count($errors) > 0)
                <ul>
                  @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                  @endforeach
                </ul>
              @endif
            </div>
            {{-- <form class="form-horizontal" role="form" accept="image/jpeg" method="post" action="{{url()->current()}}"> --}}
              {!! Form::open(['url'=>url()->current(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="col-md-3">
              <div class="text-center">
                <img src="/images/dosen/{{$data->foto}}" alt="" class="img-rounded img-responsive" class="avatar img-circle" alt="avatar"/>
                <h6>Ganti foto</h6>
                <input name="foto" type="file" class="form-control">
              </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-7 personal-info">
                <div class="form-group">
                  <label class="col-lg-3 control-label">NIDN</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="NIDN" type="text" value="{{$data->NIDN}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Nama</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="nama" type="text"  value="{{$data->nama}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="email" type="text" value="{{$data->email}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">No Hp</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="no_hp" type="text" value="{{$data->no_hp}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Username</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="username" type="text" value="{{$username}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Password Lama</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="password_lama" type="password" value="" placeholder="Masukkan Password Lama">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Password Baru</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="password" type="password" value="" placeholder="Masukkan Password Baru">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Konfirmasi Password</label>
                  <div class="col-lg-9">
                    <input class="form-control" name="password_confirmation" type="password" value="" placeholder="Masukkan Ulang Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9">
                    {{ csrf_field() }}
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
              {{-- </form> --}}
            </div>
          </div>
          <!-- END VALIDATIONENGINE PLUGIN -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
</div>
<!-- END PAGE CONTAINER -->
@endsection
