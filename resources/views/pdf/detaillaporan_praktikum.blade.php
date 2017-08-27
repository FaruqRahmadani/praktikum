{{-- {{$periode->periode}} --}}

{{-- variabel nya $periode lwn $data  --}}

{{$periode->periode}}
<br>
<br>
{{$dosen->NIDN}}
<br>
{{$dosen->nama}}
<br>
<br>
<br>

@foreach ($jadwaldosen as $dataJadwalDosen)
  @foreach ($dataJadwalDosen->JadwalPraktikum as $dataJadwalPraktikum)
    @php
    $JumlahPeserta = count(\App\AbsensiMahasiswa::where('id_jadwal_praktikum', $dataJadwalPraktikum->id)->get());
    @endphp
    
  {{$dataJadwalDosen['materi']['kode_mk']}}<br>
  {{$dataJadwalDosen['materi']['materi_praktikum']}}<br>

  {{$dataJadwalPraktikum['nama_kelas']}}<br>
  {{$dataJadwalPraktikum['pertemuan']}}<br>
  {{$JumlahPeserta}}<br>

  {{Carbon\Carbon::parse($dataJadwalPraktikum['tanggal'])->format('d-m-Y')}}<br>
  {{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_mulai'])->format('H:i A')}} - {{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_selesai'])->format('H:i A')}}<br>


  <br>----------------------<br>

  @endforeach
@endforeach
