@extends('admin.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Home</li>
                    <li><a href="#">Master Data</a></li>
                    <li class="active">Laporan Detail Pelaksanaan Praktikum</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Laporan Detail Pelaksanaan Praktikum</h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
									<h3>{{$dosen->nama}}</h3>
									<h4>{{$periode->periode}}</h4>
                                    <table class="table datatable table-bordered">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>Mata Kuliah</center></th>
                                                <th><center>Nama Kelas</center></th>
                                                <th><center>Pertemuan Ke-</center></th>
                        												<th><center>Jumlah Mahasiswa<center></th>
                        												<th><center>Tanggal<center></th>
                        												<th><center>Jam<center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no = 0;
                                          @endphp
                                          @foreach ($JadwalDosen as $dataJadwalDosen)
                                            @foreach ($dataJadwalDosen->JadwalPraktikum as $dataJadwalPraktikum)
                                              @php
                                                $JumlahMahasiswa = count(\App\AbsensiMahasiswa::where('id_jadwal_praktikum', $dataJadwalPraktikum->id)->get());
                                              @endphp
                                              <tr>
                                                <td><center>{{$no+=1}}</center></td>
                                                <td><center>{{$dataJadwalDosen->materi->materi_praktikum}}</center></td>
                                                <td><center>{{$dataJadwalPraktikum->nama_kelas}}</center></td>
                                                <td><center>{{$dataJadwalPraktikum->pertemuan}}</center></td>
                                                <td><center>{{$JumlahMahasiswa}}</center></td>
                                                <td><center>{{Carbon\Carbon::parse($dataJadwalPraktikum->tanggal)->format('d-m-Y')}}</center></td>
                                                <td><center>{{Carbon\Carbon::parse($dataJadwalPraktikum->waktu_mulai)->format('H:i A')}} - {{Carbon\Carbon::parse($dataJadwalPraktikum->waktu_selesai)->format('H:i A')}}</center></td>
                                              </tr>
                                            @endforeach
                                          @endforeach
                                        </tbody>
                                    </table>
                                    <a href="/admin/detaillaporan_praktikum/{{Crypt::encryptString($idDosen)}}/{{Crypt::encryptString($idPeriode)}}" target="_blank">
                                       <button class="btn btn-info btn-rounded"><span class="fa fa-print"></span>Print</button>
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
