@extends('backend.layouts.app')

@section('content')
@if(Session::has('alert'))
  @if(Session::get('sweetalert')=='success')
    <div class="swalDefaultSuccess">
    </div>
  @elseif(Session::get('sweetalert')=='error')
    <div class="swalDefaultError">
    </div>
    @elseif(Session::get('sweetalert')=='danger')
    <div class="swalDefaultDanger">
    </div>
  @endif
@endif
<div class="content-header">
    @if (session('status'))

        <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"></div>
        <div class="alert-body text-center">
            <div class="alert-title"><h1><i class="far fa-check-square"></i>{{ session('status') }}</h1></div>
            </div>
        </div>
    @endif
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Arsip Surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div>
    </div> Berikut ini adalah surat - surat yang telah terbit dan diarsipkan.
    Klik "Lihat" pada kolom aksi untuk menampilkan surat.
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-star nav-icon"></i> Arsip</h5>
                    <div class="float-right">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            {{-- <button type="button" class="btn btn-success">
                                Tambah Transaksi
                            </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-borderless table-striped dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th data-field="id">#</th>
                                <th data-field="id">Nomor Surat</th>
                                <th data-field="Telepon" data-editable="true">Kategori</th>
                                <th data-field="name" data-editable="true">Judul</th>
                                <th data-field="Alamat" data-editable="true">Waktu Pengarsipan</th>
                                <th data-field="Telepon" data-editable="true">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">

                            @foreach($arsi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$data->no_surat}}</td>
                                    <td>@if ($data->kategori == "PU") Pengumuman
                                        @elseif($data->kategori == "UD") Undangan
                                        @elseif($data->kategori == "ND") Nota Dinas
                                        @elseif($data->kategori == "PMB") Pemberitahuan
                                        @endif</td>
                                    <td>{{$data->judul}}</td>
                                    <td>{{ date(' d-F-Y H:i:s', strtotime($data->created_at)) }}</td>
                                    <td>
                                        <form method="POST" class="d-inline" action="{{ url('arsip/'.$data->id) }}" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Arsip Surat ini ?')">
                                            @method('delete')
                                            @csrf
                                            <button class=" btn btn-circle btn-mn center btn-danger" >
                                                Hapus
                                            </button>
                                        </form>
                                        <a href="{{route('arsip_unduh', $data->file)}}" class="center btn btn-circle btn-mn btn-warning">
                                        Unduh</a>
                                        <a href="{{route('lihat_arsip', $data->id)}}" class="center btn btn-circle btn-mn btn-primary">
                                        Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <a class="btn btn-success" href="{{route('buat_arsip')}}">
                         Arsipkan Surat
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
