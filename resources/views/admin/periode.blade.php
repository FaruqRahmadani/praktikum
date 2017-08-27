@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Menu</li>
    <li class="active">Master Data</li>
    <li class="active">Periode</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Data Periode</h2>
  </div>
  <!-- END PAGE TITLE -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="/admin/periode/tambah">
              <h3 class="panel-title"><button class="btn btn-primary btn-rounded btn-sm"><span class="fa fa-plus"></span>Tambah Data</button></h3>
            </a>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="table-container">
                <table class="table datatable table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Tanggal Upload</th>
                      <th>Tanggal Tutup</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no=0;
                    @endphp
                    @foreach ($periode as $dataPeriode)
                      <tr id="trow_1">
                        <td>{{$no+=1}}</td>
                        <td>{{$dataPeriode->periode}}</td>
                        <td>{{Carbon\Carbon::parse($dataPeriode->created_at)->format('d-m-Y')}}</td>
                        <td>{{Carbon\Carbon::parse($dataPeriode->tanggal_tutup)->format('d-m-Y')}}</td>
                        <td><center class="aktif">
                          @php
                            if ($dataPeriode->status == 1) {
                              echo '<span class="fa fa-check"></span>Aktif';
                            } else {
                              echo '<span class="fa fa-times"></span>Non Aktif';
                            }
                          @endphp
                        <td>
                          <center>
                            <a href="/admin/periode/{{Crypt::encryptString($dataPeriode->id)}}/edit"><button class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" title="Edit" data-placement="bottom"><span class="fa fa-pencil"></span></button></a>
                          </center>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
      </div>
    </div>
  </div>
  <!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
@endsection
