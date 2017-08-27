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
      <p>Kampus Banjarbaru, Jl. Salak No.44 Kel. Guntung Paikat, Banjarbaru</p>
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
            <td style="padding-left: 5px;">{{$datas['dosen']['nama']}}<br></td>
            <td style="padding-left: 5px;">{{($JumlahKelas == 0 ? '0':$JumlahKelas)}}</td>
            <td style="padding-left: 5px;">{{$JumlahPeserta}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
