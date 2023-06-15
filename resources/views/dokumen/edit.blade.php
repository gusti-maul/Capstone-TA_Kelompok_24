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
                    <h1>Edit Pengajuan</h1>
                    <form action="/pengajuan/{{ $pengajuan->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $pengajuan->nama_siswa }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $pengajuan->kelas }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="alasan">Alasan Pengajuan</label>
                            <textarea class="form-control" id="alasan" name="alasan">{{ $pengajuan->alasan }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection