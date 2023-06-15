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
                            <li class="breadcrumb-item"><a href="/home">Pengajuan Legalisir</a></li>
                            <li class="breadcrumb-item active"><a>Form Pengajuan Legalisir</a></li>
                        </ol>
                    </nav>

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Pengajuan Legalisir</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/pengajuan" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input id="nama_siswa" type="text" class="form-control" name="nama_siswa" value=" {{auth()->user()->siswa->nama_lengkap}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    @if (auth()->user()->siswa->kelas)
                                    <input id="kelas" type="text" class="form-control" name="kelas" value="{{auth()->user()->siswa->kelas->kelas}} {{auth()->user()->siswa->kelas->nama_kelas}}" readonly>
                                    @else
                                    <input id="kelas" type="text" class="form-control" name="kelas" value="" placeholder="Masukkan kelas...">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alasan">Alasan Pengajuan</label>
                                    <textarea id="alasan" class="form-control" name="alasan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input id="file" type="file" class="form-control-file" name="file" required>
                                    <div id="letter_file" class="form-text">Masukan file dengan format .pdf</div>
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