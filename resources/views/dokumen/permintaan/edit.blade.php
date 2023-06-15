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
                        <h4 class="card-title">Permintaan Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/permintaan" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value=" {{auth()->user()->siswa->nama_lengkap}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_siswa">NISN</label>
                                @if (auth()->user()->siswa->nisn)
                                <input type="number" class="form-control" id="nisn" name="nisn" value="{{ auth()->user()->siswa->nisn }}" readonly>
                                @else
                                <input type="number" class="form-control" id="nisn" name="nisn" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Tempat Lahir</label>
                                @if (auth()->user()->siswa->tempat_lahir)
                                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ auth()->user()->siswa->tempat_lahir }}" readonly>
                                @else
                                <input type="text" class="form-control" id="tempat" name="tempat" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Tanggal Lahir</label>
                                @if (auth()->user()->siswa->tanggal_lahir)
                                <input type="date" class="form-control" id="ttl" name="ttl" value="{{ auth()->user()->siswa->tanggal_lahir }}" readonly>
                                @else
                                <input type="date" class="form-control" id="ttl" name="ttl" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Agama</label>
                                @if (auth()->user()->siswa->agama)
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ auth()->user()->siswa->agama }}" readonly>
                                @else
                                <input type="text" class="form-control" id="agama" name="agama" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Orang Tua</label>
                                @if (auth()->user()->siswa->nama_ayah)
                                <input type="text" class="form-control" id="ortu" name="ortu" value="{{ auth()->user()->siswa->nama_ayah }}" readonly>
                                @else
                                <input type="text" class="form-control" id="ortu" name="ortu" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Alamat</label>
                                @if (auth()->user()->siswa->alamat)
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ auth()->user()->siswa->alamat }}" readonly>
                                @else
                                <input type="text" class="form-control" id="alamat" name="alamat" value="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Alasan Permintaan Dokumen</label>
                                <input type="text" class="form-control" id="ket" name="ket" value="">
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection