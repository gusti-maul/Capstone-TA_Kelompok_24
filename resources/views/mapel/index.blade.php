@extends('dashboard.layouts.admin.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Mata Pelajaran</h4>
                        <a data-toggle="modal" class="btn btn-primary btn-round ml-auto text-white " data-target="#exampleModal" role="button">
                            <i class="fa fa-plus"></i>
                            Daftar Mata Pelajaran
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode Mata Pelajaran</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Kode Mata Pelajaran</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($mapel as $mapel)
                                <tr>
                                    <td>{{$mapel->kode_mapel}}</td>
                                    <td>{{$mapel->mapel}}</td>
                                    <td>{{$mapel->deskripsi}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="#" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="mapel/{{$mapel->id}}/edit" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg " data-original-title="Hapus" href="mapel/{{$mapel->id}}/delete" role="button" id="delete">
                                                <i class="flaticon-interface-5"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Tambah Nilai</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small"></p>
                    <form action="/mapel" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Kode Mata Pelajaran</label>
                                <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror" id="kode_mapel" value="{{ old('kode_mapel') }}" placeholder="Masukan Kode Mata Pelajaran">
                                @error('kode_mapel')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Mata Pelajaran</label>
                                <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror" id="mapel" value="{{ old('mapel') }}" placeholder="Masukan Nama Mata Pelajaran">
                                @error('nilai_pengetahuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Deskripsi Mata Pelajaran</label>
                                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukan Deskripsi Mata Pelajaran">
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection