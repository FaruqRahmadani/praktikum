@extends('dosen.layouts.master');
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
          <div class="panel-heading">
            <ul class="panel-controls">
              <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
              <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
            </ul>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-0 col-xs-0 control-label"></label>
              <div class="col-md-3 col-xs-0">
                <select class="form-control select">
                    <option>Filter Jadwal Praktikum</option>
                    <option>Reguler Pagi A </option>
                    <option>Reguler Pagi B</option>
                    <option>Reguler Pagi C</option>
                    <option>Reguler Malam A</option>
                    <option>NonReguler Pagi A</option>
                </select>
              </div>
              <label class="col-md-0 col-xs-0 control-label"></label>
              <div class="col-md-2 col-xs-0">
                <select class="form-control select">
                  <option>Periode</option>
                  <option>2017/2018 Ganjil</option>
                  <option>2017/2018 Genap</option>
                </select>
              </div>
              <table class="table datatable">
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
                      <?php $tipemahasiswa = 'Mahasiswa Intensif'; ?>
                    @else
                      <?php $tipemahasiswa = 'Mahasiswa Reguler'; ?>
                    @endif
                    <tr>
                      <td>{{$no = $no+1}}</td>
                      <td><img src="/images/mahasiswa/{{$datas->foto}}" width="80" height="100"></td>
                      <td>{{$datas->NPM}}</td>
                      <td>
                        <a href="detail_mahasiswa.php">
                            <span class="fa fa-user"></span>
                            {{$datas->nama}}
                        </a>
                      </td>
                      <td>{{$datas->no_hp}}</td>
                      <td>{{$semester}}</td>
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
