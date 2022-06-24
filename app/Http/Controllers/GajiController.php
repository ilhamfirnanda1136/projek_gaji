<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportGaji;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Gaji;
use App\Models\Jabatan;

use Illuminate\Support\Facades\Auth;


class GajiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $batas = 5;
        $jumlah_gaji = Gaji::count();
        $gaji = Gaji::leftjoin('jabatan','jabatan.id','gaji.posisi')->leftjoin('anggota','anggota.id','gaji.nama')->select('gaji.*','.jabatan.nama_posisi','anggota.nama','anggota.alamat')->get();
        // $no = $batas * ($gaji->currentPage() - 1);
        return view('gaji.index', compact('gaji', 'jumlah_gaji'));
    }

    public function index2()
    {
        $batas = 5;
        $jumlah_gaji = Gaji::count();
        $user_id = Auth::user()->id;
        $gaji = Gaji::leftjoin('jabatan','jabatan.id','gaji.posisi')->leftjoin('anggota','anggota.id','gaji.nama')->select('gaji.*','.jabatan.nama_posisi','anggota.nama','anggota.alamat')
            ->whereRaw("gaji.nama IN (SELECT id FROM anggota WHERE user_id=".$user_id.")")->get();
        // $no = $batas * ($gaji->currentPage() - 1);
        return view('karyawan.gaji.index', compact('gaji', 'jumlah_gaji'));
    }

    public function ambilupdate($id)
    {
        Gaji::find($id)
            ->update([
                'keterangan' => 'Lunas',
            ]);
        return redirect('/gaji');
    }

    public function ambilupdate2($id)
    {
        Gaji::find($id)
            ->update([
                'keterangan' => 'Lunas',
            ]);
        return redirect('/gajis');
    }

    public function create()
    {
        $data = Gaji::count();
        $alpa = Jabatan::all();
        $alpa2 = Anggota::pluck('nama', 'id');
        return view('gaji.create', compact('data', 'alpa', 'alpa2'));
    }
    public function store(Request $request)
    {

        $cetakGaji = Gaji::where('nama',$request->nama)->whereDate('created_at', date('Y-m-d'))->get();
        if(count($cetakGaji) > 0) {
            return redirect()->back()->with('error','Error tidak boleh menginput data gaji dihari yang sama untuk user sama');
        }
        $gaji = new Gaji;
        $gaji->id = $request->kode;
        $gaji->nama = $request->nama;
        $gaji->posisi = $request->posisi;
        $gaji->gaji = $request->gaji;
        $gaji->lembur = $request->lembur;
        $gaji->total_gaji = $request->gaji + $request->lembur;
        $gaji->tanggal = $request->tanggal;
        $gaji->keterangan = $request->keterangan;
        $gaji->save();
        return redirect('/gaji')->with('pesan', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $gaji = Gaji::find($id);
        $data = Gaji::count();
        $alpa = Jabatan::all();
        $alpa2 = Anggota::pluck('nama', 'id');
        return view('gaji.edit', compact('gaji', 'data', 'alpa', 'alpa2'));
    }
    public function update(Request $request, $id)
    {
        $gaji = Gaji::find($id);
        /*$cetakGaji = Gaji::where('nama',$request->nama)->whereDate('created_at', date('Y-m-d'))->get();
        if(count($cetakGaji) > 0) {
            return redirect()->back()->with('error','Error tidak boleh menginput data gaji dihari yang sama untuk user sama');
        }*/
        $gaji->id = $request->kode;
        $gaji->nama = $request->nama;
        $gaji->posisi = $request->posisi;
        $gaji->gaji = $request->gaji;
        $gaji->lembur = $request->lembur;
        $gaji->total_gaji = $request->gaji + $request->lembur;
        $gaji->tanggal = $request->tanggal;
        $gaji->keterangan = $request->keterangan;
        $gaji->update();
        return redirect('/gaji')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        Gaji::find($id)
            ->delete();
        return redirect('/gaji')->with('pesan', 'Data berhasil dihapus');
    }

    // public function search(Request $request)
    // {
    //     $batas = 5;
    //     $cari = $request->kata;

    //     $gajis = Gaji::where('nama', 'like', "%" . $cari . "%")
    //         ->orwhere('posisi', 'like', "%" . $cari . "%")
    //         ->orwhere('gaji', 'like', "%" . $cari . "%")
    //         ->orwhere('total_gaji', 'like', "%" . $cari . "%")
    //         ->orwhere('tanggal', 'like', "%" . $cari . "%")
    //         ->orwhere('keterangan', 'like', "%" . $cari . "%")
    //         ->orwhere('id', 'like', "%" . $cari . "%");

    //     $gaji = $gajis->paginate($batas);

    //     $jumlah_gaji = $gajis->get()->count();
    //     $no = $batas * ($gaji->currentPage() - 1);
    //     return view('gaji.search', compact('gaji', 'no', 'cari', 'jumlah_gaji'));
    // }

    // public function exportGaji()
    // {
    //     return Excel::download(new exportGaji, 'data_gaji.xlsx');
    // }


    public function cetak($id)
    {
        $gaji = Gaji::find($id);

        return view('karyawan.gaji.cetakGaji', compact('gaji'));
    }

    public function print(Request $request) 
    {
        $gaji = Gaji::leftjoin('jabatan','jabatan.id','gaji.posisi')->leftjoin('anggota','anggota.id','gaji.nama')->select('gaji.*','.jabatan.nama_posisi','anggota.nama','anggota.alamat')->whereMonth('tanggal',$request
            ->bulan)->whereYear('tanggal',$request->tahun);
        //dd($request->bulan);
        if(Auth::user()->level === 2) {
            $user_id = Auth::user()->id;
            $gaji->whereRaw("gaji.nama IN (SELECT id FROM anggota WHERE user_id=".$user_id.")");            
        }
        $gaji->orderBy('id', 'DESC');
        $tahun = $request->tahun;   
        $bulan = $request->bulan;
        $pdf = \PDF::loadView('gaji.pdf', ['gaji'=>$gaji->get(),'bulan'=>$bulan,'tahun'=>$tahun]);
        return $pdf->stream('gajiKaryawan.pdf');
    }
}
