@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/kepalasekolah">Kepala Sekolah</a></li>
                            <li class="breadcrumb-item active"><a>Kepala Sekolah Terhapus</a></li>
                        </ol>
                    </nav>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Telpon</th>
                                        @if (Auth::user()->role=='Admin' )
                                        <th class="text-center" style="width: 10%">Restore</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kepsek as $kepsek)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{$kepsek->getAvatar()}}" height="75" width="75">
                                        </td>
                                        <td class="text-center">{{$kepsek->nama}}</td>
                                        <td class="text-center">{{$kepsek->telpon}}</td>
                                        @if (Auth::user()->role=='Admin' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-kepsek" data-original-title="Restore" href="#" role="button" kepsek-id="{{$kepsek->id}}">
                                                    <i class="icon-reload"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @endif
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
    @section('footer')
    <script>
        $('.restore-kepsek').click(function() {
            var kepsek_id = $(this).attr('kepsek-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore Kepala Sekolah ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/kepalasekolah/" + kepsek_id + "/restore";
                    }
                });
        });
    </script>
    <style>
        .swal-text {
            text-align: center;
        }
    </style>
    @endsection
    @endsection