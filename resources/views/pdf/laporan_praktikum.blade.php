{{-- variabel nya $periode lwn $data  --}}

{{$periode->periode}}
<br>
<br>
@foreach ($data as $datas)
  @php
  $JumlahPeserta=0;
  $JadwalPraktikum = \App\JadwalPraktikum::where('id_jadwal_dosen', $datas->id)->get();
  $JumlahKelas = $JadwalPraktikum->max('pertemuan');
  foreach ($JadwalPraktikum as $JPraktikum) {
    $AbsensiMahasiswa = \App\AbsensiMahasiswa::where('id_jadwal_praktikum',$JPraktikum->id)->get();
    $JumlahPeserta += count($AbsensiMahasiswa);
  }
  @endphp

  {{$datas['materi']['kode_mk']}}<br>
  {{$datas['materi']['materi_praktikum']}}<br>
  {{$datas['materi']['semester']}}

  {{$datas['dosen']['nidn']}}<br>
  {{$datas['dosen']['nama']}}<br>


  {{($JumlahKelas == 0 ? '0':$JumlahKelas)}}<br>
  {{$JumlahPeserta}}<br>----------------------<br>


@endforeach
