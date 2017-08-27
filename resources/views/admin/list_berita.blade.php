@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Beranda</li>
    <li class="active">Berita</li>
    <li class="active">List Berita</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Data Berita </h2>
  </div>
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-heading">
						<div class="panel-title">
							<a href="input_berita.php" class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span>Tambah Berita</a>
						</div>
          </div>
          <div class="panel-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Berita</center></th>
                  <th><center>Tangal Berita</center></th>
									<th><center>Penulis</center></th>
                  <th><center>Tools<center></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 0;
                @endphp
                @foreach ($berita as $beritas)
                  <tr>
                    <td><center>{{$no+=1}}</center></td>
                    <td>{{$beritas->judul}}</td>
                    <td>{{$beritas->created_at}}</td>
                    <td>{{$beritas->admin->nama}}</td>
                    <td>
                      <center>
                        <a href="/admin/berita/{{Crypt::encryptString($beritas->id)}}/edit">
                          <button class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="Edit" data-placement="bottom"><span class="fa fa-pencil"></span></button>
                        </a>
                        <a href="/admin/berita/{{Crypt::encryptString($beritas->id)}}/delete">
                          <button class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="Delete" data-placement="bottom"><span class="fa fa-close"></span></button>
                        </a>
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
