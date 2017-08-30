@extends('mahasiswa.layouts.master')
@section('tittle')
  Mahasiswa -  {{$data->nama}}
@endsection
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Data Dosen</a></li>
                <li><a href="detail_dosen.php" data-toggle="tooltip" title="Go to Detail Dosen" data-placement="bottom">Detail Dosen</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                 <div class="row">
                 <div class="page-title">
                    <h1>Profil</h1>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="/images/dosen/{{$data->foto}}" alt="" class="img-rounded img-responsive" />
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
                    @if ((substr(url()->current(),-6,6) == 'profil'))
                      <tr>
                          <th>Username</th>
                          <td>{{$username}}</td>
                      </tr>
                    @endif
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>No Hp</th>
                        <td>{{$data->no_hp}}</td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
@endsection
