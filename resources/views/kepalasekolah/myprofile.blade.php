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
                            <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
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
                                                        <img src="{{auth()->user()->kepsek->getAvatar()}}" alt="profile" class="rounded-circle" height="150" width="150">
                                                        <div class="mt-3">
                                                            <h4>{{auth()->user()->kepsek->nama}}</h4>
                                                            <p class="text-muted font-size-sm">{{auth()->user()->kepsek->alamat}}</p>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <button class="btn btn-primary" onclick="location.href='/{{auth()->user()->kepsek->id}}/editkepalasekolah'">Edit</button>
                                                                </div>
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
                                                                {{auth()->user()->kepsek->nama}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Gelar</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{auth()->user()->kepsek->gelar}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">NIP</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{auth()->user()->kepsek->nip}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Email</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                <a href="mailto: {{auth()->user()->email}}">{{auth()->user()->email}}</a>
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
                                                        <div class=" row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Telepon</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{auth()->user()->kepsek->telpon}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Tempat/Tanggal Lahir</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{ empty(auth()->user()->kepsek->tempat_lahir) ? '---' : (auth()->user()->kepsek->tempat_lahir) }}, {{ empty(auth()->user()->kepsek->tanggal_lahir) ? '---' : \Carbon\Carbon::parse(auth()->user()->kepsek->tanggal_lahir)->format('d/m/Y')}}
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Jenis Kelamin</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{auth()->user()->kepsek->jenis_kelamin}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="mb-0">Agama</h6>
                                                            </div>
                                                            <div class="col-sm-8 text-secondary">
                                                                {{auth()->user()->kepsek->agama}}
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