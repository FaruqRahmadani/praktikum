@extends('mahasiswa.layouts.master')
@section('tittle')
  Mahasiswa -  {{$data->nama}}
@endsection
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="mahasiswa.php">Home</a></li>
					<li class="active"><a href="jadwal_saya.php">Jadwal Saya</a></li>

                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h1> Jadwal Saya </h1>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                          <table class="table datatable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Materi</th>
                                <th>Dosen</th>
                                <th>Nama Kelas</th>
                                <th>Ruangan</th>
                                <th>Pertemuan Ke -</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                              </tr>
                            </thead>

                            <tbody>
                              @php
                                $no = 0;
                              @endphp
                              {{-- {{dd($jadwal->last())}}) --}}
                              @foreach ($jadwal as $jadwals)
                                @php
                                  $dataPraktikum = App\JadwalPraktikum::find($jadwals['id_jadwal_praktikum']);

                                  $jadwaldosen = App\JadwalDosen::where('id', $dataPraktikum['id_jadwal_dosen'])->first();
                                  $namadosen   = App\Dosen::where('id', $jadwaldosen['id_dosen'])->first()['nama'];
                                  $namamateri  = App\Materi::where('id', $jadwaldosen['id_praktikum'])->first()['materi_praktikum'];

                                  $tanggal    = Carbon\Carbon::parse($jadwals['JadwalPraktikum']['tanggal'])->format('d-m-Y');
                                  $jammulai   = Carbon\Carbon::parse($jadwals['JadwalPraktikum']['waktu_mulai'])->format('H:i A');
                                  $jamselesai = Carbon\Carbon::parse($jadwals['JadwalPraktikum']['waktu_selesai'])->format('H:i A');
                                @endphp
                                <tr>
                                  <td>{{$no = $no + 1}}</td>
                                  <td>{{$namamateri}}</td>
                                  <td>{{$namadosen}}</td>
                                  <td>{{$dataPraktikum['nama_kelas']}}</td>
                                  <td>{{$dataPraktikum['ruangan']}}</td>
                                  <td>{{$dataPraktikum['pertemuan']}}</td>
                                  <td>{{$tanggal}}</td>
                                  <td>{{$jammulai}} - {{$jamselesai}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection
