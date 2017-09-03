@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Menu</li>
    <li class="active">Master Data</li>
    <li class="active">Periode</li>
    <li class="active">Tambah Data Periode</li>
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
                <h2>Tambah Data Periode</h2>
                <hr>
                {{-- <div class="alert alert-success" role="alert">
                  <div class=class="col-md-5">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Data Periode Berhasil Disimpan.</h4>
                  </div>
                </div> --}}
                <form class="form-horizontal" method="post" action="{{Request::url()}}" enctype="multipart/form-data">

                  <div class="form-group">
                      <label class="col-md-3 control-label"><h4><b>Periode:</b></h4></label>
                      <div class="col-md-3">
                          <input name="periode" type="text" class="form-control" placeholder="Contoh : 2017/2018 Ganjil" value=""/ required pattern="[0-9]{4,4}[/][0-9]{4,4}[a-zA-Z\s]{6,7}">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label"><h4><b>Tanggal Tutup:</b></h4></label>
                      <div class="col-md-3">
                          <div class="input-group">
                              <input name="tanggal_tutup" type="date" class="form-control datepicker" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label"><h4><b>Status:</b></h4></label>
                      <div class="col-md-3">
                          <select name="status" class="form-control select" required>
                              <option value="" selected hidden>-Pilih-</option>
                              <option value="1">Aktif</option>
                              <option value="0">Non Aktif</option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label"></label>
                      <div class="col-md-6 col-xs-12">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-rounded"><span class="fa fa-save"></span>Simpan</button>
                        <button type="reset" class="btn btn-danger btn-rounded"><span class="fa fa-times"></span>Batal</button>
                      </div>
                  </div>
                </form>
              </div>
              <!-- END VALIDATIONENGINE PLUGIN -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
