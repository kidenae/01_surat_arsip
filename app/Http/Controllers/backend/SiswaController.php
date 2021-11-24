<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Hadir;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        $siswa = Siswa::all();
        return view('backend.siswa.index', compact(['siswa']));
    }

    public function scanResult(Request $request)
    {
        if($request->get('content')){
            $sisnis = $request->get('content');
            $resultData = Siswa::where('SISNIS', 'LIKE', "%{$sisnis}%")->get();

            return response()->json($resultData);
        }
    }
    public function detailSiswa($id)
    {
        $siswa =Siswa::where('SISNIS', $id)->first();
        $hadir = Hadir::where('SISNIS', $id)->get();
        return view('backend.siswa.detail', compact(['siswa', 'hadir']));
    }
}
