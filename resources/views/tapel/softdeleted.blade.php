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
                            <li class="breadcrumb-item"><a href="/tapel">Tahun Ajaran</a></li>
                            <li class="breadcrumb-item active"><a>Tahun Ajaran Terhapus</a></li>
                        </ol>
                    </nav>
                    <!-- <div class="d-flex align-items-center">
                        @if (Auth::user()->role=='Admin' )
                        <a data-toggle="modal" class="btn btn-primary btn-round ml-auto text-white " data-target="#exampleModal" role="button">
                            <i class="fa fa-plus"></i>
                            Tahun Ajaran
                        </a>
                        @endif
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tahun Ajaran</th>
                                        <th class="text-center">Semester</th>
                                        @if (Auth::user()->role == 'Admin')
                                        <th class="text-center" style="width: 10%">Restore</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($tapel as $tapel)
                                    <tr>
                                        <td class="text-center">{{$tapel->tapel}}</td>
                                        <td class="text-center">{{$tapel->semester}}</td>
                                        @if (Auth::user()->role=='Admin' )
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg restore-tapel" data-original-title="Restore" href="#" role="button" tapel-id="{{$tapel->id}}">
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
        $('.restore-tapel').click(function() {
            var tapel_id = $(this).attr('tapel-id');
            swal({
                    title: "Yakin ?",
                    text: "Me-Restore Tahun Ajaran ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/tapel/" + tapel_id + "/restore";
                    }
                });
        });
    </script>
    @endsection
    @endsection