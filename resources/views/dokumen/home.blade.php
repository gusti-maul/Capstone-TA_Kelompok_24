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
                            <li class="breadcrumb-item active"><a>Pengajuan Legalisir</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Legalisir Dokumen</h4>
                        <a class="btn btn-primary btn-round ml-auto text-white" href="/pengajuan/create" role="button">
                            <i class="fa fa-plus"></i>
                            Ajukan
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Alasan Pengajuan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($pengajuan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration  }}</td>
                                        <td class="text-center">{{ $item->nama_siswa }}</td>
                                        <td class="text-center">{{ $item->kelas }}</td>
                                        <td class="text-center">{{ $item->alasan }}</td>
                                        <td class="text-center">{{ $item->status }}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/pengajuan/{{ $item->id }}" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if ($item->status == 'Menunggu Konfirmasi')
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Edit" href="/pengajuan/{{ $item->id }}/edit" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="/pengajuan/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger btn-lg" data-toggle="tooltip" title="" data-original-title="Hapus" id="delete">
                                                        <i class="flaticon-interface-5"></i>
                                                    </button>
                                                </form>
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
    </div>

    @endsection