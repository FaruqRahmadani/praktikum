{{-- {{$periode->periode}} --}}

{{-- variabel nya $periode lwn $data  --}}
{{-- variabel nya $periode lwn $data  --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      table{
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 30px;
      }
      table, th, td{
        width: 100%;
        border: 1px solid #708090;
      }
      td{
        height: 35px;
      }
      th{
        background-color: #3CB371;
        text-align: center;
      }
      div.header{
        padding-top: -115px;
        margin-left: 200px;
        margin-bottom: 10px;
      }
      img{
        margin-left: 80px;
        height: 100px;
        width: 100px;
      }
      h4{
        text-align: left;
        padding-bottom: -20px;
      }
      h2{
        text-align: left;
        padding-bottom: -20px;
      }
      hr.atas{
        border: 1px solid black;
        width: 600px;
        /*margin-bottom: 2px;*/
      }
      hr.bawah{
        margin-top: 0px;
        width: 100%;
        border: 1px solid black;
      }
    </style>
    <title>LAPORAN DETAIL PELAKSANAAN PRAKTIKUM</title>
  </head>
  <body>
    @php
      $no = 0;
    @endphp
    <img src="logo.jpg">
    <div class="header">
      <h4>UNIVERSITAS ISLAM KALIMANTAN (UNISKA)</h4>
      <h4>MUHAMMAD ARSYAD AL BANJARI</h4>
      <h2>FAKULTAS TEKNOLOGI INFORMASI</h2>
      <p>Kampus Banjarmasin, Jl. Adhyaksa No.2 Kayutangi, Banjarmasin</p>
    </div>
    <hr class="atas">
    <br>
    <h2 style="text-align: center;">LAPORAN DETAIL PELAKSANAAN PRAKTIKUM</h2>
    <h2 style="text-align: center; margin-bottom: 5px;">{{$periode->periode}}</h2>
    <br>
    <hr class="bawah">
    <br>
    <p style="margin-top: 0px; margin-bottom: 0px;"><b>Nama : {{$dosen->nama}}</b></p>
    <p style="margin-top: 0px; margin-bottom: 0px;"><b>NIDN : {{$dosen->NIDN}}</b></p>
    <table>
      <thead>
          <tr>
              <th style="width: 25px;">No</th>
              <th style="width: 54px;">Kode Materi</th>
              <th style="width: 80px;">Materi Praktikum</th>
              <th style="width: 100px;">Nama Kelas</th>
              <th style="width: 75px;">Pertemuan</th>
              <th style="width: 75px;">Jumlah Mahasiswa</th>
              <th style="width: 80px;">Tanggal</th>
              <th style="width: 100px;">Jam</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($jadwaldosen as $dataJadwalDosen)
          @foreach ($dataJadwalDosen->JadwalPraktikum as $dataJadwalPraktikum)
            @php
            $JumlahPeserta = count(\App\AbsensiMahasiswa::where('id_jadwal_praktikum', $dataJadwalPraktikum->id)->get());
            @endphp
            <tr>
              <td style="text-align: center;">{{$no = $no+1}}</td>
              <td style="text-align: center">{{$dataJadwalDosen['materi']['kode_mk']}}</td>
              <td style="padding-left: 5px;">{{$dataJadwalDosen['materi']['materi_praktikum']}}</td>
              <td style="padding-left: 5px;">{{$dataJadwalPraktikum['nama_kelas']}}</td>
              <td style="text-align: center;">{{$dataJadwalPraktikum['pertemuan']}}</td>
              <td style="text-align: right; padding-right: 5px;">{{$JumlahPeserta}} Orang</td>
              <td style="padding-left: 5px;">{{Carbon\Carbon::parse($dataJadwalPraktikum['tanggal'])->format('d-m-Y')}}</td>
              <td style="padding-left: 5px;">{{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_mulai'])->format('H:i A')}} - {{Carbon\Carbon::parse($dataJadwalPraktikum['waktu_selesai'])->format('H:i A')}}</td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
    @php
      $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
      )
    @endphp
    <table style="border: 0px solid #FFFFFF;">
      <tbody>
        <tr>
          <td style="border: 0px solid #FFFFFF;"></td>
          <td style="border: 0px solid #FFFFFF;"></td>
          <td style="border: 0px solid #FFFFFF; text-align:center;">Banjarmasin, {{Carbon\Carbon::now()->format('d')}} {{$bulan[date('m')].' '.date('Y')}}</td>
        </tr>
        <tr>
          <td style="border: 0px solid #FFFFFF;"><br><br><br><br></td>
          <td style="border: 0px solid #FFFFFF;"></td>
          <td style="border: 0px solid #FFFFFF;"></td>
        </tr>
        <tr>
          <td style="border: 0px solid black;"></td>
          <td style="border: 0px solid black;"></td>
          <td valign=bottom style="text-align:center; border:0px solid black">{{$admin->nama}}</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
