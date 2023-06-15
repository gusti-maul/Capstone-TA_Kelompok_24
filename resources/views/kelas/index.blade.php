@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="container card-header">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a>Kelas</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas X</h5>
                                        <p class="card-text">Lihat untuk jadwal untuk Kelas X di sini</p>
                                        <a href="/kelas/kelasx" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas XI</h5>
                                        <p class="card-text">Lihat untuk jadwal Kelas XI di sini</p>
                                        <a href="/kelas/kelasxi" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas XII</h5>
                                        <p class="card-text">Lihat untuk jadwal untuk Kelas XII di sini</p>
                                        <a href="/kelas/kelasxii" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection