@extends('layouts.base')


@section('container')
<div class="container-fluid">
    <div class="card-header">
        <br>
        @if (session('status'))
        <span class="aler alert-success">{{session('status')}}</span>
        @endif
        <h3 class="card-title">Tabel Karyawan</h3>

        <a href="/anggota/create" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>
        <a href="" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Excel</a>
        <a href="" target="_blank" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">PDF</a>
    </div>
    <!-- /.card-header -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">DATA KARYAWAN</h6>
        </div>
        <div class="card-body shadow-lg">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-center text-light">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody class=" text-center">
                        @php $no=1; @endphp
                        @foreach ($anggota as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jabatan->nama_posisi }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->email}}</td>
                            <td>
                                <form action="{{url('/anggota/delete')}}/{{$data->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="{{url('/anggota/edit/')}}/{{$data->id}}" class="btn btn-sm btn-success">Edit</a>
                                    <button class="btn btn-sm btn-danger pull-right" onClick="confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection