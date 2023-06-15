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
                            <li class="breadcrumb-item active"><a>Admin </a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center justify-content-end">
                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepala Sekolah')
                        <a href="/admin/terhapus" class="btn btn-danger btn-round mr-2 text-white">
                            <i class="flaticon-interface-5"></i>
                            Terhapus
                        </a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                        <a class="btn btn-primary btn-round text-white" href="/user/register" role="button">
                            <i class="fa fa-plus"></i>
                            Tambah Admin
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center">No .</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    @if (Auth::user()->role=='Admin' )
                                    <th class="text-center" style="width: 10%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($daftar_user as $daftar)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">{{$daftar->name}}</td>
                                    <td class="text-center">{{$daftar->username}}</td>
                                    <td class="text-center">{{$daftar->email}}</td>
                                    <td class="text-center">{{$daftar->role}}</td>
                                    @if (Auth::user()->role=='Admin' )
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="user/{{$daftar->id}}/edit" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-user" data-original-title="Hapus" href="#" role="button" user-id="{{$daftar->id}}">
                                                <i class="fa fa-times"></i>
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
        $('.delete-user').click(function() {
            var user_id = $(this).attr('user-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus Admin ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/user/" + user_id + "/delete";
                    }
                });
        });
    </script>
    @endsection
    @endsection