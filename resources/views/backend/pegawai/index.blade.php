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
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
            <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary float-left"><i class="fas fa-users nav-icon"></i> Data Pegawai</h5>
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
                                <th data-field="Telepon" data-editable="true">QR Code</th>
                                <th data-field="name" data-editable="true">NIK</th>
                                <th data-field="Alamat" data-editable="true">Nama Pegawai</th>
                                <th data-field="Telepon" data-editable="true">Kota</th>
                                <th data-field="Telepon" data-editable="true">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=0?>
                            @foreach($pegawai as $data)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{!! QrCode::size(100)->generate($data->PEGNIK); !!}</td>
                                    <td>{{$data->PEGNIK}}</td>
                                    <td>{{$data->PEGNAMA}}</td>
                                    <td>{{$data->PEGKOTA}}</td>
                                    <td><a href="{{route('detail.pegawai', $data->PEGNIK)}}" class="center btn btn-circle btn-mn btn-primary">
                                        <i class=" fa fa-eye"></i>
                                      </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
