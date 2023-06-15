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
                        @if ($siswa && $siswa->first() && $siswa->first()->kelas)
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/kelas">Kelas</a></li>
                            @if ($siswa->first()->kelas->kelas == 'X')
                            <li class="breadcrumb-item"><a href="/kelas/kelasx">Kelas X</a></li>
                            @elseif ($siswa->first()->kelas->kelas == 'XI')
                            <li class="breadcrumb-item"><a href="/kelas/kelasxi">Kelas XI</a></li>
                            @elseif ($siswa->first()->kelas->kelas == 'XII')
                            <li class="breadcrumb-item"><a href="/kelas/kelasxii">Kelas XII</a></li>
                            @endif
                            <li class="breadcrumb-item active">{{$siswa->first()->kelas->kelas}} {{$siswa->first()->kelas->nama_kelas}}</li>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/kelas">Kelas</a></li>
                            <li class="breadcrumb-item active">Belum Ada Kelas</li>
                        </ol>
                        @endif
                    </nav>


                    <div class="d-flex align-items-center">
                        @if (Auth::user()->role=='Admin' )
                        <a class="btn btn-primary btn-round ml-auto" href="/siswa/register" role="button">
                            <i class="fa fa-plus"></i>
                            Tambah Siswa
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Kelas</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if(isset($siswa->first()->kelas))
                                {{$siswa->first()->kelas->kelas}} {{$siswa->first()->kelas->nama_kelas}}
                                @else
                                Belum ada kelas
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Tahun Ajaran</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if (isset($siswa->first()->kelas) && $siswa->first()->kelas->tapel)
                                {{ $siswa->first()->kelas->tapel->tapel }} | Semester {{ $siswa->first()->kelas->tapel->semester }}
                                @else
                                Tidak ada tahun pelajaran
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Wali Kelas</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if(isset($siswa->first()->kelas))
                                @if ($siswa->first()->kelas->guru)
                                {{ $siswa->first()->kelas->guru->nama }}
                                @else
                                Belum Ada Wali Kelas
                                @endif
                                @else
                                Belum ada kelas
                                @endif
                            </div>
                        </div>
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
                                        @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru' || Auth::user()->role=='Kepala Sekolah' )
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($siswa as $siswa)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>
                                            <img src="{{$siswa->getAvatar()}}" height="75" width="75">
                                        </td>
                                        <td>{{$siswa->nama_lengkap}}</td>
                                        <td class="text-center">{{$siswa->jenis_kelamin}}</td>
                                        <td class="text-center">@if ($siswa->kelas)
                                            {{$siswa->kelas->kelas}} {{$siswa->kelas->nama_kelas}}
                                            @else
                                            Belum Ada Kelas
                                            @endif
                                        </td>
                                        @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru' || Auth::user()->role=='Kepala Sekolah' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" class="btn btn-primary btn-sm" href="/siswa/{{$siswa->id}}/nilai">
                                                    Lihat Nilai
                                                </a>
                                            </div>
                                        </td>
                                        @endif
                                        @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru' || Auth::user()->role=='Kepala Sekolah' )
                                        <td>
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
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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