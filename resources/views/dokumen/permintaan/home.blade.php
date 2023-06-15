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
                            <li class="breadcrumb-item active"><a>Permintaan Dokumen</a></li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Permintaan Dokumen</h4>
                        <a class="btn btn-primary btn-round ml-auto text-white" href=/permintaan/create role="button">
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
                                        <th class="text-center">NISN</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($Permintaan as $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->nisn }}</td>
                                        <td class="text-center">{{ $item->status }}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                @if ($item->status == 'Disetujui')
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="showPDF" href="/permintaan/{{ $item->id }}/download" role="button">
                                                    <i class="fa fa-file"></i>
                                                </a>
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