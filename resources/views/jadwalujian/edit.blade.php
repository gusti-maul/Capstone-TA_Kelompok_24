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
                            <li class="breadcrumb-item active" aria-current="page">Edit Jadwal Ujian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="/jadwalujian/{{$jadwalujian->id}}/edit" method="POST">
                @csrf
                <div class="form-group">
                    <label for="hari">Tanggal Ujian</label>
                    <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control" value="{{ $jadwalujian->tanggal_ujian }}" required>
                </div>

                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" name="jam" id="jam" class="form-control" value="{{ $jadwalujian->jam }}" required>
                </div>

                <div class="form-group">
                    <label for="ruangan">Ruangan Ujian</label>
                    <input type="text" name="ruangan" id="ruangan" class="form-control" value="{{ $jadwalujian->ruangan }}" required>
                </div>

                <div class="form-group">
                    <label for="mapel_id">Mapel</label>
                    <select name="mapel_id" id="mapel_id" class="form-control">
                        @foreach ($mapel as $item)
                        <option value="{{ $item->id }}" {{ $jadwalujian->mapel_id === $item->id ? 'selected' : '' }}>
                            {{ $item->kode_mapel }} | {{ $item->mapel }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        @foreach ($kelas as $item)
                        @if ($item->tapel)
                        <option value="{{ $item->id }}" {{ $jadwalujian->kelas_id === $item->id ? 'selected' : '' }}>
                            {{ $item->kelas }} {{ $item->nama_kelas }} | {{ $item->tapel->tapel }} Semester {{ $item->tapel->semester }}
                        </option>
                        @else
                        <option value="{{ $item->id }}" {{ $jadwalujian->kelas_id === $item->id ? 'selected' : '' }}>
                            {{ $item->kelas }} {{ $item->nama_kelas }} | Belum ada tahun ajaran
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection