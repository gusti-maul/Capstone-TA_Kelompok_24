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
                            <li class="breadcrumb-item"><a href="/mapel">Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Mata Pelajaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Detail Mata Pelajaran</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Kode Mata Pelajaran :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $mapel->kode_mapel }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mata Pelajaran :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $mapel->mapel }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tahun Ajaran :</label>
                                <div class="col-md-6">
                                    @if ($mapel->tapel)
                                    <p class="form-control-static">{{ $mapel->tapel->tapel }} | Semester {{ $mapel->tapel->semester }}</p>
                                    @else
                                    <p class="form-control-static">Tidak ada tahun ajaran</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Guru :</label>
                                <div class="col-md-6">
                                    @if ($mapel->guru && $mapel->guru->nama)
                                    <p class="form-control-static">{{ $mapel->guru->nama }}</p>
                                    @else
                                    <p class="form-control-static">Tidak ada guru</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Deskripsi Mata Pelajaran :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $mapel->deskripsi }}</p>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="/mapel" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @endsection