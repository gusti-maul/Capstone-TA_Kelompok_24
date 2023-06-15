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
                            <li class="breadcrumb-item"><a href="/siswa/{{$siswa->id}}/profile">Profil Siswa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
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
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="kelas_id">Kelas</label>
                                                                        <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror text-center" id="kelas_id" class="form-control">
                                                                            <option value="" disabled selected>Pilih Kelas</option>
                                                                            @foreach ($kelas as $kelasItem)
                                                                            @if($kelasItem->tapel)
                                                                            <option value="{{ $kelasItem->id }}" {{ $siswa->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                                                                                {{ $kelasItem->kelas }} {{ $kelasItem->nama_kelas }} | Semester {{ $kelasItem->tapel->semester }}
                                                                            </option>
                                                                            @else
                                                                            <option value="{{ $kelasItem->id }}" {{ $siswa->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                                                                                {{ $kelasItem->kelas }} {{ $kelasItem->nama_kelas }} | Tahun Ajaran Belum di Tambahkan
                                                                            </option>
                                                                            @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="status_siswa">Status Siswa</label>
                                                                        <select name="status_siswa" class="form-control form-control form-select @error('status_siswa') is-invalid @enderror" id="status_siswa" required>
                                                                            <option class="text-center" value="">Pilih Status Siswa</option>
                                                                            <option class="text-center" value="Aktif" {{ $siswa->status_siswa == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                                            <option class="text-center" value="Keluar" {{ $siswa->status_siswa == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                                                                            <option class="text-center" value="Pindah" {{ $siswa->status_siswa == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                                                            <option class="text-center" value="Lulus" {{ $siswa->status_siswa == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                                                        </select>
                                                                    </div>
                                                                </div>



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
                                                                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" value="{{ $siswa->nama_lengkap }}">
                                                                    @error('nama_lengkap')
                                                                    <div class=" invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">NIS</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" value="{{ $siswa->nis }}">
                                                                    @error('nis')
                                                                    <div class=" invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">NISN</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" value="{{ $siswa->nisn }}">
                                                                    @error('nisn')
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
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Telpon</h6>
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
                                                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{ $siswa->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
                                                                    @error('tempat_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-5 text-secondary">
                                                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir', ($siswa->tanggal_lahir ? date('Y-m-d', strtotime($siswa->tanggal_lahir)) : '')) }}" placeholder="Pilih Tanggal Lahir">
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
                                                                    <select class="form-control form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                                        <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                    </select>
                                                                    @error('jenis_kelamin')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Agama</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <select name="agama" class="form-control form-control form-select @error('agama') is-invalid @enderror" id="agama" required>
                                                                        <option value="">Pilih Agama</option>
                                                                        <option value="Islam" {{ $siswa->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                        <option value="Hindu" {{ $siswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                        <option value="Katolik" {{ $siswa->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                        <option value="Buddha" {{ $siswa->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                                        <option value="Kristen" {{ $siswa->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                        <option value="Lainya" {{ $siswa->agama == 'Lainya' ? 'selected' : '' }}>Lainya</option>
                                                                    </select>
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
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0" style="margin-top: 9px;">Alamat Siswa</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $siswa->alamat }}">
                                                                    @error('alamat')
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