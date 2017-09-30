@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Proses Data</li>
                <li><a href="jdwl_dosen.php" data-toggle="tooltip" title="Go to Jadwal Dosen" data-placement="bottom">Jadwal Dosen</a></li>
                <li class="active">Tambah Data</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Data Jadwal</h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                          @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                          @endif
                          @if ($periode->status == '0')
                            <div class="alert alert-danger">
                                Periode {{$periode->periode}} Telah Di Tutup
                            </div>
                          @else
                            <div class="alert alert-info">
                                Periode {{$periode->periode}} Akan Di Tutup Pada Tanggal : {{Carbon\Carbon::parse($periode->tanggal_tutup)->format('d M Y')}}
                            </div>
                          @endif
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a {{($periode->status == '1' ? 'href=/dosen/jadwal/add' : "" )}}>
                                      <h3 class="panel-title"><span class="fa fa-plus"></span> Tambah Data</h3>
                                    </a>
                                </div>
                                <div class="panel-body">
                                <div class="form-group">
                                    {{-- <div class="table-container">
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
                                                <option>Jadwal Praktikum</option>
                                                <option>Reguler Pagi A </option>
                                                <option>Reguler Pagi B</option>
                                                <option>Reguler Pagi C</option>
                                                <option>Reguler Malam A</option>
                                                <option>NonReguler Pagi A</option>
                                            </select>
                                        </div> --}}
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Materi Praktikum</th>
                                                <th>Pertemuan</th>
                                                <th>Nama Kelas</th>
                                                <th>Ruangan</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $no = 0; ?>
                                          @foreach ($data as $jadwaldosen)
                                            @foreach ($jadwaldosen->JadwalPraktikum as $jadwalpraktikum)
                                            <tr id="trow_1">
                                                <td><center>{{$no = $no + 1}}</center></td>
                                                <td>{{$jadwaldosen->materi->materi_praktikum}}</td>
                                                <td>{{$jadwalpraktikum->pertemuan}}</td>
                                                <td>{{$jadwalpraktikum->nama_kelas}}</td>
                                                <td>{{$jadwalpraktikum->ruangan}}</td>
                                                <td>{{$jadwalpraktikum->tanggal}}</td>
                                                <td>{{Carbon\Carbon::parse($jadwalpraktikum->waktu_mulai)->format('g:i A')}} - {{Carbon\Carbon::parse($jadwalpraktikum->waktu_selesai)->format('g:i A')}}</td>
                                                <td>
                                                <center>
                                                  @if ($jadwalpraktikum->tipe == 1)
                                                    <button class="aktif"><span class="fa fa-check-square"></span> Aktif</button>
                                                  @else
                                                    <button class="non"><span class="fa fa-minus-square"></span> Non-Aktif</button>
                                                  @endif
                                                </center>
                                                </td>
                                                <td>
                                                <center>
                                                  @if ($jadwalpraktikum->tipe == 1)
                                                    <a href="/dosen/jadwal/{{Crypt::encryptString($jadwalpraktikum->id)}}/{{Crypt::encryptString('0')}}">
                                                      <button class="btn btn-danger btn-rounded btn-sm" data-toggle="tooltip" title="Non-Aktifkan" data-placement="bottom"><span class="fa fa-minus-square"></span> Non-Aktifkan</button>
                                                    </a>
                                                  @else
                                                    <a href="/dosen/jadwal/{{Crypt::encryptString($jadwalpraktikum->id)}}/{{Crypt::encryptString('1')}}">
                                                      <button class="btn btn-success btn-rounded btn-sm" data-toggle="tooltip" title="Aktifkan" data-placement="bottom"><span class="fa fa-check-square"></span> Aktifkan</button>
                                                    </a>
                                                  @endif
                                                  <a href="/dosen/jadwal/edit/{{Crypt::encryptString($jadwalpraktikum->id)}}">
                                                    <button class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" title="Edit" data-placement="bottom"><span class="fa fa-pencil"></span></button>
                                                  </a>
                                                <center>
                                                </td>
                                            </tr>
                                            @endforeach
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
