@extends('backend.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Siswa</a></li>
            <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
            <li class="breadcrumb-item"><a href="#">Detail Data Siswa</a></li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary float-left">QR Code Siswa {{$siswa->SISNIS}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {!! QrCode::size(400)->generate($siswa->SISNIS); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary float-left">Detail Siswa {{$siswa->SISNIS}}</h5>
                        <!-- <div class="float-right">
                            <a href="">
                                <button type="button" class="btn btn-success">
                                    Tambah Transaksi
                                </button>
                            </a>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" name="nis" class="form-control" value="{{$siswa->SISNIS}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" name="nama" class="form-control" value="{{$siswa->SISNAMA}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Asal Kota</label>
                                    <input type="text" name="kota" class="form-control" value="{{$siswa->SISKOTA}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary float-left">Data Presensi {{$siswa->SISNAMA}}</h5>
                        <!-- <div class="float-right">
                            <a href="">
                                <button type="button" class="btn btn-success">
                                    Tambah Transaksi
                                </button>
                            </a>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                        <table class="table table-borderless table-striped dataTable" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=0?>
                                @foreach($hadir as $data)
                                    <tr>
                                        <td>{{++$no}}</td>
                                        <td>{{$data->HDRTGL}}</td>
                                        <td>{{$data->HDRJAM}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop