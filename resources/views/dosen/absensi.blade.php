@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                    <li><a href="#">Absensi</a></li>
                    <li><a href="absen.php" data-toggle="tooltip" title="Go to Cetak Absensi" data-placement="bottom">Cetak Absensi</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Cetak Absensi</h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="table-container">
                                    <div class="form-group">
                                        {{-- <div class="col-md-3 col-xs-0">
                                          <form class="" action="{{url()->current()}}" method="post">

                                            <select class="form-control select" name="filter">
                                                <option disabled selected>Jadwal Praktikum</option>
                                                @php
                                                  $kelas = '';
                                                @endphp
                                                @foreach ($data as $datas)
                                                  @foreach ($datas->JadwalPraktikum as $jadwals)
                                                    @if ($kelas != $jadwals->nama_kelas)
                                                      <option value="{{$jadwals->nama_kelas}}">{{$jadwals->nama_kelas}}</option>
                                                    @endif
                                                    @php
                                                      $kelas = $jadwals->nama_kelas;
                                                    @endphp
                                                  @endforeach
                                                @endforeach
                                            </select>

                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary btn-rounded1">
                                                <span class="fa fa-save"></span>Filter
                                            </button>
                                          </form>
                                        </div> --}}
                                        <label class="col-md-0 col-xs-0 control-label"></label>
                                        <div class="col-md-3 col-xs-0">
                                        <form class="form-horizontal" method="POST" action="{{Request::url()}}">
                                          <div style="max-width:50%">
                                              <select name="periode" class="form-control select">
                                                  @foreach ($periode as $dataPeriode)
                                                    <option value="{{$dataPeriode->id}}">{{$dataPeriode->periode}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                            <div class="col-md-12">
                                              {{ csrf_field() }}
                                              <button type="submit" class="btn btn-primary btn-rounded8 btn-sm">
                                                <span class="fa fa-filter"></span>Filter
                                              </button>
                                            </div>
                                        </form>
                                        </div>
                                    <table class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Materi Praktikum</th>
                                                <th>Kelas</th>
                                                <th>Ruangan</th>
                                                <th>Pertemuan</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Jumlah Mahasiswa</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no = 0;
                                          @endphp
                                          @foreach ($data as $datas)
                                            @foreach ($datas->JadwalPraktikum as $jadwals)
                                              <tr>
                                                <td><center>{{$no = $no+1}}</center></td>
                                                <td>{{$datas->materi->materi_praktikum}}</td>
                                                <td>{{$jadwals->nama_kelas}}</td>
                                                <td>{{$jadwals->ruangan}}</td>
                                                <td><center>{{$jadwals->pertemuan}}</center></td>
                                                <td>{{$jadwals->tanggal}}</td>
                                                <td>{{Carbon\Carbon::parse($jadwals->waktu_mulai)->format('g:i A')}} - {{Carbon\Carbon::parse($jadwals->waktu_selesai)->format('g:i A')}}</td>
                                                <td><center>{{count(App\AbsensiMahasiswa::where('id_jadwal_praktikum', $jadwals->id)->get())}} Orang<center></td>
                                                <td>
                                                <center>
                                                  <a href="/dosen/absen/{{Crypt::encryptString($jadwals->id)}}" target="_blank"><button class="btn btn-primary btn-rounded btn-sm" title="Cetak"data-toggle="tooltip" data-placement="bottom"><span class="fa fa-print"></span></button></a></td>
                                                </center>
                                              </tr>
                                            @endforeach
                                          @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                                  <a href="/dosen/cetakabsen/{{Crypt::encryptString($idperiode)}}" target="_blank">
                                    <button class="btn btn-primary btn-rounded"><span class="fa fa-print"></span> Cetak</button>
                                  </a>
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
