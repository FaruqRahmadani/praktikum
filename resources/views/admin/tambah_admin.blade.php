@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Home</li>
    <li class="active">Master Data</li>
    <li class="active">Data Admin</li>
    <li class="active">Tambah Admin</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Tambah Admin</h2>
  </div>
  <!-- END PAGE TITLE -->
  @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      <div class=class="col-md-5">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <ul>
          @if ($errors->first() == 'The username has already been taken.')
            <h4>Username Sudah Ada, Gunakan Username Lain</h4>
          @endif
          {{-- @foreach ($errors->all() as $error)
            <li><h4> {{$error}} </h4></li>
          @endforeach --}}
        </ul>
      </div>
    </div>
  @endif
  <div class="container">
	  <div class="row">
      <div class="col-md-9 personal-info">
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

            <div class="form-group">
              <label class="col-lg-3 control-label">Nama Admin</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="nama" value="{{old('nama')}}" required pattern="[a-zA-Z0-9]+.{3,}" title="Minimal 4 Karakter">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">E-Mail</label>
              <div class="col-lg-8">
                <input class="form-control" type="email" name="email" value="{{old('email')}}" required>
              </div>
            </div>

		        <div class="form-group">
              <label class="col-lg-3 control-label">Username</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="username" value="{{old('username')}}" required pattern=".{6,}" title="Minimal 6 Karakter">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Password</label>
              <div class="col-lg-8">
                <input class="form-control" type="password" name="password" value="{{old('password')}}" required pattern=".{6,}" title="Minimal 6 Karakter">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary btn-rounded">
                  <span class="fa fa-save" aria-hidden="true"></span>Save
                </button>
                {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary btn-rounded']) !!} --}}
                <button type="reset" class="btn btn-danger btn-rounded">
                  <span class="fa fa-times" aria-hidden="true"></span>Reset
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <hr>
@endsection
