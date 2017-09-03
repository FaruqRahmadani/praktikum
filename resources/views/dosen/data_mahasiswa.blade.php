@extends('dosen.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Menu</li>
    <li class="active">Master Data</li>
    <li><a href="data_mahasiswa.php" data-toggle="tooltip" title="Go to Data Mahasiswa" data-placement="bottom">Data Mahasiswa</a></li>
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
      <div class="col-md-12 col-xs-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
              <div class="table-container">
                <label class="col-md-0 col-xs-0 control-label"></label>
                <div class="col-md-2 col-xs-0">
                  <select class="form-control select">
                    <option>Periode</option>
                    <option>2017/2018 Ganjil</option>
                    <option>2017/2018 Genap</option>
                  </select>
                </div>
                <label class="col-md-0 col-xs-0 control-label"></label>
                <div class="col-md-2 col-xs-0">
                  <select class="form-control select">
                      <option>Data Mahasiswa</option>
                      <option>1 </option>
                      <option>3</option>
                      <option>5</option>
                      <option>7</option>
                  </select>
                </div>

                <table class="table datatable table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>No Hp</th>
                      <th>Semester</th>
                      <th>Tipe</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0; ?>
                    @foreach ($data as $datas)
                      @if (date("n") >= 9)
                        <?php $semester = ((date("y") - substr($datas->NPM,0,2))*2)+1 ?>
                      @else
                        <?php $semester = (date("y") - substr($datas->NPM,0,2))*2 ?>
                      @endif
                      @if ($semester >= 7)
                        <?php $tipemahasiswa = 'Kelas Intensif'; ?>
                      @else
                        <?php $tipemahasiswa = 'Kelas Reguler'; ?>
                      @endif
                      <tr>
                        <td><center>{{$no = $no+1}}</center></td>
                        <td><img src="/images/mahasiswa/{{$datas->foto}}" width="80" height="100"></td>
                        <td>{{$datas->NPM}}</td>
                        <td>
                          <a href="/dosen/datamahasiswa/{{Crypt::encryptString($datas->id)}}">
                              <span class="fa fa-user"></span>
                              {{$datas->nama}}
                          </a>
                        </td>
                        <td>{{$datas->no_hp}}</td>
                        <td><center>{{$semester}}</center></td>
                        <td>{{$tipemahasiswa}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
                <!-- PAGE CONTENT WRAPPER -->
  </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection
