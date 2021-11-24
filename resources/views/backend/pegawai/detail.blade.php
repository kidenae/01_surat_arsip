@extends('backend.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Detail Pegawai</h1>

        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
            <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
            <li class="breadcrumb-item"><a href="#">Detail Pegawai {{ $pegawai->PEGNAMA }}</a></li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold "> IDENTITAS PEGAWAI</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-qrcode"></i> QR Code Pegawai ({{$pegawai->PEGNAMA}})</h5><br><br>
                                {!! QrCode::size(400)->generate($pegawai->PEGNIK); !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-address-card"></i>    Identitas Pegawai ({{$pegawai->PEGNAMA}})</h5><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">NIK</label>
                                    <input type="text" name="nis" class="form-control" value="{{$pegawai->PEGNIK}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input type="text" name="nama" class="form-control" value="{{$pegawai->PEGNAMA}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Asal Kota</label>
                                    <input type="text" name="kota" class="form-control" value="{{$pegawai->PEGKOTA}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="card-body">
                        <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-address-card"></i> Data Presensi {{$pegawai->PEGNAMA}}</h5><br><br>
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
                                @if ($presensi)
                                @foreach($presensi as $data)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$data->PRESTGL}}</td>
                                    <td>{{$data->PRESJAM}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td></td>
                                    <td class="text-center">Anda belum melakukan presensi</td>
                                    <td></td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-12">
                <div class="card shadow mb-4">


                </div>
                <a class="btn btn-danger" href="{{route('pegawai')}}"><i class="fas fa-arrow-circle-left"></i> Kembali</a><br><br><br><br>
            </div>
        </div>
    </div>
</section>
@stop
