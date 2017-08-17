@extends('dosen.layouts.master');
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
                    <h2>Data Materi</h2>
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
                                        {!! Form::open(['url'=>url()->current(),'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode MK</th>
                                                <th>Materi Praktikum</th>
                                                <th>Semester Minimal</th>
                                                <th>Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 0; ?>
                                          @foreach ($data as $datas)
                                            <tr>
                                              <td>{{$no = $no + 1}}</td>
                                                <td>{{$datas->kode_mk}}</td>
                                                <td>{{$datas->materi_praktikum}}</td>
                                                <td class="center">{{$datas->semester}}</td>
                                                <td class="center">
                                                  @foreach ($jadwaldosen as $jadwaldosens)
                                                    @if ($datas->id == $jadwaldosens->id_praktikum)
                                                      <input type="checkbox" name="data{{$datas->id}}" value="true" disabled>
                                                    @else
                                                      <input type="checkbox" name="data{{$datas->id}}" value="true">
                                                    @endif
                                                  @endforeach
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-rounded']) !!}
                                    {!! Form::close() !!}
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
