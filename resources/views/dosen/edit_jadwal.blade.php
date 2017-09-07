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
                        <div class="col-md-7">
                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="block">
                                <h2>Edit Data Jadwal Praktikum</h2>
                                <hr>
                                @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                    <div class=class="col-md-5">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <h4>{{ session('status') }}</h4>
                                    </div>
                                  </div>
                                @endif

                                @if(count($errors) > 0)
                                  <ul>
                                    @foreach ($errors->all() as $error)
                                      <li> {{$error}} </li>
                                    @endforeach
                                  </ul>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{Request::url()}}">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label"><h4><b>Nama Kelas:</b></h4></label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="nama_kelas" value="{{$data->nama_kelas}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label"><h4><b>Ruangan:</b></h4></label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="ruangan" value="{{$data->ruangan}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label"><h4><b>Tanggal:</b></h4></label>
                                        <div class="col-md-5">
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
                                        <label class="col-md-5 control-label"><h4><b>Waktu Mulai:</b></h4></label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker" name="waktu_mulai" value="{{Carbon\Carbon::parse($data->waktu_mulai)->format('h:i A')}}">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label"><h4><b>Waktu Selesai:</b></h4></label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker" name="waktu_selesai" value="{{Carbon\Carbon::parse($data->waktu_selesai)->format('h:i A')}}">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="reset" class="btn btn-danger btn-rounded2">
                                        <span class="fa fa-times"></span>Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-rounded1">
                                        <span class="fa fa-save"></span>Simpan
                                    </button>
                                </form>
                            </div>
                            <!-- END VALIDATIONENGINE PLUGIN -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
