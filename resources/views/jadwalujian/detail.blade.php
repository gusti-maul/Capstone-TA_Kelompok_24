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
                            <li class="breadcrumb-item"><a href="/jadwalujian">Jadwal Ujian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Jadwal Ujian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Detail Jadwal Ujian</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Hari :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $jadwalujian->hari }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tanggal Ujian :</label>
                                <div class="col-md-6">
                                    @php
                                    $tanggalUjian = date('d/m/Y', strtotime($jadwalujian->tanggal_ujian));
                                    @endphp
                                    <p class="form-control-static">{{ $tanggalUjian }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Jam :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">{{ $jadwalujian->jam }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mapel :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">
                                        @if ($jadwalujian->mapel)
                                        {{ $jadwalujian->mapel->kode_mapel }} | {{ $jadwalujian->mapel->mapel }}
                                        @else
                                        Tidak ada mapel
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Ruangan Ujian :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">
                                        {{ $jadwalujian->ruangan ?? 'Ruangan belum diatur' }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Kelas :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">
                                        @if ($jadwalujian->kelas)
                                        {{ $jadwalujian->kelas->kelas }} {{ $jadwalujian->kelas->nama_kelas }}
                                        @else
                                        Tidak ada kelas
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tahun Ajaran :</label>
                                <div class="col-md-6">
                                    <p class="form-control-static">
                                        @if ($jadwalujian->kelas->tapel)
                                        {{ $jadwalujian->kelas->tapel->tapel }} | Semester {{ $jadwalujian->kelas->tapel->semester }}
                                        @else
                                        Tahun ajaran belum diatur
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="/jadwalujian" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection