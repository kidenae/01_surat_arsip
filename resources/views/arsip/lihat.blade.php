@extends('backend.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lihat Arsip</h1>

        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Arsip</a></li>
            <li class="breadcrumb-item"><a href="#">Lihat</a></li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach ($arsi as $a)

            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold "> Lihat Arsip</h4>
                    </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                        <h5 class="m-0 font-weight-bold float-left">Nomor</h5>
                                </div>
                                <div class="col-md-11">
                                        <h5 class="m-0 float-left">: {{ $a->no_surat }}</h5>
                                </div>
                                <div class="col-md-1">
                                        <h5 class="m-0 font-weight-bold float-left">Kategori</h5>
                                </div>
                                <div class="col-md-11">
                                        <h5 class="m-0 float-left">: @if ($a->kategori == "PU") Pengumuman
                                            @elseif($a->kategori == "UD") Undangan
                                            @elseif($a->kategori == "ND") Nota Dinas
                                            @elseif($a->kategori == "PMB") Pemberitahuan
                                            @endif
                                        </h5>
                                </div>
                                <div class="col-md-1">
                                        <h5 class="m-0 font-weight-bold float-left">Judul</h5>
                                </div>
                                <div class="col-md-11">
                                        <h5 class="m-0 float-left">: {{ $a->judul }}</h5>
                                </div>
                                <div class="col-md-1">
                                        <h5 class="m-0 font-weight-bold float-left">Waktu Unggah</h5>
                                </div>
                                <div class="col-md-11">
                                        <h5 class="m-0 float-left">: {{ date(' d-F-Y H:i:s', strtotime($a->created_at)) }}</h5>
                                </div>
                                {{-- <h5 class="m-0 font-weight-bold text-primary float-left">Kategori</h5><br>
                                    <h5 class="m-0 font-weight-bold text-primary float-left">judul</h5><br>
                                    <h5 class="m-0 font-weight-bold text-primary float-left">Waktu Unggah</h5><br> --}}
                            </div>
                        </div>

                    <div class="card-body">
                        <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-address-card"></i>    Preview Dokumen </h5><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                   <embed src="/filePDF/{{ $a->file }}" type="application/pdf" width="100%" height="600px" />
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <a class="btn btn-danger" href="{{route('arsip')}}"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    <a href="{{route('arsip_unduh', $a->file)}}" class="center btn btn-circle btn-mn btn-warning">
                                        <i class="fas fa-download"></i>Unduh</a>
                                    <a class="btn btn-primary" href="{{route('edit_arsip', $a->id)}}"><i class="fas fa-pen"></i> Ganti File / Edit</a>
                                </div>
                            </div>
                        </div>
                 </div>
            </div>

        </div>
        @endforeach

        <div class="row">
        <div class="col-12">
                <div class="card shadow mb-4">


                </div>
            </div>
        </div>
    </div>
</section>

@stop
