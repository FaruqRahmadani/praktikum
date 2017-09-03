@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Data Dosen</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Data Dosen</h2>
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
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>NIDN</th>
                                                <th>Nama</th>
                                                <th>No HP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 0; ?>
                                          @foreach ($data as $datas)
                                            <tr>
                                              <td><center>{{$no = $no + 1}}</center></td>
                                                <td><img src="/images/dosen/{{$datas->foto}}" width="80px" height="100px"></td>
                                                <td>{{$datas->NIDN}}</td>
                                                <td>
                                                    <a href="/dosen/datadosen/{{Crypt::encryptString($datas->id)}}">
                                                        <span class="fa fa-user"></span>
                                                         {{$datas->nama}}
                                                    </a>
                                                </td>
                                                <td class="center">{{$datas->no_hp}}</td>
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
