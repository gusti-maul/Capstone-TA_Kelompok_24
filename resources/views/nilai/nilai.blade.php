@extends('dashboard.layouts.admin.main')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
@endsection
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

                <div class="card-header">
                    <form class="form-inline">
                        <div class="form-group mr-3">
                            <label for="nama" class="mr-2">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama_lengkap }}" readonly>
                        </div>
                        <div class="form-group mr-3">
                            <label for="kelas" class="mr-2">Kelas:</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="" readonly>
                        </div>
                    </form>
                </div>
                <div class="card-body">
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
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa->mapel as $mapel)

                                <tr>
                                    <td>{{$mapel->kode_mapel}}</td>
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
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg " data-original-title="Hapus" href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" role="button" id="delete">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="form-group form-group-default">
                                    <label>Mata Pelajaran</label>
                                    <select class="form-control" id="mapel" name="mapel">
                                        @foreach($matapelelajaran as $mp)
                                        <option value="{{$mp->id}}">{{$mp->mapel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nilai Pengetahuan</label>
                                    <input type="text" name="nilai_pengetahuan" class="form-control @error('nilai_pengetahuan') is-invalid @enderror" id="nilai_pengetahuan" value="{{ old('nilai_pengetahuan') }}" placeholder="Masukan Nilai Pengetahuan Siswa" required>
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
                                    <input type="text" name="nilai_keterampilan" class="form-control @error('nilai_keterampilan') is-invalid @enderror" id="nilai_keterampilan" value="{{ old('nilai_keterampilan') }}" placeholder="Masukan Nilai Keterampilan Siswa" required>
                                    @error('nilai_keterampilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection
    @section('footer')
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
    @endsection