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
                            <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form action="/kelas/{{$kelas->id}}/update" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="X" {{ old('kelas', $kelas->kelas) === 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('kelas', $kelas->kelas) === 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('kelas', $kelas->kelas) === 'XII' ? 'selected' : '' }}>XII</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" value="{{$kelas->nama_kelas }}">
                        @error('nama_kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tapel_id" class="form-label">Tahun Akademik</label>
                        <select name="tapel_id" class="form-control @error('tapel_id') is-invalid @enderror" id="tapel_id">
                            <option value="" disabled>Pilih Tahun Akademik</option>
                            <option value="" disabled {{ $kelas->tapel == null ? 'selected' : '' }}>Belum Tahun Akademik Untuk Dipilih</option>
                            @foreach ($tapel as $t)
                            <option value="{{ $t->id }}" {{ $t->id == optional($kelas->tapel)->id ? 'selected' : '' }}>
                                {{ $t->tapel }} | Semester {{ $t->semester }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="guru_id">Guru</label>
                        <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" id="guru_id" class="form-control">
                            <option value="" disabled>Pilih Wali Kelas</option>
                            <option value="0" {{ $kelas->guru == null ? 'selected' : '' }}>Belum ada guru untuk dijadikan wali kelas</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ $kelas->guru && $g->id == $kelas->guru->id ? 'selected' : '' }}>{{ $g->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    @endsection