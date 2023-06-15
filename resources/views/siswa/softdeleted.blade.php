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
                            <li class="breadcrumb-item"><a href="/siswa">Siswa</a></li>
                            <li class="breadcrumb-item active"><a>Siswa Terhapus</a></li>
                        </ol>
                    </nav>
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
                                        @if (Auth::user()->role=='Admin' )
                                        <th class="text-center" style="width: 10%">Restore</th>
                                        @endif
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
                                        <!-- <td class="text-center">
                                            <div class="form-button-action">
                                                @if ($siswa->kelas)
                                                <a type="button" class="btn btn-primary btn-sm" href="/siswa/{{$siswa->id}}/nilai">
                                                    Lihat Nilai
                                                </a>
                                                @else
                                                <a>Belum ada kelas</a>
                                                @endif
                                            </div>
                                        </td> -->
                                        @if (Auth::user()->role=='Admin' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-siswa" data-original-title="Restore" href="#" role="button" siswa-id="{{$siswa->id}}">
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
    @section('footer')
    <script>
        $('.restore-siswa').click(function() {
            var siswa_id = $(this).attr('siswa-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore siswa ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/siswa/" + siswa_id + "/restore";
                    }
                });
        });
    </script>
    @endsection
    @endsection