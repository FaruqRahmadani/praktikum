@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="#">Beranda</a></li>
    <li><a href="#">Berita</a></li>
    <li class="active">Edit Berita</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
      <h2>Input Berita </h2>
  </div>
  <!-- END PAGE TITLE -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-body">
            <form id="formberita" method="post" action="{{Request::url()}}" enctype="multipart/form-data">
				      <div class="form-group">
						    <label class="col-sm-2 control-label">Judul Berita</label>
						    <div class="col-sm-10">
							    <input type="text" id="judul_artikel" class="form-control" placeholder="Judul" name="judul_artikel" value="{{$data->judul}}" required><br/>
						    </div>
					    </div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Isi Berita</label>
								<div class="col-sm-10">
									<textarea class="ckeditor" id="ckedtor" name="isi_artikel" required>{{$data->konten}}</textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Photo Berita</label>
									<div class="col-sm-10">
										<input type="file" id="images" name="gambar_artikel"/>
									</div>
                </div>
							</div>
							<div class="box-footer">
                {{ csrf_field() }}
		            <input type="submit" class="btn btn-info pull-right" value="Kirim">
							</div>
						</form>
          </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
      </div>
      <!-- END SIMPLE DATATABLE -->
    </div>
  </div>

</div>
<!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<!-- END PAGE CONTAINER -->
@endsection
