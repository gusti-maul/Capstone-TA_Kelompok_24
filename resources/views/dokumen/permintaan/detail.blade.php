@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Permintaan Dokumen</h4>                                               
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/permintaan" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $Permintaan->nama }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="nama_siswa">NISN</label>
                                <input type="number" class="form-control" id="nisn" name="nisn" value="{{ $Permintaan->nisn }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nama_siswa">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $Permintaan->tempat }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="nama_siswa">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="ttl" name="ttl" value="{{ $Permintaan->ttl }}" disabled> 
                            </div>                            
                            
                            <div class="form-group">
                                <label for="nama_siswa">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ $Permintaan->agama }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="nama_siswa">Nama Orang Tua</label>
                                <input type="text" class="form-control" id="ortu" name="ortu" value="{{ $Permintaan->ortu }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="nama_siswa">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $Permintaan->alamat }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nama_siswa">Alasan Permintaan Dokumen</label>
                                <input type="text" class="form-control" id="ket" name="ket" value="{{ $Permintaan->ket }}" disabled>
                            </div>
    
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='/permintaan'">OK</button>
                            </div>
    
                        </form>
                        
                    </div>    
                </div>
            </div>
        </div>
    </div>
        
     @endsection

