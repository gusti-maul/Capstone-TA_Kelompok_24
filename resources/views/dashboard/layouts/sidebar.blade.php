 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <div class="user">
                 <div class="avatar-sm float-left mr-2">

                     <img src="  @if(auth()->user()->role == 'Siswa' && auth()->user()->siswa)
   {{ auth()->user()->siswa->getAvatar() }}
@elseif(auth()->user()->role == 'Guru' && auth()->user()->guru)
   {{ auth()->user()->guru->getAvatar() }}
@elseif(auth()->user()->role == 'Kepala Sekolah' && auth()->user()->kepsek)
   {{ auth()->user()->kepsek->getAvatar() }}
@else
                                         /images/default.jpg
                                         @endif" alt="Avatar" class="avatar-img rounded-circle">

                 </div>
                 <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                         <span>
                             {{auth()->user()->name}}
                             <span class="user-level"> {{auth()->user()->role}}</span>
                             <span class="caret"></span>
                         </span>
                     </a>
                     <div class="clearfix"></div>

                     <div class="collapse in" id="collapseExample">
                         <ul class="nav">
                             @if (Auth::user()->role=='Siswa' )
                             <li>
                                 <a href="/siswa/profile">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="/{{auth()->user()->siswa->id}}/editsiswa">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             @elseif (Auth::user()->role=='Kepala Sekolah' )
                             <li>
                                 <a href="/kepalasekolah/profile">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="/{{auth()->user()->kepsek->id}}/editkepalasekolah">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             @elseif (Auth::user()->role=='Guru' )
                             <li>
                                 <a href="/guru/profile">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="/{{auth()->user()->guru->id}}/editguru">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             @endif
                         </ul>

                     </div>
                 </div>
             </div>

             @if (Auth::user()->role=='Admin' )
             <!-- admin -->
             <ul class="nav nav-primary">
                 <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                     <a class="nav-link" href="/dashboard">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Components</h4>
                 </li>
                 <li class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#jadwal">
                         <i class="fas fa-clipboard-list"></i>
                         <p>Jadwal</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('jadwal*') ? 'show' : '' }}" id="jadwal">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('jadwalpelajaran') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalpelajaran') }}">
                                     <span class="sub-item">Jadwal Pelajaran</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('jadwalujian') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalujian') }}">
                                     <span class="sub-item">Jadwal Ujian</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('tapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#tapel">
                         <i class="fas fa-calendar-alt"></i>
                         <p>Tahun Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('tapel*') ? 'show' : '' }}" id="tapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('tapel') ? 'active' : '' }}">
                                 <a href="{{ url('tapel') }}">
                                     <span class="sub-item">Tahun Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('kelas*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#kelas">
                         <i class="fas fa-pen-square"></i>
                         <p>Kelas</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('kelas*') ? 'show' : '' }}" id="kelas">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('kelas/all') ? 'active' : '' }}">
                                 <a href="{{ url('kelas/all') }}">
                                     <span class=" sub-item">Semua Kelas</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
                                 <a href="{{ url('kelas') }}">
                                     <span class=" sub-item">Kelas</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kelas/daftarkelas') ? 'active' : '' }}">
                                 <a href="{{ url('kelas/daftarkelas') }}">
                                     <span class=" sub-item">Kenaikan Kelas</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('mapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#mapel">
                         <i class="fas fa-table"></i>
                         <p>Mata Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('mapel*') ? 'show' : '' }}" id="mapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('mapel') ? 'active' : '' }}">
                                 <a href="{{ url('mapel') }}">
                                     <span class="sub-item">Daftar Mata Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="nav-item {{ request()->is('user*') || request()->is('siswa') || request()->is('guru') || request()->is('kepalasekolah') || request()->is('admin') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#user">
                         <i class="fas fa-users"></i>
                         <p>User</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('user*') || request()->is('siswa') || request()->is('guru') || request()->is('kepalasekolah') || request()->is('admin') ? 'show' : '' }}" id="user">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('siswa') ? 'active' : '' }}">
                                 <a href="{{ url('siswa') }}">
                                     <span class="sub-item">Siswa</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('guru') ? 'active' : '' }}">
                                 <a href="{{ url('guru') }}">
                                     <span class="sub-item">Guru</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kepalasekolah') ? 'active' : '' }}">
                                 <a href="{{ url('kepalasekolah') }}">
                                     <span class="sub-item">Kepala Sekolah</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                                 <a href="{{ url('admin') }}">
                                     <span class="sub-item">Admin</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                                 <a href="{{ url('user') }}">
                                     <span class="sub-item">User Login</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('doc*') || request()->is('pengajuan') || request()->is('permintaan') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#doc">
                         <i class="fas fa-file"></i>
                         <p>Dokumen</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('doc*') || request()->is('pengajuan') || request()->is('permintaan') ? 'show' : '' }}" id="doc">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('pengajuan') ? 'active' : '' }}">
                                 <a href="{{ url('pengajuan') }}">
                                     <span class="sub-item">Pengajuan Legalisir</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('permintaan') ? 'active' : '' }}">
                                 <a href="{{ url('permintaan') }}">
                                     <span class="sub-item">Permintaan Dokumen</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

             </ul>
             <!-- endadmin -->
             @endif

             @if (Auth::user()->role=='Siswa' )
             <!-- siswa -->
             <ul class="nav nav-primary">
                 <<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                     <a class="nav-link" href="/dashboard">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                     </li>
                     <li class="nav-section">
                         <span class="sidebar-mini-icon">
                             <i class="fa fa-ellipsis-h"></i>
                         </span>
                         <h4 class="text-section">Components</h4>
                     </li>
                     <li class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                         <a data-toggle="collapse" href="#jadwal">
                             <i class="fas fa-clipboard-list"></i>
                             <p>Jadwal</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse {{ request()->is('jadwal*') ? 'show' : '' }}" id="jadwal">
                             <ul class="nav nav-collapse">
                                 <li class="nav-item {{ request()->is('jadwalpelajaran') ? 'active' : '' }}">
                                     <a href="{{ url('jadwalpelajaran') }}">
                                         <span class="sub-item">Jadwal Pelajaran</span>
                                     </a>
                                 </li>
                                 <li class="nav-item {{ request()->is('jadwalujian') ? 'active' : '' }}">
                                     <a href="{{ url('jadwalujian') }}">
                                         <span class="sub-item">Jadwal Ujian</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                     <li class="nav-item {{ request()->is('nilai*') ? 'active' : '' }}">
                         <a data-toggle="collapse" href="#sidebarLayouts">
                             <i class="fas fa-th-list"></i>
                             <p>Transkrip</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse {{ request()->is('nilai*') ? 'show' : '' }}" id="sidebarLayouts">
                             <ul class="nav nav-collapse">
                                 <li class="nav-item {{ request()->is('nilai') ? 'active' : '' }}">
                                     <a href="{{ url('nilai') }}">
                                         <span class="sub-item">Nilai</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>

                     <li class="nav-item {{ request()->is('home*') || request()->is('permintaan*') ? 'active' : '' }}">
                         <a data-toggle="collapse" href="#doc">
                             <i class="fas fa-file"></i>
                             <p>Pengurusan Dokumen</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse {{ request()->is('home*') || request()->is('permintaan*') ? 'show' : '' }}" id="doc">
                             <ul class="nav nav-collapse">
                                 <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                                     <a href="{{ url('home') }}">
                                         <span class="sub-item">Pengajuan Legalisir</span>
                                     </a>
                                 </li>
                                 <li class="nav-item {{ request()->is('permintaan') ? 'active' : '' }}">
                                     <a href="{{ url('permintaan') }}">
                                         <span class="sub-item">Permintaan Dokumen</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>

                     <li class="nav-item {{ request()->is('kelas*') ? 'active' : '' }}">
                         <a data-toggle="collapse" href="#forms">
                             <i class="fas fa-pen-square"></i>
                             <p>Kelas</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse {{ request()->is('kelas*') ? 'show' : '' }}" id="forms">
                             <ul class="nav nav-collapse">
                                 <li class="nav-item {{ request()->is('kelas/all') ? 'active' : '' }}">
                                     <a href="{{ url('kelas/all') }}">
                                         <span class="sub-item">Semua Kelas</span>
                                     </a>
                                 </li>
                                 <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
                                     <a href="{{ url('kelas') }}">
                                         <span class="sub-item">Kelas</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>

             </ul>
             <!-- end siswa -->
             @endif

             @if (Auth::user()->role=='Guru' )
             <!-- guru -->
             <ul class="nav nav-primary">
                 <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                     <a class="nav-link" href="/dashboard">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Components</h4>
                 </li>

                 <li class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#jadwal">
                         <i class="fas fa-clipboard-list"></i>
                         <p>Jadwal</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('jadwal*') ? 'show' : '' }}" id="jadwal">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('jadwalpelajaran') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalpelajaran') }}">
                                     <span class="sub-item">Jadwal Pelajaran</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('jadwalujian') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalujian') }}">
                                     <span class="sub-item">Jadwal Ujian</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('tapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#tapel">
                         <i class="fas fa-calendar-alt"></i>
                         <p>Tahun Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('tapel*') ? 'show' : '' }}" id="tapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('tapel') ? 'active' : '' }}">
                                 <a href="{{ url('tapel') }}">
                                     <span class="sub-item">Tahun Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('kelas*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#kelas">
                         <i class="fas fa-pen-square"></i>
                         <p>Kelas</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('kelas*') ? 'show' : '' }}" id="kelas">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('kelas/all') ? 'active' : '' }}">
                                 <a href="{{ url('kelas/all') }}">
                                     <span class=" sub-item">Semua Kelas</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
                                 <a href="{{ url('kelas') }}">
                                     <span class=" sub-item">Kelas</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('mapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#mapel">
                         <i class="fas fa-table"></i>
                         <p>Mata Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('mapel*') ? 'show' : '' }}" id="mapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('mapel') ? 'active' : '' }}">
                                 <a href="{{ url('mapel') }}">
                                     <span class="sub-item">Daftar Mata Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="nav-item {{ request()->is('siswa*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#user">
                         <i class="fas fa-calendar-alt"></i>
                         <p>User</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('siswa*') ? 'show' : '' }}" id="user">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('siswa') ? 'active' : '' }}">
                                 <a href="{{ url('siswa') }}">
                                     <span class="sub-item">siswa</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

             </ul>
             <!-- enguru -->
             @endif

             @if (Auth::user()->role=='Kepala Sekolah' )
             <!-- kepala sekolah -->
             <ul class="nav nav-primary">
                 <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                     <a class="nav-link" href="/dashboard">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Components</h4>
                 </li>

                 <li class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#jadwal">
                         <i class="fas fa-clipboard-list"></i>
                         <p>Jadwal</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('jadwal*') ? 'show' : '' }}" id="jadwal">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('jadwalpelajaran') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalpelajaran') }}">
                                     <span class="sub-item">Jadwal Pelajaran</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('jadwalujian') ? 'active' : '' }}">
                                 <a href="{{ url('jadwalujian') }}">
                                     <span class="sub-item">Jadwal Ujian</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('tapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#tapel">
                         <i class="fas fa-calendar-alt"></i>
                         <p>Tahun Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('tapel*') ? 'show' : '' }}" id="tapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('tapel') ? 'active' : '' }}">
                                 <a href="{{ url('tapel') }}">
                                     <span class="sub-item">Tahun Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('kelas*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#kelas">
                         <i class="fas fa-pen-square"></i>
                         <p>Kelas</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('kelas*') ? 'show' : '' }}" id="kelas">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('kelas/all') ? 'active' : '' }}">
                                 <a href="{{ url('kelas/all') }}">
                                     <span class=" sub-item">Semua Kelas</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
                                 <a href="{{ url('kelas') }}">
                                     <span class=" sub-item">Kelas</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('mapel*') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#mapel">
                         <i class="fas fa-table"></i>
                         <p>Mata Pelajaran</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('mapel*') ? 'show' : '' }}" id="mapel">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('mapel') ? 'active' : '' }}">
                                 <a href="{{ url('mapel') }}">
                                     <span class="sub-item">Daftar Mata Pelajaran</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('user*') || request()->is('siswa') || request()->is('guru') || request()->is('kepalasekolah') || request()->is('admin') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#user">
                         <i class="fas fa-users"></i>
                         <p>User</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('user*') || request()->is('siswa') || request()->is('guru') || request()->is('kepalasekolah') || request()->is('admin') ? 'show' : '' }}" id="user">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('siswa') ? 'active' : '' }}">
                                 <a href="{{ url('siswa') }}">
                                     <span class="sub-item">Siswa</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('guru') ? 'active' : '' }}">
                                 <a href="{{ url('guru') }}">
                                     <span class="sub-item">Guru</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('kepalasekolah') ? 'active' : '' }}">
                                 <a href="{{ url('kepalasekolah') }}">
                                     <span class="sub-item">Kepala Sekolah</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                                 <a href="{{ url('admin') }}">
                                     <span class="sub-item">Admin</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                                 <a href="{{ url('user') }}">
                                     <span class="sub-item">User Login</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item {{ request()->is('doc*') || request()->is('pengajuan') || request()->is('permintaan') ? 'active' : '' }}">
                     <a data-toggle="collapse" href="#doc">
                         <i class="fas fa-file"></i>
                         <p>Dokumen</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse {{ request()->is('doc*') || request()->is('pengajuan') || request()->is('permintaan') ? 'show' : '' }}" id="doc">
                         <ul class="nav nav-collapse">
                             <li class="nav-item {{ request()->is('pengajuan') ? 'active' : '' }}">
                                 <a href="{{ url('pengajuan') }}">
                                     <span class="sub-item">Pengajuan Legalisir</span>
                                 </a>
                             </li>
                             <li class="nav-item {{ request()->is('permintaan') ? 'active' : '' }}">
                                 <a href="{{ url('permintaan') }}">
                                     <span class="sub-item">Permintaan Dokumen</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

             </ul>

             <!-- end kepala sekolah -->
             @endif
         </div>
     </div>
 </div>