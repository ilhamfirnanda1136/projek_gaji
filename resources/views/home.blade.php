@extends('layouts.base')

@section('container')
<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">
            <h2 style="color:#6495ED";><b> APLIKASI PENGGAJIAN KARYAWAN CV SIMPATI</h2>

            <img src="{{url('/')}}/img/images.jpg">
        </div>
        <div class="col-md-12 text-center">
        <h3>Aplikasi penggajian adalah aplikasi yang digunakan untuk mengelola, mengatur, dan mengotomatisasi pembayaran karyawan. Menggunakan aplikasi ini bisa membantu permudah melacak semua pembayaran dan menyimpan semua catatan pembayaran perusahaan.</h3>
        </div>

        <div class="col-md-12 text-center">
            <select class="form-select" aria-label="Default select example">
                <option selected>Keuntungan menggunakan Aplikasi Penggajian Karyawan</option>
                <option value="1">1. Terhindar dari Kesalahan Perhitungan Gaji</option>
                <option value="2">2. Menghemat Waktu</option>
                <option value="3">3. Keamanan Data Terjamin</option>
                <option value="4">4. Tidak Diperlukan Keahlian Khusus </option>
                <option value="5">5. Menghemat Biaya</option>
                <option value="6">6. Perhitungan Akurat </option>
                <option value="7">7. Kecepatan Perhitungan Gaji Meningkat</option>
                <option value="8">8. Produktivitas Karyawan Bisa Ditingkatkan</option>
            </select>
        </div>
    </div>
</div>
@endsection