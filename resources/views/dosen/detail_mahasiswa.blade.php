@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li><a href="data_mahasiswa.php" data-toggle="tooltip" title="Go to Data Mahasiswa" data-placement="bottom">Data Mahasiswa</a></li>
                <li><a href="detail_mahasiswa.php" data-toggle="tooltip" title="Go to Detail Mahasiswa" data-placement="bottom">Detail Mahasiswa</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                 <div class="row">
                 <div class="page-title">
                    <h1>Detail Mahasiswa</h1>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="/images/mahasiswa/{{$data->foto}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <table class="table tabel-striped table-condensed">
                    <tr>
                        <th>NPM</th>
                        <td>{{$data->NPM}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    @if (date("n") >= 9)
                      <?php $semester = ((date("y") - substr($data->NPM,0,2))*2)+1 ?>
                    @else
                      <?php $semester = (date("y") - substr($data->NPM,0,2))*2 ?>
                    @endif
                    <tr>
                        <th>Semester</th>
                        <td>{{$semester}}</td>
                    </tr>
                    <tr>
                      <th>No Hp</th>
                      <td>{{$data->no_hp}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>

                    </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE CONTENT -->
        </div>
@endsection
