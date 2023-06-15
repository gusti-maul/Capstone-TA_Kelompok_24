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
                                <li class="breadcrumb-item active"><a>Jadwal Ujian</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas X</h5>
                                        <p class="card-text">Lihat untuk jadwal ujian untuk Kelas X di sini</p>
                                        <a href="/jadwalujiankelasx" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas XI</h5>
                                        <p class="card-text">Lihat untuk jadwal ujian Kelas XI di sini</p>
                                        <a href="/jadwalujiankelasxi" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas XII</h5>
                                        <p class="card-text">Lihat untuk jadwal ujian untuk Kelas XII di sini</p>
                                        <a href="/jadwalujiankelasxii" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-primary shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Semua</h5>
                                        <p class="card-text">Lihat untuk jadwal ujian untuk semua kelas di sini</p>
                                        <a href="/jadwalujian/all" class="btn btn-primary stretched-link">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection