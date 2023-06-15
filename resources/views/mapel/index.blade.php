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
                            <li class="breadcrumb-item active"><a>Daftar Mata Pelajaran</a></li>
                        </ol>
                    </nav>
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <form action="{{ route('search_mapel') }}" method="get">
                                <div class="input-group mb-3">
                                    <select class="form-control filter" id="tahun_ajaran" name="tahun_ajaran">
                                        <option value="">Semua Tahun Ajaran</option>
                                        @foreach($tapel as $tahun)
                                        <option value="{{$tahun->id}}" @if($tahun->id == request('tahun_ajaran')) selected @endif>{{$tahun->tapel}} | Semester {{$tahun->semester}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepala Sekolah')
                            <a href="/mapel/terhapus" class="btn btn-danger btn-round mr-2 text-white">
                                <i class="flaticon-interface-5"></i>
                                Terhapus
                            </a>
                            @endif
                            @if (Auth::user()->role == 'Admin')
                            <a data-toggle="modal" class="btn btn-primary btn-round ml-auto text-white " data-target="#exampleModal" role="button">
                                <i class="fa fa-plus"></i>
                                Daftar Mata Pelajaran
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode Mata Pelajaran</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    <th class="text-center">Guru Pengampu</th>
                                    <th class="text-center">Tahun Ajaran</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mapel as $mapel)
                                <tr>
                                    <td class="text-center">{{$mapel->kode_mapel}}</td>
                                    <td class="text-center">{{$mapel->mapel}}</td>
                                    <td class="text-center">@if ($mapel->guru)
                                        {{ $mapel->guru->nama }}
                                        @else
                                        Belum Ada Guru
                                        @endif
                                    </td>
                                    <td class="text-center">@if ($mapel->tapel)
                                        {{ $mapel->tapel->tapel }} | Semester {{ $mapel->tapel->semester }}
                                        @else
                                        Belum Ada Tahun Ajaran
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="mapel/{{$mapel->id}}/detail" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if (Auth::user()->role=='Admin' )
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="mapel/{{$mapel->id}}/edit" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-mapel" data-original-title="Hapus" href="#" role="button" mapel-id="{{$mapel->id}}">
                                                <i class="flaticon-interface-5"></i>
                                            </a>
                                            @endif
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
                            Tambah Mata Pelajaran</span>
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
                                @error('nama_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tahun Ajaran</label>
                                <select class="form-control" id="tapel" name="tapel_id" class="form-control @error('tapel_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Tahun AJaran</option>
                                    @foreach($tapel as $t)
                                    <option value="{{$t->id}}">{{$t->tapel}} | Semester {{$t->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Guru Pengampu</label>
                                <select class="form-control" id="guru" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Guru Pengampu</option>
                                    @foreach($guru as $g)
                                    <option value="{{$g->id}}">{{$g->nama}} {{$g->gelar}}</option>
                                    @endforeach
                                </select>
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
    @section('footer')
    <script>
        $('.delete-mapel').click(function() {
            var mapel_id = $(this).attr('mapel-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus Mata Pelajaran ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/mapel/" + mapel_id + "/delete";
                    }
                });
        });
    </script>
    @endsection
    @endsection