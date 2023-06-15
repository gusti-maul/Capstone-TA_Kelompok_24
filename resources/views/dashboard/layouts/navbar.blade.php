<!-- Navbar Header -->

<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="  
                         @if(auth()->user()->role == 'Siswa' && auth()->user()->siswa)
{{ auth()->user()->siswa->getAvatar() }}
@elseif(auth()->user()->role == 'Guru' && auth()->user()->guru)
{{ auth()->user()->guru->getAvatar() }}
@elseif(auth()->user()->role == 'Kepala Sekolah' && auth()->user()->kepsek)
{{ auth()->user()->kepsek->getAvatar() }}
@else
                                         /images/default.jpg
                                         @endif" alt="Avatar" class="avatar-img rounded-circle">


                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">

                                    <img src="
                                       @if(auth()->user()->role == 'Siswa' && auth()->user()->siswa)
{{ auth()->user()->siswa->getAvatar() }}
@elseif(auth()->user()->role == 'Guru' && auth()->user()->guru)
{{ auth()->user()->guru->getAvatar() }}
@elseif(auth()->user()->role == 'Kepala Sekolah' && auth()->user()->kepsek)
{{ auth()->user()->kepsek->getAvatar() }}
@else
                                         /images/default.jpg
                                         @endif" alt="image profile" class="avatar-img rounded">

                                </div>

                                <div class="u-text">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/guru/profile" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    @elseif (auth()->user()->role == 'Siswa')
                                    <a href="/siswa/profile" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    @elseif (auth()->user()->role == 'Kepala Sekolah')
                                    <a href="/kepalasekolah/profile" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    @endif

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/">Homepage</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#gantipassword">Ganti Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->
</div>
<!-- Modal Ganti Password-->
<div class="modal fade" id="gantipassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Ganti Password
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/changepassword" method="POST" enctype="multipart/form-data" id="form-gantipassword">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="small"></p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="old_password" class="form-label">Password Lama</label>
                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Masukkan password saat ini" required>
                                @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password baru" required>
                                @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Masukkan ulang password baru" required>
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <span class="text-danger" id="angka-error"></span>
                    </div>
                </div>

                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>