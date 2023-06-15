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
                            <li class="breadcrumb-item active" aria-current="page">Transkrip Nilai</li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        <a href="/siswa/{{$siswa->id}}/export-pdf" class="btn btn-danger btn-round float-left" target="_blank"><i class="fa fa-download"></i> Download</a>
                    </div>
                    <div class="col-md-4 mx-auto ">
                        <form action="/transkrip/{{$siswa->id}}" method="get">
                            <div class="input-group mb-3 ">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilaiSiswa as $mapel)
                                <tr>
                                    @if($mapel->tapel)
                                    <td class="text-center">{{$mapel->kode_mapel}} | {{$mapel->tapel->tapel}} {{$mapel->tapel->semester}}</td>
                                    @else
                                    <td class="text-center">{{$mapel->kode_mapel}} | Tidak ada tahun ajaran </td>
                                    @endif
                                    <td class="text-center">{{$mapel->mapel}}</td>
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

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @endsection