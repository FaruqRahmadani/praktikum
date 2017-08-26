@extends('admin.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Home</li>                    <li><a href="#">Master Data</a></li>
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
      <div class="col-md-3">
        <div class="text-center">
                        <img src="/images/dosen/{{$dosen->foto}}" alt="" class="img-rounded img-responsive" />
          <h6>Ganti foto</h6>

          <input type="file" class="form-control">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Edit Data Dosen</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">NIDN</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$dosen->NIDN}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$dosen->nama}}">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$user->username}}">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$dosen->email}}">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">No Hp</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{$dosen->no_hp}}">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a href="dosen_detail.php" class="btn btn-primary btn-rounded"><span class="fa fa-save" aria-hidden="true"></span>Save</a>
			  <a href="dosen_detail.php" class="btn btn-success btn-rounded"><span class="fa fa-times-circle-o Close" aria-hidden="true"></span>Cancel</a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection
