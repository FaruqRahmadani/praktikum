@php
  $no = 0;
@endphp
<table style="width:100%; border:1px solid black;">
  <thead>
      <tr>
          <th>No</th>
          <th>NPM</th>
          <th>Nama</th>
          <th>Tanda Tangan</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($data as $datas)
      <tr>
        <td>{{$no = $no+1}}</td>
        <td>{{$datas->Mahasiswa->NPM}}</td>
        <td>{{$datas->Mahasiswa->nama}}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</table>
