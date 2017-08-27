@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Master Data</a></li>
      <li class="active">Data Dosen</li>
  </ul>
  <!-- END BREADCRUMB -->
  <!-- PAGE TITLE -->
  <div class="page-title">
      <h2>Data Dosen </h2>
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
          <div class="panel-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>NIDN</center></th>
                  <th><center>Nama</center></th>
                  <th><center>No HP</center></th>
                  <th><center>E-Mail</center></th>
                  <th><center>Username</center></th>
                  <th><center>Tools<center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0 ?>
                @foreach ($data as $datas)
                  <tr>
                    <td><center>{{$no = $no + 1}}</center></td>
                    <td><center>{{$datas->NIDN}}</center></td>
                    <td><center>{{$datas->nama}}</center></td>
                    <td><center>{{$datas->no_hp}}</center></td>
                    <td><center>{{$datas->email}}</center></td>
                    <td><center>{{$datas->user->username}}</center></td>
                    <td>
                      <center>
                        <a href="/admin/datadosen/{{Crypt::encryptString($datas->id)}}/edit" title="Edit Data"class="btn btn-primary btn-rounded"><span class="fa fa-edit"
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
@endsection
