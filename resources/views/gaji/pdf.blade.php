<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Gaji</title>
    <style>
table {
    border-left: 0.01em solid #ccc;
    border-right: 0;
    border-top: 0.01em solid #ccc;
    border-bottom: 0;
    border-collapse: collapse;
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid #ccc;
    border-top: 0;
    border-bottom: 0.01em solid #ccc;
}
</style>
</head>
<body>
    <center>
            <?php $bulanText = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'); ?>
           <h3><u>Laporan Gaji Karyawan dari Bulan {{$bulanText[$bulan]}} dan Tahun {{$tahun}}</h3>
    </center>
    <table border="1"  style="width:100%">
            <tr>
                <th>No #</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Posisi</th>
                <th>Gaji</th>
                <th>Lembur</th>
                <th>Total Gaji</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
            <?php $no=1;?>
            @foreach($gaji as $data)
                <tr>
                   <td>{{$no++}}</td>
                   <td>{{ $data->nama }}</td>
                   <td>{{ $data->alamat }}</td>
                  <td>{{ $data->nama_posisi }}</td>
                  <td>Rp.{{ $data->gaji }}</td>
                  <td>Rp.{{ $data->lembur }}</td>
                  <td>Rp.{{ $data->total_gaji }}</td>
                  <td>{{ $data->tanggal }}</td>
                  <td>
                    @if ($data->keterangan == "Lunas")
                     Lunas
                    @else
                     Belum
                    @endif
                  </td>
                </tr>
            @endforeach
    </table>
</body>
</html>