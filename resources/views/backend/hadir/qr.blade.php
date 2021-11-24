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
        <h1 class="m-0 text-dark">Data Kehadiran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Kehadiran</a></li>
            <li class="breadcrumb-item"><a href="#">Data Kehadiran</a></li>
            <li class="breadcrumb-item active">Detail Data Kehadiran</li>
        </ol>
        </div>
    </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header">
                    <h5>Scan QR Code</h5>
                </div>
                <div class="card-body text-center">
                    <video width="300" height="300" id="preview"></video>

                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-primary" onclick="scan()" >Mulai Scan</button>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-danger">
                <div class="card-header">
                    <h3>Hasil QR Code</h3>
                </div>
                <form action="{{route('in.hadir')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">NIK Pegawa</label>
                                    <input type="text" name="sisnis" id="sisnis" value="NIS SISWA" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="sisnama" id="sisnama" value="Nama Siswa" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary">Konfirmasi Kehadiran</button>
                    </div>
                </form>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('footer')
<script type="text/javascript">
    function scan(){
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
                console.log(content);
        $.ajax({
            url         : "{{route('scan.result')}}",
            method      : "POST",
            data        : {content:content, _token: '{{csrf_token()}}'},
            success     : function(response){
                $('#sisnis').val(response[0].SISNIS);
                $('#sisnama').val(response[0].SISNAMA);
            }
        });
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            var selectedCam = cameras[0];
            $.each(cameras, (i, c) => {
                if (c.name.indexOf('back') != -1) {
                    selectedCam = c;
                    return false;
                }
            });

            scanner.start(selectedCam);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
     }
</script>
@stop

