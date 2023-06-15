@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Pengajuan Legalisir</h4>
                    </div>
                </div>
                <div class="card-body">
                    <h1>Detail Pengajuan</h1>
                    <form action="/pengajuan/{{ $pengajuan->id }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $pengajuan->nama_siswa }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $pengajuan->kelas }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="alasan">Alasan Pengajuan</label>
                            <textarea class="form-control" id="alasan" name="alasan" disabled>{{ $pengajuan->alasan }}</textarea>
                        </div>

                        <div class="mb-3">
                            <p>File: <a href="{{ Storage::url($pengajuan->file) }}" target="_blank">Lihat file</a> | <a href="{{ Storage::url($pengajuan->file) }}" download>Download</a></p>
                        </div>
                        
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='/home'">OK</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>

@endsection
