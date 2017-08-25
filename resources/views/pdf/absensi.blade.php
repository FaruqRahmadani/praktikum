<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      table{
        border-collapse: collapse;
        margin-top: 20px;
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
      h5{
        margin-bottom: 0px;
      }
      hr.atas{
        border: 1px solid black;
        width: 600px;
        margin-bottom: 40px;
      }
      hr.bawah{
        margin-top: 0px;
        width: 100%;
        border: 1px solid #708090;
      }
    </style>
    <title>ABSENSI PRAKTIKUM</title>
  </head>
  <body>
    @php
      $no = 0;
    @endphp
    <img src="logo.png">
    <div class="header">
      <h4>UNIVERSITAS ISLAM KALIMANTAN (UNISKA)</h4>
      <h4>MUHAMMAD ARSYAD AL BANJARI</h4>
      <h2>FAKULTAS TEKNOLOGI INFORMASI</h2>
      <p>Kampus Banjarbaru, Jl. Salak no.44 Kel. Guntung Paikat, Banjarbaru</p>
    </div>
    <hr class="atas">
    <h5>Daftar Absensi Mahasiswa Praktikum</h5>
    <hr class="bawah">
    <table>
      <thead>
          <tr>
              <th style="width: 25px;">No</th>
              <th style="width: 100px;">NPM</th>
              <th style="width: 200px;">Nama</th>
              <th style="width: 125px;">No HP</th>
              <th style="width: 150px;">Tanda Tangan</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($data as $datas)
          <tr>
            <td style="text-align: center;">{{$no = $no+1}}</td>
            <td style="padding-left: 5px;">{{$datas->Mahasiswa->NPM}}</td>
            <td style="padding-left: 5px;">{{$datas->Mahasiswa->nama}}</td>
            <td style="padding-left: 5px;">{{$datas->Mahasiswa->no_hp}}</td>
            <td></td>
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
    <p>Banjarbaru, {{$bulan[date('m')].' '.date('Y')}}</p>
  </body>
</html>
