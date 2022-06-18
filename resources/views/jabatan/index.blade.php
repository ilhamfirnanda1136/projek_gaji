@extends('layouts.base')
@section('container')
<div class="container-fluid">
    <div class="card-header">
        <br>
        @if (session('status'))
        <span class="aler alert-success">{{session('status')}}</span>
        @endif
        <h3 class="card-title">Tabel Jabatan</h3>

        <a href="{{url('')}}/jabatan/create" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>

    </div>
    <!-- /.card-header -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">DATA JABATAN</h6>
        </div>
        <div class="card-body shadow-lg">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-center text-light">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Posisi</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody class=" text-center">
                        @php $no=1; @endphp
                        @foreach ($jabatan as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $data->nama_posisi }}</td>
                            <td>RP.{{$data->total_gaji}}</td>
                            <td>

                                <form action="{{url('')}}/jabatan/delete/{{$data->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="{{url('')}}/jabatan/edit/{{$data->id}}" class="btn btn-sm btn-success">Edit</a>
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