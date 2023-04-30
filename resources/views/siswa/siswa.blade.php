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
                        <a class="btn btn-primary btn-round ml-auto" href="/siswa/register" role="button">
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
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Agama</th>
                                    <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Wali</th>
                                    <th class="text-center">Pekerjaan Ayah</th>
                                    <th class="text-center">Pekerjaan Ibu</th>
                                    <th class="text-center">Pekerjaan Wali</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Agama</th>
                                    <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Wali</th>
                                    <th class="text-center">Pekerjaan Ayah</th>
                                    <th class="text-center">Pekerjaan Ibu</th>
                                    <th class="text-center">Pekerjaan Wali</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($data_siswa as $data)
                                <tr>
                                    <td>{{$data->nama_lengkap}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>{{$data->tanggal_lahir}}</td>
                                    <td>{{$data->agama}}</td>
                                    <td>{{$data->nama_ayah}}</td>
                                    <td>{{$data->nama_ibu}}</td>
                                    <td>{{$data->nama_wali}}</td>
                                    <td>{{$data->pekerjaan_ayah}}</td>
                                    <td>{{$data->pekerjaan_ibu}}</td>
                                    <td>{{$data->pekerjaan_wali}}</td>
                                    <td>{{$data->alamat}}</td>
                                 
                                    <td>
                                  
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