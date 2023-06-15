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
                            <li class="breadcrumb-item"><a href="/kelas/all">Semua Kelas</a></li>
                            <li class="breadcrumb-item active"><a>Kelas Terhapus</a></li>
                        </ol>
                    </nav>
                    <div class="row justify-content-between">
                        <!-- <div class="col-md-4">
                            <form action="{{ route('search_kelas') }}" method="get">
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
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Lokal</th>
                                        <th class="text-center">Wali Kelas</th>
                                        <th class="text-center">Tahun AJaran</th>
                                        @if (Auth::user()->role=='Admin' )
                                        <th class="text-center" style="width: 10%">Restore</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelas as $kelas)
                                    <tr>
                                        <td class="text-center">{{$kelas->kelas}}</td>
                                        <td class="text-center">{{$kelas->nama_kelas}}</td>
                                        <td class="text-center">@if ($kelas->guru)
                                            {{ $kelas->guru->nama }}
                                            @else
                                            Belum Ada Wali Kelas
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($kelas->tapel)
                                            {{ $kelas->tapel->tapel }} | Semester {{ $kelas->tapel->semester }}
                                            @else
                                            Tahun Pelajaran Belum Tersedia
                                            @endif
                                        </td>
                                        @if (Auth::user()->role=='Admin' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-kelas" data-original-title="Restore" href="#" role="button" kelas-id="{{$kelas->id}}">
                                                    <i class="icon-reload"></i>
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
    </div>
    @endsection
    @section('footer')
    <script>
        $('.restore-kelas').click(function() {
            var kelas_id = $(this).attr('kelas-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore kelas ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/kelas/" + kelas_id + "/restore";
                    }
                });
        });
    </script>
    @endsection