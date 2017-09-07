@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Menu</li>
                <li class="active">Proses Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Jadwal Dosen</a></li>
                <li><a href="tambah_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Tambah Data</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                            <div class="block">
                                <h2>Tambah Data Jadwal Praktikum</h2>
                                <hr>
                                @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                    <div class=class="col-md-5">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <h4>{{ session('status') }}</h4>
                                    </div>
                                  </div>
                                @endif

                                @if (session('validasi'))
                                  <div class="alert alert-danger" role="alert">
                                    <div class=class="col-md-5">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <h4>{{ session('validasi') }}</h4>
                                    </div>
                                  </div>
                                @endif

                                @if(count($errors) > 0)
                                  <div class="alert alert-danger" role="alert">
                                    <div class=class="col-md-5">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <ul>
                                        @foreach ($errors->all() as $error)
                                          <li><h4> {{$error}} </h4></li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{Request::url()}}">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Materi Praktikum:</b></h4></label>
                                        <div class="col-md-3">
                                            <select class="form-control select" name="materi_praktikum" required>
                                                <option value="">-Pilih-</option>
                                                @foreach ($data as $datas)
                                                  <option value="{{$datas->id}}">{{$datas->materi->materi_praktikum}} | Kelas : {{count($datapraktikum->where('id_jadwal_dosen', $datas->id)->where('pertemuan', '1'))}} - Pertemuan : {{count($datapraktikum->where('id_jadwal_dosen', $datas->id))}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Pertemuan:</b></h4></label>
                                        <div class="col-md-3">
                                           <select class="form-control select" name="pertemuan" required title="Silahkan Pilih Pertemuan">
                                                <option value="">-Pilih-</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Nama Kelas:</b></h4></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="nama_kelas" value="{{old('nama_kelas')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Ruangan:</b></h4></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="ruangan" value="{{old('ruangan')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Tanggal:</b></h4></label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                @php
                                                  $dateNow = Carbon\Carbon::now()->format('Y-m-d');
                                                @endphp
                                                <input type="date" class="form-control datepicker" name="tanggal" value="{{$dateNow}}" min="{{$dateNow}}" required>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Waktu Mulai:</b></h4></label>
                                        <div class="col-md-3">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker" name="waktu_mulai" value="{{old('waktu_mulai')}}">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><h4><b>Waktu Selesai:</b></h4></label>
                                        <div class="col-md-3">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker" name="waktu_selesai" value="{{old('waktu_selesai')}}">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12">
                                    {{ csrf_field() }}
                                    <button type="reset" class="btn btn-danger btn-rounded2">
                                        <span class="fa fa-times"></span>Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-rounded1">
                                        <span class="fa fa-save"></span>Simpan
                                    </button>
                                    </div>
                                </form>
                            </div>
                            </div>
                            </div>
                            <!-- END VALIDATIONENGINE PLUGIN -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
