{{$dosen->NIDN}}<br>
{{$dosen->nama}}<br>

@foreach ($data as $datas)
  @foreach ($datas->JadwalPraktikum as $dataJadwalPraktikum)
    ------------------------------------------------------------<br>
    {{$datas['materi']['kode_mk']}}<br>
    {{$datas['materi']['materi_praktikum']}}<br>
    {{$dataJadwalPraktikum['nama_kelas']}}<br>
    {{$dataJadwalPraktikum['ruangan']}}<br>
    {{$dataJadwalPraktikum['tanggal']}}<br>
    {{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_mulai'])->format('H:i A')}} - {{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_selesai'])->format('H:i A')}}<br>
  @endforeach
@endforeach
