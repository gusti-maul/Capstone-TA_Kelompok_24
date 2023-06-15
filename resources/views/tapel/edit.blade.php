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
                            <li class="breadcrumb-item active" aria-current="page">Edit </li>
                        </ol>
                    </nav>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/tapel/{{$tapel->id}}/update" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group row">
                                            <label for="tapel_awal" class="col-md-4 col-form-label text-md-right">{{ __('Tahun Pelajaran') }}</label>
                                            <div class="col-md-6">

                                                <input type="text" id="tapel_awal" name="tapel_awal" class="form-control @error('tapel_awal') is-invalid @enderror" value="{{ old('tapel_awal', $tapel->tapel_awal) }}">
                                                <span>/</span>
                                                <input type="text" id="tapel_akhir" name="tapel_akhir" class="form-control @error('tapel_akhir') is-invalid @enderror" value="{{ old('tapel_akhir', $tapel->tapel_akhir) }}">
                                                @error('tapel_awal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                @error('tapel_akhir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}</label>

                                            <div class="col-md-6">
                                                <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" required>
                                                    <option value="">Pilih Semester</option>
                                                    <option value="1" {{$tapel->semester == 1 ? 'selected' : ''}}>Semester 1</option>
                                                    <option value="2" {{$tapel->semester == 2 ? 'selected' : ''}}>Semester 2</option>
                                                </select>
                                                @error('semester')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Simpan Perubahan') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection