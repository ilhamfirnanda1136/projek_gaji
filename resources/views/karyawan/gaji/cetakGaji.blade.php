@extends('layouts.base-cetak')

@section('cetak')
<div class="container">
<div class="p-3 mb-2 bg-primary text-white">
<h3 class="text-center"><b> CV SIMPATI <b></h3>
<h5 class="text-center">JL. XXXX Lamongan</h5>
<hr>
<table>
<tr>
<td rowspan="10" align="center"><img src="{{url('/')}}/anggota/{{$gaji->anggota->gambar}}" width="100" height="100"></td>
<td style="padding-left: 50px">
    <h6 class="text-left">Kepada</h6>
    <h6 class="text-left">Nama : {{$gaji->anggota->nama}}</h6>
    <h6 class="text-left">Posisi : {{$gaji->jabatan->nama_posisi}}</h6>    
<td style="padding-left: 600px">
    <h6 class="text-left">Bukti Pembayaran Gaji</h6>
    <h6 class="text-left">{{$gaji->tanggal}}</h6></td>
</td>
</tr>
</table>
<br>
<h4 class="text-center"><b> Deskripsi Gaji </b></h4>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Gaji pokok</th>
      <th scope="col">Lembur</th>
      <th scope="col">Total Gaji</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$gaji->gaji}}</td>
      <td>{{$gaji->lembur}}</td>
      <td>{{$gaji->total_gaji}}</td>
    </tr>
  </tbody>
</table>


</div>
</div>
</div>
@endsection
  
