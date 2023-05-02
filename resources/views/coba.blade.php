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
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col" class="small">#</th>
                            <th scope="col" class="small">Nama</th>
                            <th scope="col" class="small">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="small">1</th>
                            <td class="small">John Doe</td>
                            <td class="small">johndoe@example.com</td>
                        </tr>
                        <tr>
                            <th scope="row" class="small">2</th>
                            <td class="small">Jane Smith</td>
                            <td class="small">janesmith@example.com</td>
                        </tr>
                        <tr>
                            <th scope="row" class="small">3</th>
                            <td class="small">Bob Johnson</td>
                            <td class="small">bobjohnson@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection