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
                  <th><center>NPM</center></th>
                  <th><center>Nama</center></th>
                  <th><center>Semester</center></th>
                  <th><center>Tools<center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0 ?>
                @foreach ($data as $datas)
                  @if (date("n") >= 9)
                    {{$semester = ((date("y") - substr($datas->NPM,0,2))*2)+1}}
                  @else
                    {{$semester = (date("y") - substr($datas->NPM,0,2))*2}}
                  @endif
                  <tr>
                    <td><center>{{$no = $no + 1}}</center></td>
                    <td><center>{{$datas->NPM}}</center></td>
                    <td><center>{{$datas->nama}}</center></td>
                    <td><center>{{$semester}}</center></td>
                    <td>
                      <center>
                        <a href="mahasiswa_detail.php" title="Edit Data"class="btn btn-primary btn-rounded"><span class="fa fa-info"
                          aria-hidden="true"></span>Detail</a>
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
