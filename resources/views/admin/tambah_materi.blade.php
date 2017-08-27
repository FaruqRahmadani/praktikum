@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Home</li>
    <li class="active">Master Data</li>
    <li class="active">Data Materi</li>
    <li class="active">Tambah Data Materi</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Tambah Data Materi</h2>
  </div>
  <!-- END PAGE TITLE -->

  <div class="container">
	  <div class="row">
      <div class="col-md-9 personal-info">
        <h3>Tambah Data Materi</h3>
          {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

            <div class="form-group">
              <label class="col-lg-3 control-label">Kode MK</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="kode_mk" value="" required pattern="[a-zA-Z0-9]+.{3,}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Materi Praktikum</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="materi" value="" required pattern="[a-zA-Z0-9]+.{3,}">
              </div>
            </div>

		        <div class="form-group">
              <label class="col-lg-3 control-label">Semester Minimal</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" name="semester" value="" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Gambar</label>
              <div class="col-lg-8">
                <input class="form-control" type="file" name="gambar" value="" required accept="image/*">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary btn-rounded">
                  <span class="fa fa-save" aria-hidden="true"></span>Save
                </button>
                {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary btn-rounded']) !!} --}}
                <button type="reset" class="btn btn-success btn-rounded">
                  <span class="fa fa-times-circle-o Close" aria-hidden="true"></span>Reset
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <hr>
@endsection
