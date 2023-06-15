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
                            <li class="breadcrumb-item"><a href="/jadwalpelajaran">Jadwal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Pelajaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form action="/jadwal/tambah" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control" required>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="time" name="jam" id="jam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mapel_id">Mapel</label>
                            <select name="mapel_id" id="mapel_id" class="form-control" required>
                                @foreach ($mapel as $m)
                                @if ($m->tapel)
                                <option value="{{ $m->id }}">{{$m->kode_mapel}} | {{ $m->mapel }} | {{$m->tapel->tapel}} Semester {{$m->tapel->semester}}</option>
                                @else
                                <option value="{{ $m->id }}">{{ $m->mapel }} | Belum ada tahun ajaran</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                @foreach ($kelas as $k)
                                @if ($k->tapel)
                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }} | {{ $k->tapel->tapel }} Semester {{ $k->tapel->semester }}</option>
                                @else
                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }} | Belum ada tahun ajaran</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection