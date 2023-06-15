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
                            <li class="breadcrumb-item"><a href="/kelas">Kelas</a></li>
                            <li class="breadcrumb-item active"><a>Tambah Kelas</a></li>
                        </ol>
                    </nav>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <form action="/kelas" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                    @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" value="{{ old('nama_kelas') }}" required>
                                    @error('nama_kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tapel_id">Tahun Akademik</label>
                                    <select name="tapel_id" class="form-control @error('tapel_id') is-invalid @enderror" id="tapel_id" class="form-control">
                                        <option value="" disabled selected>Pilih Tahun Akademik</option>
                                        @foreach ($tapel as $tapel)
                                        <option value="{{ $tapel->id }}">{{ $tapel->tapel }} | Semester {{ $tapel->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="guru_id">Guru</label>
                                    <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" id="guru_id" class="form-control">
                                        <option value="" disabled selected>Pilih Wali Kelas</option>
                                        @foreach ($guru as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection