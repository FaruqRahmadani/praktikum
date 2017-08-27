@extends('admin.layouts.master')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
      <li class="active">Home</li>
      <li class="active">Master Data</li>
      <li class="active">Data Dosen</li>
      <li class="active">Detail Data Dosen</li>
      <li class="active">Edit Data Dosen</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
      <h2>Edit Data Dosen</h2>
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
          <h3>Edit Data Dosen</h3>
          <div class="form-group">
            <label class="col-lg-3 control-label">NPM</label>
            <div class="col-lg-8">
              <input class="form-control" name="NPM" type="text" value="{{$mahasiswa->NPM}}" required pattern="([1-9])+(?:-?\d){4,}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Nama</label>
            <div class="col-lg-8">
              <input class="form-control" name="nama" type="text" value="{{$mahasiswa->nama}}" required pattern="{2,}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">No Hp</label>
            <div class="col-lg-8">
              <input class="form-control" name="no_hp" type="text" value="{{$mahasiswa->no_hp}}" required pattern="([0-9])+(?:-?\d){10,}">
            </div>
          </div>

	        <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="email" value="{{$mahasiswa->email}}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" type="text" value="{{$user->username}}" required pattern=".{5,0}">
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
              <button type="reset" class="btn btn-success btn-rounded">
                <span class="fa fa-close" aria-hidden="true"></span>
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
