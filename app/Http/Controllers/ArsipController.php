<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;


class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsi = DB::select("SELECT * FROM arsips");
        return view('arsip/arsip', compact('arsi'));
    }
    public function about()
    {
        $arsi = DB::select("SELECT * FROM arsips");
        return view('arsip/about', compact('arsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_arsip()
    {
        return view('arsip/tambah');

    }
    public function create(Request $request)
    {


        if($request->file('file'))
        {
            $file = $request->file;
            $fl = $file->getClientOriginalName();
            $filename = time() ."_". $fl;
            $filePath = public_path() . '/filePDF';
            $file->move($filePath, $filename);
            DB::table('arsips')->insert([
                'no_surat' => $request->no_sur,
                'kategori' => $request->ktg,
                'judul' => $request->judul,
                'file' => $filename,
                'created_at' => now()
            ]);
        }
        return redirect('arsip')->with('status', 'Data Berhasil Ditambah!');

    }
    public function unduh($nama)
    {
    	$filePath = public_path(). '/filePDF/'.$nama;
    	$headers = array(
                 ['Content-Type: application/pdf']
                );

    	return response()->download($filePath, $nama, $headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsi = DB::select("SELECT * FROM arsips WHERE id='$id'");
        return view('arsip/lihat', compact('arsi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsi = DB::select("SELECT * FROM arsips WHERE id='$id'");
        return view('arsip/edit', compact('arsi'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            if($request->file('file'))
            {
                $hapus = Arsip::findorfail($id);

                $file = public_path('/filePDF/').$hapus->file;

                if (file_exists($file)) {
                    @unlink($file);
                }
                $file = $request->file;
                $fl = $file->getClientOriginalName();
                $filename = time() ."_". $fl;
                $filePath = public_path() . '/filePDF';
                $file->move($filePath, $filename);
                DB::table('arsips')->where('id',$id)
                ->update([
                    'no_surat' => $request->no_sur,
                    'kategori' => $request->ktg,
                    'judul' => $request->judul,
                    'file' => $filename,
                    'updated_at' =>  now()
                ]);
            } else {
                DB::table('arsips')->where('id',$id)
                ->update([
                    'no_surat' => $request->no_sur,
                    'kategori' => $request->ktg,
                    'judul' => $request->judul,
                    'updated_at' =>  now()
                ]);

            }
        return redirect('arsip')->with('status', 'Data Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Arsip::findorfail($id);

        $file = public_path('/filePDF/').$hapus->file;

        if (file_exists($file)) {
            @unlink($file);
        }
        $arsi = DB::select("DELETE FROM arsips WHERE id='$id'");
        return redirect('arsip')->with('status', 'Data Berhasil Dihapus!');


    }
}
