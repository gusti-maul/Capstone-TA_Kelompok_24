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
                            <li class="breadcrumb-item"><a href="/siswa/daftarkelas">Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Statu Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('proses-statussiswa') }}" method="POST">
                    @csrf
                    <h4>Ubah Status Siswa</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Status Siswa</th>
                                <th class="text-center" scope="col">Aktif</th>
                                <th class="text-center" scope="col">Pindah</th>
                                <th class="text-center" scope="col">Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->kelas->kelas }} {{ $data->kelas->nama_kelas }}</td>
                                <td>{{ $data->status_siswa }}</td>
                                <td class="text-center">
                                    @if (Auth::user()->role === 'Admin')
                                    <input type="radio" name="siswa_id[{{ $data->id }}]" value="Aktif" {{ $data->status_siswa == 'Aktif' ? 'checked' : '' }}>
                                    @else
                                    <input type="radio" disabled {{ $data->status_siswa == 'Aktif' ? 'checked' : '' }}>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (Auth::user()->role === 'Admin')
                                    <input type="radio" name="siswa_id[{{ $data->id }}]" value="Pindah" {{ $data->status_siswa == 'Pindah' ? 'checked' : '' }}>
                                    @else
                                    <input type="radio" disabled {{ $data->status_siswa == 'Pindah' ? 'checked' : '' }}>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (Auth::user()->role === 'Admin')
                                    <input type="radio" name="siswa_id[{{ $data->id }}]" value="Keluar" {{ $data->status_siswa == 'Keluar' ? 'checked' : '' }}>
                                    @else
                                    <input type="radio" disabled {{ $data->status_siswa == 'Keluar' ? 'checked' : '' }}>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (Auth::user()->role === 'Admin')
                    <button type="submit" class="btn btn-primary">Proses Status Siswa</button>
                    @endif
                </form>


            </div>
        </div>
    </div>
    @endsection