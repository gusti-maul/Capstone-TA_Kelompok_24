@extends('dashboard.layouts.main')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
@endsection
@section('container')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        @if ($siswa->kelas)
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/kelas">Kelas</a></li>
                            @if ($siswa->kelas->kelas == 'X')
                            <li class="breadcrumb-item"><a href="/kelas/kelasx">Kelas X</a></li>
                            @elseif ($siswa->kelas->kelas == 'XI')
                            <li class="breadcrumb-item"><a href="/kelas/kelasxi">Kelas XI</a></li>
                            @elseif ($siswa->kelas->kelas == 'XII')
                            <li class="breadcrumb-item"><a href="/kelas/kelasxii">Kelas XII</a></li>
                            @endif
                            <li class="breadcrumb-item active">
                                @if ($siswa->kelas)
                                {{ $siswa->kelas->kelas }} {{ $siswa->kelas->nama_kelas }}
                                @else
                                Tidak ada kelas
                                @endif
                            </li>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/kelas">Kelas</a></li>
                            <li class="breadcrumb-item active">Belum Ada Kelas</li>
                        </ol>
                        @endif
                    </nav>
                    <a href="/export/{{$siswa->id}}/pdf" class="btn btn-danger btn-round float-left" target="_blank"><i class="fa fa-download"></i> Download</a>
                    <div class="d-flex align-items-center">
                        @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru' )
                        <a data-toggle="modal" class="btn btn-primary btn-round mr-2 mb-2 mb-md-0 ml-auto text-white " data-target="#exampleModal" role="button">
                            <i class="fa fa-plus"></i>
                            Nilai Siswa
                        </a>
                        <button type="button" class="btn btn-primary btn-round text-white" data-toggle="modal" data-target="#modal2">Import Nilai</button>
                        @endif


                    </div>

                </div>

                <div class="card-header">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nama</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                {{ $siswa->nama_lengkap }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Kelas</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if ($siswa->kelas)
                                {{ $siswa->kelas->kelas }} {{ $siswa->kelas->nama_kelas }}
                                @else
                                Tidak ada kelas
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Tahun Ajaran</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if ($siswa->kelas && $siswa->kelas->Tapel)
                                {{ $siswa->kelas->tapel->tapel }}
                                @else
                                Tidak ada tahun ajaran
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Semester</h6>
                            </div>
                            <a>:</a>
                            <div class="col-sm-8 text-secondary">
                                @if ($siswa->kelas && $siswa->kelas->tapel)
                                {{ $siswa->kelas->tapel->semester }}
                                @else
                                Tidak ada tahun ajaran
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mx-auto">
                        <form action="/search_tapel/{{$siswa->id}}" method="get">
                            <div class="input-group mb-3">
                                <select class="form-control filter" id="tahun_ajaran" name="tahun_ajaran">
                                    <option value="">Semua Tahun Ajaran</option>
                                    @foreach ($tapel as $tahun)
                                    <option value="{{$tahun->id}}" @if($tahun->id == request('tahun_ajaran')) selected @endif>{{$tahun->tapel}} | Semester {{$tahun->semester}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class=" card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode Mata Pelajaran</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    <th>Nilai Pengetahuan</th>
                                    <th>Grade Pengetahuan</th>
                                    <th>Nilai Keterampilan</th>
                                    <th>Grade Keterampilan</th>
                                    @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru')
                                    <th class="text-center" style="width: 10%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiSiswa as $mapel)

                                <tr>
                                    @if($mapel->tapel)
                                    <td>{{$mapel->kode_mapel}} | {{$mapel->tapel->tapel}} {{$mapel->tapel->semester}} </td>
                                    @else
                                    <td>{{$mapel->kode_mapel}} | Tidak ada tahun ajaran </td>
                                    @endif
                                    <td>{{$mapel->mapel}}</td>
                                    <td class="text-center"><a href="#" class="nilai_pengetahuan" data-type="number" data-min="0" data-max="100" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilaipengetahuan" data-title="Masukan Nilai Pengetahuan">{{$mapel->pivot->nilai_pengetahuan}}</a></td>
                                    <td class="text-center">
                                        @if ($mapel->pivot->nilai_pengetahuan >= 80)
                                        A
                                        @elseif ($mapel->pivot->nilai_pengetahuan >= 70)
                                        B
                                        @elseif ($mapel->pivot->nilai_pengetahuan >= 60)
                                        C
                                        @elseif ($mapel->pivot->nilai_pengetahuan >= 50)
                                        D
                                        @else
                                        E
                                        @endif
                                    </td>
                                    <td class="text-center"><a href="#" class="nilai_keterampilan" data-type="number" data-min="0" data-max="100" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilaiketerampilan" data-title="Masukan Nilai Keterampilan">{{$mapel->pivot->nilai_keterampilan}}</a></td>
                                    <td class="text-center">
                                        @if ($mapel->pivot->nilai_keterampilan >= 80)
                                        A
                                        @elseif ($mapel->pivot->nilai_keterampilan >= 70)
                                        B
                                        @elseif ($mapel->pivot->nilai_keterampilan >= 60)
                                        C
                                        @elseif ($mapel->pivot->nilai_keterampilan >= 50)
                                        D
                                        @else
                                        E
                                        @endif
                                    </td>
                                    @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru')
                                    <td>


                                        <div class="form-button-action float-right">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-nilai" data-original-title="Hapus" href="#" role="button" siswa-id="{{$siswa->id}}" mapel-id="{{$mapel->id}}">
                                                <i class="flaticon-interface-5"></i>
                                            </a>
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

    <!-- modal import -->
    <!-- Modal 2 -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            Import Nilai</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small"></p>
                    <form action='/nilai/import' method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Auth::user()->role=='Admin' )
                                <div class="form-group form-group-default">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control" id="mapel" name="mapel" class="form-control @error('tapel_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                        @foreach($matapelajaran as $mp)
                                        <option value="{{$mp->id}}">{{$mp->mapel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @elseif (Auth::user()->role=='Guru' )
                                <div class="form-group form-group-default">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control" id="mapel" name="mapel" class="form-control @error('tapel_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                        @foreach($matapelajaran as $mp)
                                        @if($mp->guru_id == Auth::user()->guru->id)
                                        <option value="{{$mp->id}}">
                                            @if($mp && $mp->tapel)
                                            {{$mp->mapel}} |{{$mp->tapel->tapel}} Semseter {{$mp->tapel->semester}}
                                            @else
                                            {{$mp->mapel}}
                                            @endif
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas" class="form-control @error('kelas_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach($kelas as $kelas)
                                        <option value="{{$kelas->id}}">
                                            {{$kelas->kelas}} {{$kelas->nama_kelas}} | {{$kelas->tapel->tapel}} Semester {{$kelas->tapel->semester}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
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
                    <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Auth::user()->role=='Admin' )
                                <div class="form-group form-group-default">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control" id="mapel" name="mapel" class="form-control @error('tapel_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                        @foreach($matapelajaran as $mp)
                                        <option value="{{$mp->id}}">{{$mp->mapel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @elseif (Auth::user()->role=='Guru' )
                                <div class="form-group form-group-default">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control" id="mapel" name="mapel" class="form-control @error('tapel_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                        @foreach($matapelajaran as $mp)
                                        @if($mp->guru_id == Auth::user()->guru->id) <!-- Menambahkan kondisi hanya jika guru_id sama dengan $guruId -->
                                        <option value="{{$mp->id}}">{{$mp->mapel}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nilai Pengetahuan</label>
                                    <input type="number" min="0" max="100" name="nilai_pengetahuan" class="form-control @error('nilai_pengetahuan') is-invalid @enderror" id="nilai_pengetahuan" value="{{ old('nilai_pengetahuan') }}" placeholder="Masukan Nilai Pengetahuan Siswa" required>
                                    @error('nilai_pengetahuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nilai Keterampilan</label>
                                    <input type="number" min="0" max="100" name="nilai_keterampilan" class="form-control @error('nilai_keterampilan') is-invalid @enderror" id="nilai_keterampilan" value="{{ old('nilai_keterampilan') }}" placeholder="Masukan Nilai Keterampilan Siswa" required>
                                    @error('nilai_keterampilan')
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
    @endsection
    @section('footer')
    @if (Auth::user()->role=='Admin' || Auth::user()->role=='Guru')
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nilai_pengetahuan').editable({
                mode: 'inline',
            });
            $('.nilai_keterampilan').editable({
                mode: 'inline',
            });
        });
    </script>
    @endif
    <script>
        $('.delete-nilai').click(function() {
            var siswa_id = $(this).attr('siswa-id');
            var mapel_id = $(this).attr('mapel-id');
            swal({
                    title: "Yakin ?",
                    text: "Menghapus nilai siswa ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/siswa/" + siswa_id + "/" + mapel_id + "/deletenilai";
                    }
                });
        });
    </script>
    @endsection