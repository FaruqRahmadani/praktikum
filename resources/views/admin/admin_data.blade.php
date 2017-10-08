@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="#">Beranda</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Data Mahasiwa</li>
  </ul>
  <!-- END BREADCRUMB -->
  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Data Mahasiswa</h2>
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
							<a href="tambahAdmin" class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span>Tambah Admin</a>
						</div>
          </div>
          <div class="panel-body">
          <div class="table-container">
            <table class="table datatable table-bordered">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama</center></th>
                  <th><center>Username</center></th>
                  <th><center>E-Mail</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0 ?>
                @foreach ($data as $datas)
                  <tr>
                    <td><center>{{$no = $no + 1}}</center></td>
                    <td><center>{{$datas->nama}}</center></td>
                    <td><center>{{$datas->username}}</center></td>
                    <td><center>{{$datas->email}}</center></td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
      </div>
      <!-- END SIMPLE DATATABLE -->
    </div>
  </div>
@endsection
