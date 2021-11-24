<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Presensi;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PegawaiController extends Controller
{
    function index()
    {
        $pegawai = Pegawai::all();
        return view('backend.pegawai.index', compact(['pegawai']));
    }

    public function scanResult(Request $request)
    {
        if($request->get('content')){
            $idPeg = $request->get('content');
            $resultData = Pegawai::where('PEGNIK', 'LIKE', "%{$idPeg}%")->get();

            return response()->json($resultData);
        }
    }
    public function detailPegawai($id)
    {
        $pegawai =Pegawai::where('PEGNIK', $id)->first();
        $presensi = DB::select("SELECT * FROM presensi WHERE PEGNIK='$id'");
        return view('backend.pegawai.detail', compact(['pegawai', 'presensi']));
    }
}
