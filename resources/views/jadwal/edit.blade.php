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
                            <li class="breadcrumb-item"><a href="/jadwalguru">Jadwal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Jadwal Pelajaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="/jadwal/{{$jadwal->id}}/edit" method="POST">
                @csrf
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" id="hari" class="form-control">
                        <option value="Senin" {{ $jadwal->hari === 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $jadwal->hari === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $jadwal->hari === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $jadwal->hari === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $jadwal->hari === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ $jadwal->hari === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ $jadwal->hari === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" name="jam" id="jam" class="form-control" value="{{ $jadwal->jam }}" required>
                </div>

                <div class="form-group">
                    <label for="mapel_id">Mapel</label>
                    <select name="mapel_id" id="mapel_id" class="form-control">
                        @foreach ($mapel as $item)
                        <option value="{{ $item->id }}" {{ $jadwal->mapel_id === $item->id ? 'selected' : '' }}>
                            {{ $item->kode_mapel }} | {{ $item->mapel }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ $jadwal->kelas_id === $item->id ? 'selected' : '' }}>
                            @if ($item->tapel)
                            {{ $item->kelas }} {{ $item->nama_kelas }} | {{$item->tapel->tapel}} Semester {{$item->tapel->semester}}
                            @else
                            {{ $item->kelas }} {{ $item->nama_kelas }} | Belum ada tahun ajaran
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection