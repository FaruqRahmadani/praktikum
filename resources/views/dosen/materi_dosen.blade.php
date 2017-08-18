@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Proses Data</li>
                    <li><a href="materi_dosen.php" data-toggle="tooltip" title="Go to Materi Dosen" data-placement="bottom">Materi Dosen</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Data Materi Ajar</h2>
                </div>
                <!-- END PAGE TITLE -->
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="/dosen/materi/add">
                                    <h3 class="panel-title"><span class="fa fa-plus"></span> Tambah Data</h3></a>

                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode MK</th>
                                                <th>Materi Praktikum</th>
                                                <th>Semester Minimal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 0; ?>
                                          @foreach ($data as $datas)
                                            <tr>
                                              <td>{{$no = $no + 1}}</td>
                                                <td>{{$datas->materi->kode_mk}}</td>
                                                <td>{{$datas->materi->materi_praktikum}}</td>
                                                <td class="center">{{$datas->materi->semester}}</td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
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
