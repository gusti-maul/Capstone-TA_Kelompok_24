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
                            <li class="breadcrumb-item"><a href="/siswa/profile">Profil Saya</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="/{{$siswa->id}}/updatesiswa" method="POST" enctype="multipart/form-data">
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
                                                                <img id="avatar-preview" src="{{$siswa->getAvatar()}}" alt="Preview" class="rounded-circle" height="150" width="150">
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
                                                                <h4>{{$siswa->nama_lengkap}}</h4>
                                                                <p class="text-center">Status : {{$siswa->status_siswa}}</p>
                                                                <p class="text-secondary mb-1">
                                                                    @if (auth()->user()->siswa->kelas)
                                                                    {{auth()->user()->siswa->kelas->kelas}} {{auth()->user()->siswa->kelas->nama_kelas}}
                                                                    @else
                                                                    Belum Ada Kelas
                                                                    @endif
                                                                </p>
                                                                <p class="text-muted font-size-sm">{{$siswa->alamat}}</p>
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
                                                                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" value="{{ $siswa->nama_lengkap }}" readonly>
                                                                    @error('nama_lengkap')
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
                                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $siswa->user->email }}" readonly>
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Telepon</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="number" name="telpon" class="form-control @error('telpon') is-invalid @enderror" id="telpon" value="{{ $siswa->telpon }}">
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
                                                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{ $siswa->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" {{ $siswa->tempat_lahir ? 'readonly' : '' }}>
                                                                    @error('tempat_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-5 text-secondary">
                                                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir', ($siswa->tanggal_lahir ? date('Y-m-d', strtotime($siswa->tanggal_lahir)) : '')) }}" placeholder="Pilih Tanggal Lahir" {{ $siswa->tanggal_lahir ? 'readonly' : '' }}>
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
                                                                        <option value="Laki-Laki" {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }} disabled>Laki-Laki</option>
                                                                        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} disabled>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Agama</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" value="{{ $siswa->agama }}" readonly>
                                                                    @error('agama')
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
                                                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $siswa->alamat }}">
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
                                                <!-- kanan -->
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Nama Ayah</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" value="{{ $siswa->nama_ayah }}">
                                                                    @error('nama_ayah')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Pekerjaan Ayah</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah }}">
                                                                    @error('pekerjaan_ayah')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Nama Ibu</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" value="{{ $siswa->nama_ibu }}">
                                                                    @error('nama_ibu')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Pekerjaan Ibu</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" value="{{$siswa->pekerjaan_ibu }}">
                                                                    @error('pekerjaan_ibu')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Nama Wali</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali" value="{{ $siswa->nama_wali }}">
                                                                    @error('nama_wali')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Pekerjaan Wali</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="pekerjaan_wali" class="form-control @error('pekerjaan_wali') is-invalid @enderror" id="pekerjaan_wali" value="{{ $siswa->pekerjaan_wali }}">
                                                                    @error('pekerjaan_wali')
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
                                                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
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