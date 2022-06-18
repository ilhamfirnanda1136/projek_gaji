@extends('layouts.base')

@section('container')
@if($anggota)
<h1 align="center">BIODATA DIRI</h1>
<table width="745" border="1" cellspacing="0" cellpadding="5" align="center">
<tr align="center" bgcolor="#0000FF">
<td width="174">DATA DIRI</td>
<td width="353">KETERANGAN</td>
<td width="232">FOTO</td>
</tr>
<tr>
<td>Nama</td>
<td>{{$anggota->nama}}</td>
  <?php
                                        $foto = $anggota->gambar ? asset('anggota/'.$anggota->gambar) : asset('img/no-image.png');
                                    ?>
<td rowspan="10" align="center"><img src="{{$foto}}" width="210" height="313"></td>
</tr>
<tr>
<td>Posisi</td>
<td>{{$anggota->jabatan->nama_posisi}}</td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>{{$anggota->jenis_kelamin}}</td>
</tr>
<tr>
<td>Alamat</td>
<td>{{$anggota->alamat}}</td>
</tr>
<tr>
<td>No Hp</td>
<td>{{$anggota->no_hp}}</td>
</tr>
<tr>
<td>Email</td>
<td>{{$anggota->email}}</td>
</tr>
<tr>
@else
<center>
	Anggota Belum Terdaftar
</center>
@endif
@endsection