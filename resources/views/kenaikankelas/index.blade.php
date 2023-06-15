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
                            <li class="breadcrumb-item"><a href="/kelas/daftarkelas">Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kenaikan Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('proses_kenaikan_kelas') }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center">
                        <h4 class="mr-auto">Pilih Siswa yang Naik Kelas</h4>
                        <div class="custom-control custom-checkbox ml-2">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all">Pilih Semua</label>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas Saat Ini</th>
                                <th class="text-center" scope="col">Naik Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->kelas->kelas }} {{ $data->kelas->nama_kelas }}</td>
                                <td class="text-center">
                                    <input type="checkbox" name="siswa_id[]" value="{{ $data->id }}">
                                </td>
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
                    <div class="form-group">
                        <label for="kelas_id">Dinaikan Ke Kelas:</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            @foreach ($daftarKelas as $kelas)
                            @if ($kelas->tapel)
                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }} {{ $kelas->nama_kelas }} | {{ $kelas->tapel->tapel }} Semester {{ $kelas->tapel->semester }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>



                    <button type="submit" class="btn btn-primary">Proses Kenaikan Kelas</button>
                </form>
            </div>
        </div>
    </div>
    @endsection