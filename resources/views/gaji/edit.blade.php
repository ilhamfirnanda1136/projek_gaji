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
        @if (session('error'))
        <span class="aler alert-success">{{session('error')}}</span>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{url('')}}/gaji/update/{{$gaji->id}}">
            @csrf

            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Id Gaji</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 form-control" name="kode" id="kode" value="{{$gaji->id}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <select class="col-sm2 form-control col-sm-6" name="nama" id=nama>
                        @foreach ($alpa2 as $key => $value)
                        <option value="{{ $key }}"> {{ $value }} </option>
                        @endforeach
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                <div class="col-sm-10">
                    <select class="col-sm-6 form-control" name="posisi" id="posisi">
                           <option>--Pilih Posisi--</option>
                            @foreach ($alpa as $jabatan)
                            <option value="{{ $jabatan->id }}" data-gaji="{{$jabatan->total_gaji}}" {{$gaji->posisi == $jabatan->id ? 'selected' : '' }}> {{ $jabatan->nama_posisi }} </option>
                            @endforeach
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control col-sm-6" name="gaji" id="gaji" value="{{$gaji->gaji}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="lembur" class="col-sm-2 col-form-label">Lembur</label>
                <div class="col-sm-10">
                    <select name="lembur" id="lembur" class="form-control col-sm-6">
                        <option value="{{$gaji->lembur}}">
                            @if ($gaji->lembur == 0)
                            0 Jam
                        <option value="20000">1 Jam</option>
                        <option value="40000">2 Jam</option>
                        <option value="60000">3 Jam</option>
                        @elseif ($gaji->lembur == 20000)
                        1 Jam
                        <option value="0">0 Jam</option>
                        <option value="40000">2 Jam</option>
                        <option value="60000">3 Jam</option>
                        @elseif ($gaji->lembur == 40000)
                        2 Jam
                        <option value="0">0 Jam</option>
                        <option value="20000">1 Jam</option>
                        <option value="60000">3 Jam</option>

                        @elseif ($gaji->lembur == 60000)
                        3 jam
                        <option value="0">0 Jam</option>
                        <option value="20000">1 Jam</option>
                        <option value="40000">2 Jam</option>
                        @endif
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="total_gaji" class="col-sm-2 col-form-label">Total Gaji</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="total_gaji" id="total_gaji" readonly value="{{$gaji->total_gaji}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control col-sm-6" name="tanggal" id="tanggal" value="{{$gaji->tanggal}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="keterangan" id="keterangan" value="{{$gaji->keterangan}}">
                </div>
            </div>

            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
        </form>

    </section>
</div>
@stop
@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
         $('#posisi').change(function(){
           var selected = $(this).find('option:selected');
           var extra = selected.data('gaji');
           $('#gaji').val(extra); 
        });
    })
</script>
@endsection