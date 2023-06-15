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
                            <li class="breadcrumb-item"><a href="/mapel">Daftar Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Mata Pelajaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form action="/mapel/{{$mapel->id}}/update" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Kode Mata Pelajaran</label>
                        <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror" id="kode_mapel" value="{{ $mapel->kode_mapel }}" placeholder="Masukkan Kode Mata Pelajaran">
                        @error('kode_mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror" id="mapel" value="{{ $mapel->mapel }}" placeholder="Masukkan Nama Mata Pelajaran">
                        @error('nama_mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group form-group-default">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" id="taopel" name="tapel_id" class="form-control @error('tapel_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih Tahun Ajaran</option>
                            @foreach($tapel as $t)
                            <option value="{{ $t->id }}" {{ $t->id == $mapel->tapel_id ? 'selected' : '' }}>
                                {{ $t->tapel }} | Semester {{ $t->semester }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Guru</label>
                        <select class="form-control" id="guru" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach($guru as $g)
                            <option value="{{ $g->id }}" {{ $g->id == $mapel->guru_id ? 'selected' : '' }}>
                                {{ $g->nama }} {{ $g->gelar }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Deskripsi Mata Pelajaran</label>
                        <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ $mapel->deskripsi }}" placeholder="Masukkan Deskripsi Mata Pelajaran">
                        @error('nama_mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    @endsection