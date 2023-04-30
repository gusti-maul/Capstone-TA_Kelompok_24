@extends('dashboard.layouts.admin.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">User</h4>
                        <a class="btn btn-primary btn-round ml-auto" href="/user/register" role="button">
                            <i class="fa fa-plus"></i>
                            Add User
                        </a>
                    </div>
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
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($daftar_user as $daftar)
                                <tr>
                                    <td>{{$daftar->name}}</td>
                                    <td>{{$daftar->username}}</td>
                                    <td>{{$daftar->email}}</td>
                                    <td>{{$daftar->role}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="#" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="user/{{$daftar->id}}/edit" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg " data-original-title="Hapus" href="user/{{$daftar->id}}/delete"  role="button" id="delete">
                                                <i class="fa fa-times"></i>
                                            </a>
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
    @include('sweetalert::alert')
    @endsection