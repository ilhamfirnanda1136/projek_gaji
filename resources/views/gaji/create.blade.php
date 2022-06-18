@extends('layouts.base')
@section('container')
<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Gaji</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data" action="{{url('/gaji/store')}}">
            @csrf
            <div class="container">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Id Gaji</label>
                    <div class="col-sm-10">
                        <input type="text" class="col-sm-2 form-control" name="kode" id="kode" disabled value="{{mt_rand(1,999)}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-5">
                        <select id="inputState" class="form-control" name="nama">
                            @foreach ($alpa2 as $key => $value)
                            <option value="{{ $key }}"> {{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-5">
                        <select id="posisi" class="form-control" name="posisi" >
                            <option>--Pilih Posisi--</option>
                            @foreach ($alpa as $jabatan)
                            <option value="{{ $jabatan->id }}" data-gaji="{{$jabatan->total_gaji}}" > {{ $jabatan->nama_posisi }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="gaji" id="gaji">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lembur" class="col-sm-2 col-form-label">Lembur</label>
                    <div class="col-sm-5">
                        <!-- <input type="integer" class="form-control" name="lembur" id="lembur"> -->
                        <select name="lembur" class="form-control">
                            <option value="0"> 0 Jam </option>
                            <option value="20000"> 1 Jam </option>
                            <option value="40000"> 2 Jam </option>
                            <option value="60000"> 3 Jam </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-5">
                        <select name="keterangan" class="form-control">
                            <option value="Lunas"> Lunas </option>
                            <option value="Belum"> Belum Lunas </option>
                        </select>
                    </div>
                </div>


                <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
            </div>
        </form>

    </section>
</div>
@stop
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('#posisi').change(function(){
           var selected = $(this).find('option:selected');
           var extra = selected.data('gaji');
           $('#gaji').val(extra); 
        });
    })
</script>
@endsection