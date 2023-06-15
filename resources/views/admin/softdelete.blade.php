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
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active"><a>Admin Terhapus</a></li>
                            </ol>
                        </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    @if (Auth::user()->role=='Admin' )
                                    <th class="text-center" style="width: 10%">Restore</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftar_user as $daftar)
                                <tr>
                                    <td>{{$daftar->name}}</td>
                                    <td>{{$daftar->username}}</td>
                                    <td>{{$daftar->email}}</td>
                                    <td>{{$daftar->role}}</td>
                                    @if (Auth::user()->role=='Admin' )
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-admin" data-original-title="Restore" href="#" role="button" admin-id="{{$daftar->id}}">
                                                <i class="icon-reload"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-admin" data-original-title="Hapus Permanen" href="#" role="button" admin-id="{{$daftar->id}}">
                                                <i class="flaticon-interface-5"></i>
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
    @section('footer')
    <script>
        $('.restore-admin').click(function() {
            var admin_id = $(this).attr('admin-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore Admin ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/user/" + admin_id + "/restore";
                    }
                });
        });
    </script>
    <script>
        $('.delete-admin').click(function() {
            var admin_id = $(this).attr('admin-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus permanen Admin ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/admin/" + admin_id + "/delete";
                    }
                });
        });
    </script>
    @endsection
    @endsection