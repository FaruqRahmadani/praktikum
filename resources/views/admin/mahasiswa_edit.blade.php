@extends('admin.layouts.master')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
      <li class="active">Home</li>
      <li class="active">Master Data</li>
      <li class="active">Data Mahasiswa</li>
      <li class="active">Edit Data Mahasiswa</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
      <h2>Edit Data Mahasiswa</h2>
    </div>
    <!-- END PAGE TITLE -->
    <div class="container">
	     <div class="row">
        <!-- left column -->
        {!! Form::open(['url'=>url()->current(),'files'=>true,'class'=>'form-horizontal', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

        <div class="col-md-3">
          <div class="text-center">
            <img src="/images/mahasiswa/{{$mahasiswa->foto}}" alt="" class="img-rounded img-responsive" />
            <h6>Ganti foto</h6>
            {{-- <input type="file" class="form-control" name="gambar"> --}}
            {!! Form::file('foto', ['class' => 'form-control']) !!}
          </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <h3>Edit Data Mahasiswa</h3>
          <div class="form-group">
            <label class="col-lg-3 control-label">NPM</label>
            <div class="col-lg-8">
            <input class="form-control" name="NPM" type="text" value="{{$mahasiswa->NPM}}" required pattern="['0-9']{8}" title="npm berupa angka 8 digit" maxlength="8">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Nama</label>
            <div class="col-lg-8">
              <input class="form-control" name="nama" type="text" value="{{$mahasiswa->nama}}" required pattern="['a-zA-Z\s']{3,}" title="nama tidak boleh mengandung angka,minimal 3 karakter" maxlength="50">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">No Hp</label>
            <div class="col-lg-8">
              <input class="form-control" name="no_hp" type="text" value="{{$mahasiswa->no_hp}}" required pattern="[0-9]{10,12}" title=" No.hp berupa angka 10-12 digit" maxlength="12">
            </div>
          </div>

	        <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="email" value="{{$mahasiswa->email}}" required maxlength="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" type="text" value="{{$user->username}}" required pattern=".{5,}" title="username minimal 5 karakter" maxlength="25">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Password Lama</label>
            <div class="col-lg-8">
              <input class="form-control" name="password_lama" type="text" placeholder="Isi Jika Ingin Ganti Password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Password Baru</label>
            <div class="col-lg-8">
              <input class="form-control" name="password_confirmation" type="text" placeholder="Isi Jika Ingin Ganti Password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Re-Password Baru</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Isi Jika Ingin Ganti Password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary btn-rounded">
                <span class="fa fa-save" aria-hidden="true"></span>
                Save
              </button>
              <button type="reset" class="btn btn-danger btn-rounded">
                <span class="fa fa-times" aria-hidden="true"></span>
                Reset
              </button>
            </div>
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <hr>
@endsection
