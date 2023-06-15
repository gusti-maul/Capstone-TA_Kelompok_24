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
                            <li class="breadcrumb-item"><a href="/siswa">Siswa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Siswa</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <body>
                            <div class="container">
                                <div class="main-body">
                                    <div class="row gutters-sm">
                                        <div class="w-100">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="{{$siswa->getAvatar()}}" alt="profile" class="rounded-circle" height="150" width="150">
                                                        <div class="mt-3">
                                                            <h4>{{$siswa->nama_lengkap}}</h4>
                                                            <p class="text-center">Status : {{$siswa->status_siswa}}</p>
                                                            <p class="text-secondary mb-1">
                                                                @if ($siswa->kelas)
                                                                {{$siswa->kelas->kelas}} {{$siswa->kelas->nama_kelas}}
                                                                @else
                                                                Belum Ada Kelas
                                                                @endif
                                                            </p>
                                                            <p class="text-muted font-size-sm">{{$siswa->alamat}}</p>
                                                            <div class="row">
                                                                @if (Auth::user()->role=='Admin' )
                                                                <div class="col-sm-12">
                                                                    <button class="btn btn-primary" onclick="location.href='/siswa/{{$siswa->id}}/edit'">Edit</button>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <!-- <h6 class="mb-3">Informasi Pribadi</h6> -->
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Nama</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nama_lengkap}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">NIS</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nis}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">NISN</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nisn}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Email</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                <a href="mailto:{{$siswa->user->email}}">{{$siswa->user->email}}</a>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Telpon</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->telpon}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Tempat/Tanggal Lahir</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{ empty($siswa->tempat_lahir) ? '---' : $siswa->tempat_lahir }}, {{ empty($siswa->tanggal_lahir) ? '---' : \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d/m/Y') }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Jenis Kelamin</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->jenis_kelamin}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Agama</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->agama}}
                                                            </div>
                                                        </div>
                                                        <hr>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <!-- <h6 class="mb-3">Informasi Lainnya</h6> -->
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Nama Ayah</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nama_ayah}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Pekerjaan Ayah</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->pekerjaan_ayah}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Nama Ibu</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nama_ibu}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Pekerjaan Ibu</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->pekerjaan_ibu}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Nama Wali</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->nama_wali}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Pekerjaan Wali</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{$siswa->pekerjaan_wali}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection