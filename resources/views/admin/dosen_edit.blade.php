@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Home</li>
    <li><a href="#">Master Data</a></li>
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
  @if (count($errors) > 0)
    <div class="alert alert-info">
      @if ($errors->first() == "The password confirmation does not match.")
        Re-Password tidak Sama Dengan Password
      @elseif ($errors->first() == "The password must be at least 6 characters.")
        Pastikan Password Minimal 6 Karakter
      @else
        <ul>
          @foreach ($erros as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
      </div>
  @endif
  <div class="container">
	  <div class="row">
      <!-- left column -->
      {!! Form::open(['url'=>url()->current(),'files'=>true,'class'=>'form-horizontal', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
      <div class="col-md-3">
        <div class="text-center">
          <img src="/images/dosen/{{$dosen->foto}}" alt="" class="img-rounded img-responsive" />
          <h6>Ganti foto</h6>
          {{-- <input type="file" class="form-control" name="gambar"> --}}
          {!! Form::file('foto', ['class' => 'form-control']) !!}
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Edit Data Dosen</h3>
          <div class="form-group">
            <label class="col-lg-3 control-label">NIDN</label>
            <div class="col-lg-8">
              <input class="form-control" name="NIDN" type="text" value="{{$dosen->NIDN}}" required pattern="[0-9]{8,}" title="NIDN berupa angka minimal 8 digit" maxlength="25">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama</label>
            <div class="col-lg-8">
              <input class="form-control" name="nama" type="text" value="{{$dosen->nama}}" required  pattern="[a-zA-Z\s.,]{3,}" title="nama tidak boleh mengandung angka" maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">No Hp</label>
            <div class="col-lg-8">
              <input class="form-control" name="no_hp" type="text" value="{{$dosen->no_hp}}" required pattern="[0-9]{8,12}" title="No.hp berupa angka 8-12 digit" maxlength="12">
            </div>
          </div>
		      <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="email" value="{{$dosen->email}}" required maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Status</label>
            <div class="col-lg-8">
              <select class="form-control select" name="status" required>
                <option value="0" {{$dosen->email == '0' ? 'selected' : ''}}>Tidak Aktif</option>
                <option value="1" {{$dosen->email == '1' ? 'selected' : ''}}>Aktif</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" type="text" value="{{$user->username}}" required pattern=".{5,0}"  title=" username minimal 5 karakter" maxlength="25">
            </div>
          </div>
          {{-- <div class="form-group">
            <label class="col-lg-3 control-label">Password Lama</label>
            <div class="col-lg-8">
              <input class="form-control" name="password_lama" type="text" placeholder="Isi Jika Ingin Ganti Password">
            </div>
          </div> --}}
          <div class="form-group">
            <label class="col-lg-3 control-label">Password Baru</label>
            <div class="col-lg-8">
              <input class="form-control" name="password" type="password" placeholder="Isi Jika Ingin Ganti Password" min="6">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Re-Password Baru</label>
            <div class="col-lg-8">
              <input class="form-control" name="password_confirmation" type="password" placeholder="Isi Jika Ingin Ganti Password">
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
