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
                            <li class="breadcrumb-item active"><a>Siswa</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-end">
                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepala Sekolah')
                        <a href="/siswa/terhapus" class="btn btn-danger btn-round mr-2 mb-2 mb-md-0 text-white">
                            <i class="flaticon-interface-5"></i>
                            Terhapus
                        </a>
                        <a href="/siswa/daftarkelas" class="btn btn-warning btn-round mr-2 mb-2 mb-md-0 text-white">
                            Status Siswa
                        </a>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                        <a class="btn btn-primary btn-round mr-2 mb-2 mb-md-0 text-white" href="/siswa/register" role="button">
                            <i class="fa fa-plus"></i>
                            Tambah Siswa
                        </a>
                        <button type="button" class="btn btn-primary btn-round text-white" data-toggle="modal" data-target="#modal2">
                            <i class="fa fa-plus"></i>
                            Import Siswa
                        </button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No .</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($siswa as $siswa)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">
                                            <img src="{{$siswa->getAvatar()}}" height="75" width="75">
                                        </td>
                                        <td class="text-center">{{$siswa->nama_lengkap}}</td>
                                        <td class="text-center">{{$siswa->jenis_kelamin}}</td>

                                        <td class="text-center">@if ($siswa->kelas)
                                            {{$siswa->kelas->kelas}} {{$siswa->kelas->nama_kelas}}
                                            @else
                                            Belum Ada Kelas
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                @if ($siswa->kelas)
                                                <a type="button" class="btn btn-primary btn-sm" href="/siswa/{{$siswa->id}}/nilai">
                                                    Lihat Nilai
                                                </a>
                                                @else
                                                <a>Belum ada kelas</a>
                                                @endif

                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/siswa/{{$siswa->id}}/profile" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role=='Admin' )
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/siswa/{{$siswa->id}}/edit" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-siswa" data-original-title="Hapus" href="#" role="button" siswa-id="{{$siswa->id}}">
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
        </div> <!-- Modal 2 -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Import Siswa</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="small"></p>
                        <form action='/siswa/import' method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-12">
                                    @if (Auth::user()->role=='Admin' )
                                    <div class="form-group form-group-default">
                                        <label>Mata Pelajaran</label>
                                        <select class="form-control" id="kelas" name="kelas" class="form-control @error('kelas_id') is-invalid @enderror" required>
                                            <option value="" disabled selected>Pilih Kelas</option>
                                            @foreach($kelas as $kelas )
                                            @if ($kelas->tapel)
                                            <option value="{{$kelas->id}}">{{$kelas->kelas}} {{$kelas->nama_kelas}} | {{$kelas->tapel->tapel}} Semester {{$kelas->tapel->semester}} </option>
                                            @else
                                            <option value="{{$kelas->id}}">{{$kelas->kelas}} {{$kelas->nama_kelas}} | Tahun Ajaran Belum di Tambahkan </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Upload Nilai Siswa</label>
                                        <input type="file" name="excel_file" required>
                                        @error('excel_file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <span class="text-danger" id="angka-error"></span>
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('footer')
    <script>
        $('.delete-siswa').click(function() {
            var siswa_id = $(this).attr('siswa-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus siswa ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/siswa/" + siswa_id + "/delete";
                    }
                });
        });
    </script>
    @endsection
    @endsection