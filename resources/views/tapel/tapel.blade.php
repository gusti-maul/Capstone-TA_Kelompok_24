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
                            <li class="breadcrumb-item active"><a>Tahun Ajaran</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center justify-content-end">
                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepala Sekolah')
                        <a href="/tapel/terhapus" class="btn btn-danger btn-round mr-2 text-white">
                            <i class="flaticon-interface-5"></i>
                            Terhapus
                        </a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                        <a data-toggle="modal" class="btn btn-primary btn-round text-white" data-target="#exampleModal" role="button">
                            <i class="fa fa-plus"></i>
                            Tahun Ajaran
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tahun Ajaran</th>
                                        <th class="text-center">Semester</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($tapel as $tapel)
                                    <tr>
                                        <td class="text-center">{{$tapel->tapel}}</td>
                                        <td class="text-center">{{$tapel->semester}}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/tapel/{{$tapel->id}}/detail" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role=='Admin' )
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/tapel/{{$tapel->id}}/edit" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-tapel" data-original-title="Hapus" href="#" role="button" tapel-id="{{$tapel->id}}">
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
                                Tambah Tahun Ajaran</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="small"></p>
                        <form action="/tapel" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Tahun Pelajaran</label>
                                    <input type="text" name="tapel_awal" placeholder="YYYY">
                                    @error('tapel_awal')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <span>/</span>
                                    <input type="text" name="tapel_akhir" placeholder="YYYY">
                                    @error('tapel_akhir')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Semester</label>
                                    <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="semester" value="{{ old('semester') }}" placeholder="Masukan Semester">
                                        <option value="">Pilih Semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                    </select>
                                    @error('semester')
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
    @section('footer')
    <script>
        $('.delete-tapel').click(function() {
            var tapel_id = $(this).attr('tapel-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus Tahun Ajaran ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/tapel/" + tapel_id + "/delete";
                    }
                });
        });
    </script>
    @endsection
    @endsection