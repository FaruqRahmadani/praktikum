<style>
table{
  border-collapse: collapse;
}
table, th, td{
  width: 100%;
  border:1px solid black;
}
td{
  height: 35px;
}
th{
  text-align: center;
}
</style>
@php
  $no = 0;
@endphp
<table>
  <thead>
      <tr>
          <th style="width: 20px;">No</th>
          <th style="width: 150px;">NPM</th>
          <th style="width: 300px;">Nama</th>
          <th style="width: 200px;">Tanda Tangan</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($data as $datas)
      <tr>
        <td style="text-align: center;">{{$no = $no+1}}</td>
        <td style="padding-left: 5px;">{{$datas->Mahasiswa->NPM}}</td>
        <td style="padding-left: 5px;">{{$datas->Mahasiswa->nama}}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</table>
