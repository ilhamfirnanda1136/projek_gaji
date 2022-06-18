@extends('layouts.base')
@section('container')
<div class="container-fluid">
     <div class="row profile-page mb-3">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Laporan Data Gaji</h3>
                    <form action="{{url('/gaji/print')}}" method="get" target="_blank">
                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <?php  $data = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
                                ?>
                            <select class="form-control" name="bulan" id="bulan">
                                <?php  foreach ($data as $key => $value) { 
                                ?>
                                <option value="<?= $key ?>"><?=$value ?></option>
                                <?php
                            } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                                <?php
                                    $thn_skr = date('Y');
                                    for ($x = $thn_skr; $x >= 2012; $x--) {
                                    ?>
                                <option value="<?=$x?>"><?php echo $x ?>
                                </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="lapor" class="btn btn-primary btn-md"><i class="fa fa-download"></i> Download</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="card-header">
        <br>
        @if (session('status'))
        <span class="aler alert-success">{{session('status')}}</span>
        @endif
        <h3 class="card-title">Tabel Karyawan</h3>
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
              <th spcope="col">No</th>
              <th>Nama</th>
              <th>Posisi</th>
              <th>Gaji</th>
              <th>Lembur</th>
              <th>Total Gaji</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody class=" text-center">
          @php $no=1; @endphp
            @foreach ($gaji as $data)
            <tr>
              <td scope="row">{{ $no++ }}</td>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->nama_posisi }}</td>
              <td>Rp.{{ $data->gaji }}</td>
              <td>Rp.{{ $data->lembur }}</td>
              <td>Rp.{{ $data->total_gaji }}</td>
              <td>{{ $data->tanggal }}</td>
              <td>
                @if ($data->keterangan == "Lunas")
                <span class="badge badge-success"> Lunas</span>
                @else
                <span class="badge badge-danger"> Belum</span>
                </td>
                <td>
                <a href="{{url('')}}/gajis/cetak/{{$data->id}}" target="blank" class="btn btn-warning"> Ambil Gaji </a>
                </td>
            @endif  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection