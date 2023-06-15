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
                            <li class="breadcrumb-item"><a href="/kepalasekolah/profile">Profil Saya</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="/{{$kepsek->id}}/updatekepalasekolah" method="POST" enctype="multipart/form-data">
                            @csrf

                            <body>
                                <div class="container">
                                    <div class="main-body">
                                        <div class="row gutters-sm">
                                            <div class="w-100">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column align-items-center text-center">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <img id="avatar-preview" src="{{$kepsek->getAvatar()}}" alt="Preview" class="rounded-circle" height="150" width="150">
                                                                <label for="avatar" class="btn btn-primary btn-sm mt-3 position-relative text-white">Ganti Foto</label>
                                                                <input type="file" name="avatar" id="avatar" class="form-control d-none">
                                                            </div>
                                                            <script>
                                                                const avatarInput = document.querySelector('#avatar');
                                                                const avatarPreview = document.querySelector('#avatar-preview');

                                                                avatarInput.addEventListener('change', function() {
                                                                    const file = avatarInput.files[0];
                                                                    const url = URL.createObjectURL(file);
                                                                    avatarPreview.src = url;
                                                                });
                                                            </script>

                                                            <div class="mt-3">
                                                                <h4>{{$kepsek->nama}} {{$kepsek->gelar}}</h4>
                                                                <p class="text-muted font-size-sm">{{$kepsek->alamat}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- kiri -->
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Nama</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $kepsek->nama }}" readonly>
                                                                    @error('nama')
                                                                    <div class=" invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Gelar</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="gelar" class="form-control @error('gelar') is-invalid @enderror" id="gelar" value="{{ $kepsek->gelar }}" readonly>
                                                                    @error('gelar')
                                                                    <div class=" invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">NIP</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ $kepsek->nip }}">
                                                                    @error('nip')
                                                                    <div class=" invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Email</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $kepsek->user->email }}" readonly>
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Alamat</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $kepsek->user->alamat }}">
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- kanan -->
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Telepon</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="number" name="telpon" class="form-control @error('telpon') is-invalid @enderror" id="telpon" value="{{ $kepsek->telpon }}">
                                                                    @error('telpon')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Tempat/Tanggal Lahir</h6>
                                                                </div>
                                                                <div class="col-sm-4 text-secondary">
                                                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{ $kepsek->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" {{ $kepsek->tempat_lahir ? 'readonly' : '' }}>
                                                                    @error('tempat_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-5 text-secondary">
                                                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir', ($kepsek->tanggal_lahir ? date('Y-m-d', strtotime($kepsek->tanggal_lahir)) : '')) }}" placeholder="Pilih Tanggal Lahir" {{ $kepsek->tanggal_lahir ? 'readonly' : '' }}>
                                                                    @error('tanggal_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Jenis Kelamin</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <select class="form-control form-control" disabled>
                                                                        <option value="Laki-Laki" {{ $kepsek->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }} disabled>Laki-Laki</option>
                                                                        <option value="Perempuan" {{ $kepsek->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} disabled>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Agama</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" value="{{ $kepsek->agama }}" readonly>
                                                                    @error('agama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <div class="row">
                                                                    <div class="col-sm-3"></div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection