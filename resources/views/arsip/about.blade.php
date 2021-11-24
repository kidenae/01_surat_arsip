@extends('backend.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">About</h1>

        </div><!-- /.col -->

    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold ">Identitas Pembuat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="1931733098.jpg" width="20%" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-address-card"></i> Aplikasi Ini Dibuat Oleh :</h5><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">Nama</label>
                                    <input type="text" name="nis" class="form-control" value="Mochammad Aulya Rahman" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">NIM</label>
                                    <input type="text" name="nama" value="1931713098" class="form-control"  disabled>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Tanggal Pembuat</label>
                                    <input type="text" name="kota" value="22 November 2021" class="form-control"  disabled>
                                </div>
                            </div>
                        </div>
                    </div><br><br>

                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-12">
                <div class="card shadow mb-4">


                </div>
            </div>
        </div>
    </div>
</section>
@stop
