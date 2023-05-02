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
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Kelas</th>
                                    <!-- <th class="text-center">Agama</th> -->
                                    <!-- <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Wali</th>
                                    <th class="text-center">Pekerjaan Ayah</th>
                                    <th class="text-center">Pekerjaan Ibu</th>
                                    <th class="text-center">Pekerjaan Wali</th>
                                    <th class="text-center">Alamat</th> -->
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Kelas</th>
                                    <!-- <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Wali</th>
                                    <th class="text-center">Pekerjaan Ayah</th>
                                    <th class="text-center">Pekerjaan Ibu</th>
                                    <th class="text-center">Pekerjaan Wali</th>
                                    <th class="text-center">Alamat</th> -->
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($siswa as $siswa)
                                <tr>
                                    <td>
                                        <img src="{{$siswa->getAvatar()}}" height="75" width="75">
                                    </td>
                                    <td>{{$siswa->nama_lengkap}}</td>
                                    <td>{{$siswa->jenis_kelamin}}</td>
                                    <td>{{$siswa->tanggal_lahir}}</td>
                                    <td></td>
                                    <!-- <td>{{$siswa->agama}}</td> -->
                                    <!-- <td>{{$siswa->nama_ayah}}</td>
                                    <td>{{$siswa->nama_ibu}}</td>
                                    <td>{{$siswa->nama_wali}}</td>
                                    <td>{{$siswa->pekerjaan_ayah}}</td>
                                    <td>{{$siswa->pekerjaan_ibu}}</td>
                                    <td>{{$siswa->pekerjaan_wali}}</td>
                                    <td>{{$siswa->alamat}}</td> -->
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/siswa/{{$siswa->id}}/profile" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/siswa/{{$siswa->id}}/edit" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg " data-original-title="Hapus" href="/siswa/{{$siswa->id}}/delete" role="button" id="delete">
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