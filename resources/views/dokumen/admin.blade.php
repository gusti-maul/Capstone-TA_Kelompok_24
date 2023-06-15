@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a>Pengajuan Legalisir</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Legalisir Dokumen</h4>
                    </div>
                    <div class="mb-3"></div>
                    <div class="class-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Alasan Pengajuan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengajuan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->nama_siswa }}</td>
                                        <td class="text-center">{{ $item->kelas }}</td>
                                        <td class="text-center">{{ $item->alasan }}</td>
                                        <td class="text-center">{{ $item->status }}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail" href="/pengajuan/{{ $item->id }}/detail" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (Auth::user()->role=='Admin' )
                                                @if ($item->status == 'Menunggu Konfirmasi')
                                                <form action="{{ route('pengajuan.setuju', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-link btn-primary btn-lg" onclick="return confirm('Anda yakin ingin menyetujui pengajuan ini?')" title="Setuju"><i class="fas fa-check"></i></button>
                                                </form>
                                                <form action="{{ route('pengajuan.tolak', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-link btn-primary btn-lg" onclick="return confirm('Anda yakin ingin menolak pengajuan ini?')" title="Tolak"><i class="fas fa-times"></i></button>
                                                </form>
                                                @endif
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