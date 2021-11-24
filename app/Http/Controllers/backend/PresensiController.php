<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PresensiController extends Controller
{
    function index()
    {
        $presensi = DB::select("SELECT * FROM presensi");
        return view('backend.presensi.index', compact(['presensi']));
    }

    function scanqrcode()
    {
        return view('backend.presensi.qr');
    }

    function insert(Request $request)
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $tgl = Carbon::now()->format('Y-m-d');
        $jam = Carbon::now()->format('H:i:s');
        $presensi = Presensi::insert([
            'PEGNIK'    => $request->pegnik,
            'PRESTGL'   => $tgl,
            'PRESJAM'   => $jam,
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->back()->with('alert', 'Sukses Konfirmasi Absen Pegawai '.$request->pegnik);
    }
}
