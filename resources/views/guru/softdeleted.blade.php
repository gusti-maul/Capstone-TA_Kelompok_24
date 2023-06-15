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
                            <li class="breadcrumb-item"><a href="/guru">Guru</a></li>
                            <li class="breadcrumb-item active"><a>Guru Terhapus</a></li>
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
                                    @foreach($guru as $guru)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{$guru->getAvatar()}}" height="75" width="75">
                                        </td>
                                        <td class="text-center">{{$guru->nama}}</td>
                                        <td class="text-center">{{$guru->telpon}}</td>
                                        @if (Auth::user()->role=='Admin' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-guru" data-original-title="Restore" href="#" role="button" guru-id="{{$guru->id}}">
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
        $('.restore-guru').click(function() {
            var guru_id = $(this).attr('guru-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore Guru ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/guru/" + guru_id + "/restore";
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