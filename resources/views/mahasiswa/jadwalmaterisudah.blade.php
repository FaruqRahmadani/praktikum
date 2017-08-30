@extends('mahasiswa.layouts.master')
@section('tittle')
  Mahasiswa -  {{$data->nama}}
@endsection
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
                                <h2>Tambah Data Jadwal Praktikum</h2>
                                <hr>
                                <div class="alert alert-success" role="alert">
                                  <div class=class="col-md-5">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4>{{$status}}</h4>
                                  </div>
                                </div>
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
                                      <label class="col-md-5 control-label"><h4><b>Nama Dosen:</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->dosen->nama}}</b></h4></label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Materi :</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->materi->materi_praktikum}}</b></h4></label>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Semester Minimal :</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->materi->semester}}</b></h4></label>
                                      </div>
                                  </div>
                                  @php
                                    $jumlah = 0;
                                  @endphp
                                  @foreach ($absensi as $JadwalPraktikum)
                                    @if ($JadwalPraktikum->JadwalPraktikum->id_jadwal_dosen == $idjadwaldosen)
                                      @php
                                        $jumlah = $jumlah+1;
                                      @endphp
                                    @endif
                                  @endforeach
                                  @if ($jumlah > 0)
                                  <table class="table datatable">
                                    <thead>
                                      <tr>
                                        <th>Pertemuan Ke -</th>
                                        <th>Nama Kelas</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                      @foreach ($absensi as $JadwalPraktikum)
                                        @if ($JadwalPraktikum->JadwalPraktikum->id_jadwal_dosen == $idjadwaldosen)
                                          @php
                                            $tanggal    = Carbon\Carbon::parse($JadwalPraktikum->JadwalPraktikum->tanggal)->format('d-m-Y');
                                            $jammulai   = Carbon\Carbon::parse($JadwalPraktikum->JadwalPraktikum->waktu_mulai)->format('H:i A');
                                            $jamselesai = Carbon\Carbon::parse($JadwalPraktikum->JadwalPraktikum->waktu_selesai)->format('H:i A');
                                          @endphp
                                          <tr>
                                            <td>{{$JadwalPraktikum->JadwalPraktikum->pertemuan}}</td>
                                            <td>{{$JadwalPraktikum->JadwalPraktikum->nama_kelas}}</td>
                                            <td>{{$JadwalPraktikum->JadwalPraktikum->ruangan}}</td>
                                            <td>{{$tanggal}}</td>
                                            <td>{{$jammulai}} - {{$jamselesai}}</td>
                                          </tr>
                                        @endif
                                      @endforeach
                                    @endif
                                    </tbody>
                                  </table>
                                    {{ csrf_field() }}

                                </form>
                            </div>
                            <!-- END VALIDATIONENGINE PLUGIN -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
