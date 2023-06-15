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
                            <li class="breadcrumb-item"><a href="/mapel">Daftar Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active"><a>Mata Pelajaran Terhapus</a></li>
                        </ol>
                    </nav>
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
                                    @if (Auth::user()->role=='Admin' )
                                    <th class="text-center" style="width: 10%">Restore</th>
                                    @endif
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
                                        @if (Auth::user()->role=='Admin' )
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-mapel" data-original-title="Restore" href="#" role="button" mapel-id="{{$mapel->id}}">
                                                <i class="icon-reload"></i>
                                            </a>
                                        </div>
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
    @section('footer')
    <script>
        $('.restore-mapel').click(function() {
            var mapel_id = $(this).attr('mapel-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore Mata Pelajaran ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/mapel/" + mapel_id + "/restore";
                    }
                });
        });
    </script>
    @endsection
    @endsection