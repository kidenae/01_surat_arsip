<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Hadir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HadirController extends Controller
{
    function index()
    {
        $hadir = Hadir::all();
        return view('backend.hadir.index', compact(['hadir']));
    }

    function scanqrcode()
    {
        return view('backend.hadir.qr');
    }

    function insert(Request $request)
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $tgl = Carbon::now()->format('Y-m-d');
        $jam = Carbon::now()->format('h:i:s');
        $hadir = Hadir::insert([
            'SISNIS'    => $request->sisnis,
            'HDRTGL'   => $tgl,
            'HDRJAM'   => $jam,
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->back()->with('alert', 'Sukses Konfirmasi Kehadiran Siswa '.$request->sisnis);
    }
}
