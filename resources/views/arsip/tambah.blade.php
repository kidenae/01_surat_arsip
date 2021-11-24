@extends('backend.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Unggah Arsip</h1>

        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Arsip</a></li>
            <li class="breadcrumb-item"><a href="#">Unggah</a></li>
        </ol>
        </div>
    </div><font size="3"> Unggah Surat yang telah terbit pada kolom ini untuk diarspkan.</font>
    <font size="4" class="text-red "><br><br> <strong> Catatan: <br> - Gunakan file berformat PDF</strong></font>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold "> Unggah Arsip</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ url('arsip') }}" enctype="multipart/form-data" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group  col-md-12">
                                        <label for="nis">Nomor Surat</label>
                                        <input required type="text" name="no_sur" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nama">Kategori</label>
                                        <select required class="form-control" name="ktg" id="">
                                            <option value="UD">Undangan</option>
                                            <option value="PU">Pengumuman</option>
                                            <option value="ND">Nota Dinas</option>
                                            <option value="PMB">Pemberitahuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <label for="kota">Judul</label>
                                        <input required type="text" name="judul" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kota">File Surat</label>
                                        <input type="file" required name="file" accept=".pdf" class="form-control">
                                    </div><br>
                                    <div class="row">
                                        <div class=" col">
                                            <a class="btn btn-danger" href="{{route('arsip')}}"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                        </div>
                    </div><br><br>

                </div>
            </div>

        </div>
    </div>
</section>
@stop
