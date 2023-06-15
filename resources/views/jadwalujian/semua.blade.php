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
                            <li class="breadcrumb-item active"><a>Jadwal Ujian</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        @if (Auth::user()->role=='Admin' )
                        <a class="btn btn-primary btn-round ml-auto" href="/jadwalujian/tambah" role="button">
                            <i class="fa fa-plus"></i>
                            Tambah jadwal
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Hari</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Jam</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Ruang Ujian</th>
                                        <th class="text-center">Mapel</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($jadwalujian as $row)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $row->hari}}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($row->tanggal_ujian)) }}</td>
                                        <td class="text-center">{{ $row->jam}}</td>
                                        <td class="text-center">
                                            @if ($row->kelas)
                                            {{ $row->kelas->kelas }}-{{ $row->kelas->nama_kelas }}
                                            @else
                                            Tidak ada kelas
                                            @endif
                                        </td>
                                        <td class="text-center"> {{ $row->ruangan ?? 'Ruangan belum diatur' }}</td>
                                        <td class="text-center">
                                            @if ($row->mapel)
                                            {{ $row->mapel->kode_mapel }} | {{ $row->mapel->mapel }}
                                            @else
                                            Tidak ada mapel
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/jadwalujian/{{$row->id}}/detail" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role=='Admin' )
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/jadwalujian/{{$row->id}}/edit" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg delete-ju" data-original-title="Hapus" href="#" role="button" ju-id="{{$row->id}}">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                        </div>
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
    $('.delete-ju').click(function() {
        var ju_id = $(this).attr('ju-id');
        swal({
                title: "Yakin ?",
                text: "Menghapus Jadwal Ujian ini ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/jadwalujian/" + ju_id + "/delete";
                }
            });
    });
</script>
@endsection