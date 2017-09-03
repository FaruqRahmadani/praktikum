@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="#">Beranda</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Data Materi</li>
  </ul>
  <!-- END BREADCRUMB -->
  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Data Materi </h2>
  </div>
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <!-- END PAGE TITLE -->
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-heading">
						<div class="panel-title">
							<a href="tambahmateri" class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span>Tambah Materi</a>
						</div>
          </div>
          <div class="panel-body">
            <table class="table datatable table-bordered">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Kode MK</center></th>
                  <th><center>Materi Praktikum</center></th>
                  <th><center>Semester Minimal</center></th>
                  <th><center>Tools<center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0?>
                @foreach ($data as $datas)
                  <tr>
                    <td><center>{{$no = $no+1}}</center></td>
                    <td><center>{{$datas->kode_mk}}</center></td>
                    <td><center>{{$datas->materi_praktikum}}</center></td>
                    <td><center>{{$datas->semester}}</center></td>
                    <td>
                      <center>
    										<a href="editmateri/{{Crypt::encryptString($datas->id)}}" title="Edit Data"class="btn btn-primary btn-rounded"><span class="fa fa-edit"
    										   aria-hidden="true"></span>Edit</a>
  										</center>
  									</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
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
</div>
<!-- END PAGE CONTAINER -->
@endsection
