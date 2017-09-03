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
                                          <form class="" action="{{url()->current()}}" method="post">

                                            <select class="form-control select" name="filter">
                                                <option disabled selected>Filter Jadwal Praktikum</option>
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
                                                <th>NPM</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Materi Praktikum</th>
                                                <th>Ruangan</th>
                                                <th>Pertemuan</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no = 0;
                                          @endphp
                                          @foreach ($data as $datas)
                                            @foreach ($datas->JadwalPraktikum as $jadwals)
                                              @php
                                                $datamahasiswa = App\AbsensiMahasiswa::with('Mahasiswa')->where('id_jadwal_praktikum', $jadwals->id)->get();
                                              @endphp
                                              @foreach ($datamahasiswa as $mahasiswa)
                                                @if (isset($filter))
                                                  @if ($filter == $jadwals->nama_kelas)
                                                    <tr>
                                                      <td>{{$no = $no+1}}</td>
                                                      <td>{{$mahasiswa->Mahasiswa->NPM}}</td>
                                                      <td>{{$mahasiswa->Mahasiswa->nama}}</td>
                                                      <td>{{$jadwals->nama_kelas}}</td>
                                                      <td>{{$datas->materi->materi_praktikum}}</td>
                                                      <td>{{$jadwals->ruangan}}</td>
                                                      <td>{{$jadwals->pertemuan}}</td>
                                                      <td>{{$jadwals->tanggal}}</td>
                                                      <td>{{Carbon\Carbon::parse($jadwals->waktu_mulai)->format('g:i A')}} - {{Carbon\Carbon::parse($jadwals->waktu_selesai)->format('g:i A')}}</td>
                                                    </tr>
                                                  @endif
                                                @else
                                                  <tr>
                                                    <td>{{$no = $no+1}}</td>
                                                    <td>{{$mahasiswa->Mahasiswa->NPM}}</td>
                                                    <td>{{$mahasiswa->Mahasiswa->nama}}</td>
                                                    <td>{{$jadwals->nama_kelas}}</td>
                                                    <td>{{$datas->materi->materi_praktikum}}</td>
                                                    <td>{{$jadwals->ruangan}}</td>
                                                    <td>{{$jadwals->pertemuan}}</td>
                                                    <td>{{$jadwals->tanggal}}</td>
                                                    <td>{{Carbon\Carbon::parse($jadwals->waktu_mulai)->format('g:i A')}} - {{Carbon\Carbon::parse($jadwals->waktu_selesai)->format('g:i A')}}</td>
                                                  </tr>
                                                @endif
                                              @endforeach
                                            @endforeach
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                  <a href="/dosen/cetakabsen">
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Print</button>
                                  </a>
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
