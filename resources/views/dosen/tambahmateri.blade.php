@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Data Dosen</a></li>
                <li class="active">Tambah Data</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Data Materi</h2>
                </div>
                <!-- END PAGE TITLE -->
                @if (session('status'))
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      {{ session('status') }}
                  </div>
                @endif
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12 col-xs-12">


                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="table-container">
                                    <div class="form-group">
                                        <label class="col-md-0 col-xs-0 control-label"></label>
                                        <div class="col-md-2 col-xs-0">
                                            <select class="form-control select">
                                                <option>Jadwal Praktikum</option>
                                                <option>Reguler Pagi A </option>
                                                <option>Reguler Pagi B</option>
                                                <option>Reguler Pagi C</option>
                                                <option>Reguler Malam A</option>
                                                <option>NonReguler Pagi A</option>
                                            </select>
                                        </div>
                                        {{-- {!! Form::open(['url'=>url()->current(),'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!} --}}
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode MK</th>
                                                <th>Materi Praktikum</th>
                                                <th>Semester Minimal</th>
                                                <th>Tambah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 0; ?>
                                          @foreach ($data as $datas)
                                            <tr>
                                              <td><center>{{$no = $no + 1}}</center></td>
                                                <td>{{$datas->kode_mk}}</td>
                                                <td>{{$datas->materi_praktikum}}</td>
                                                <td><center>{{$datas->semester}}</center></td>
                                                <td>
                                                <center>
                                                    @if (count($jadwaldosen->where('id_praktikum', $datas->id)->first()) > 0)
                                                      {{-- <input type="checkbox" name="data{{$datas->id}}" value="true" disabled> --}}
                                                      <button class="btn btn-info btn-rounded btn-sm" data-toggle="tooltip" title="Tambahkan Materi {{$datas->materi_praktikum}}" data-placement="bottom" disabled><span class="fa fa-check"></span> Sudah Ditambahkan</button>
                                                    @else
                                                      {{-- <input type="checkbox" name="data{{$datas->id}}" value="true"> --}}
                                                      <a href="/dosen/materi/add/{{Crypt::encryptString($datas->id)}}"><button class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="Tambahkan Materi {{$datas->materi_praktikum}}" data-placement="bottom"><span class="fa fa-plus"></span> Tambah</button></a>
                                                    @endif
                                                </center>
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-rounded']) !!}
                                    {!! Form::close() !!} --}}
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
