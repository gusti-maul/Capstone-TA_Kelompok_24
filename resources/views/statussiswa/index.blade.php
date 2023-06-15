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
                            <li class="breadcrumb-item active" aria-current="page">Kelulusan Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('proses-kelulusan') }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center">
                        <h4 class="mr-auto">Pilih Siswa yang Lulus</h4>
                        @if (Auth::user()->role == 'Admin')
                        <div class="custom-control custom-checkbox ml-2">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all">Pilih Semua</label>
                        </div>
                        @endif
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas Saat Ini</th>
                                <th scope="col">Status Siswa</th>
                                @if (Auth::user()->role == 'Admin')
                                <th class="text-center" scope="col">Lulus</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->kelas->kelas }} {{ $data->kelas->nama_kelas }}</td>
                                <td>{{ $data->status_siswa }}</td>
                                @if (Auth::user()->role == 'Admin')
                                <td class="text-center">
                                    <input type="checkbox" name="siswa_id[]" value="{{ $data->id }}">
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        // Memilih semua checkbox saat checkbox "select all" diubah
                        document.getElementById('select-all').addEventListener('change', function(e) {
                            const checkboxes = document.querySelectorAll('input[name="siswa_id[]"]');
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = e.target.checked;
                            });
                        });
                    </script>
                    @if (Auth::user()->role == 'Admin')
                    <button type="submit" class="btn btn-primary">Proses Kelulusan</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @endsection