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
                            <li class="breadcrumb-item"><a href="/tapel">Tahun Ajaran</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Detail Tahun Pelajaran</div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Tahun Pelajaran:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $tapel->tapel }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Semester:</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $tapel->semester }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <a href="/tapel" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection