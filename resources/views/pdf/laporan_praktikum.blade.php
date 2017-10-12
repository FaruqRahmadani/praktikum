<<<<<<< current
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
    <title>LAPORAN DATA PELAKSANAAN PRAKTIKUM</title>
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
    <h2 style="text-align: center;">LAPORAN DATA PELAKSANAAN PRAKTIKUM</h2>
    <h2 style="text-align: center; margin-bottom: 5px;">{{$periode->periode}}</h2>
    <br>
    <hr class="bawah">
    <table>
      <thead>
          <tr>
              <th style="width: 25px;">No</th>
              <th style="width: 80px;">Kode Materi</th>
              <th style="width: 120px;">Materi Praktikum</th>
              <th style="width: 225px;">Nama Dosen</th>
              <th style="width: 70px;">Jumlah Kelas</th>
              <th style="width: 70px;">Jumlah Mahasiswa</th>
          </tr>
      </thead>
      <tbody>
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
          <tr>
            <td style="text-align: center;">{{$no = $no+1}}</td>
            <td style="text-align: center">{{$datas['materi']['kode_mk']}}</td>
            <td style="padding-left: 5px;">{{$datas['materi']['materi_praktikum']}}</td>
            <td style="padding-left: 5px;">{{$datas['dosen']['nama']}}</td>
            <td style="text-align: right; padding-right: 5px;">{{($JumlahKelas == 0 ? '0':$JumlahKelas)}}</td>
            <td style="text-align: right; padding-right: 5px;">{{$JumlahPeserta}} Orang</td>
          </tr>
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
=======
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
>>>>>>> before discard
