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
                            <li class="breadcrumb-item active"><a>Kepala Sekolah</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center justify-content-end">
                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepala Sekolah')
                        <a href="/kepalasekolah/terhapus" class="btn btn-danger btn-round mr-2 text-white">
                            <i class="flaticon-interface-5"></i>
                            Terhapus
                        </a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                        <a class="btn btn-primary btn-round text-white" href="/kepalasekolah/register" role="button">
                            <i class="fa fa-plus"></i>
                            Tambah Kepala Sekolah
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Telpon</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($kepsek as $kepsek)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">
                                            <img src="{{$kepsek->getAvatar()}}" height="75" width="75">
                                        </td>
                                        <td class="text-center">{{$kepsek->nama}}</td>
                                        <td class="text-center">{{$kepsek->telpon}}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/kepalasekolah/{{$kepsek->id}}/profile" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role=='Admin' )
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/kepalasekolah/{{$kepsek->id}}/edit" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-kepsek" data-original-title="Hapus" href="#" role="button" kepsek-id="{{$kepsek->id}}">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </td>
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
        $('.delete-kepsek').click(function() {
            var kepsek_id = $(this).attr('kepsek-id');
            swal({
                    title: "Yakin ?",
                    text: "Dengan menghapus Kepala Sekolah ini, akun Kepala Sekolah untuk login juga akan ikut terhapus. Lanjut menghapus ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/kepalasekolah/" + kepsek_id + "/delete";
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