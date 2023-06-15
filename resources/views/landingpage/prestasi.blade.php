@php
    $no=1;
    $ar_nama = ['','Nur Ikhsan Maulana, M. Rifki Pratama, & Isya Ramadani', 
                'Fatya Amalia Aldinta', 
                'Aliya Choerunnisa Ramadhani', 
                'Cahya Bagus Saputra', 
                'tim ekstrakurikuler band', 
                'Amoza Syafrillah', 
                'Lensa Smaraja',];

    $kejuaraan = ['','Olimpiade Akuntansi SMA/ SMK Sederajat Universitas Muhammadiyah Purwokerto',
                'Kejuaraan renang antar sekolah se Jawa Tengah',
                'lomba pencak silat seni tunggal putri kategori dewasa piala kapolresta cup',
                'kata perorangan cadet putra dalam Kejurnas BKC Piala Menteri Agama RI',
                'lomba Festival Pelajar Nusantara RRI Purwokerto',
                'lomba Festival Pelajar Nusantara RRI Purwokerto',
                'lomba kreatif dimension 2022 HIMA Digital Public Relations, Telkom University',];

    $peringkat = ['','Juara III',
                '2 perunggu, 1 perak',
                'Juara II',
                'Juara III',
                'Juara III',
                'Best Guitarist',
                'Juara II',];

    $tingkat = ['','Kabupaten','Provinsi','Kabupaten','Kabupaten','Kabupaten','Kabupaten','Kabupaten',];

    $pelaksanaan = ['','2023','2022','2022','2022','2022','2022','2022',];
@endphp

@extends('landingpage.index')
@section('content')
  <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-9 px-4">
                    <img src="{{url('assets/img/prestasi.jpg')}}" alt="" id="imgvisimisi" class="">
                    <span class="p_bold">PRESTASI SISWA SISWI</span>
                    <p class="p_bold">SMA NEGERI 1 SOKARAJA TAHUN PELAJARAN 2022 - 2023</p>
                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-light" bgcolor="#007bff">
                                <td>No</td>
                                <td width="250px">Nama Siswa</td>
                                <td width="200px">Nama Kejuaraan</td>
                                <td width="110px">Peringkat</td>
                                <td>Tingkat</td>
                                <td>Pelaksanaan</td>
                                <td>Ket</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i < 8; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $ar_nama[$i] }}</td>
                                <td>{{ $kejuaraan[$i] }}</td>
                                <td>{{ $peringkat[$i] }}</td>
                                <td>{{ $tingkat[$i] }}</td>
                                <td>{{ $pelaksanaan[$i] }}</td>
                                <td></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
            </div>
    
            <div class="col-md-3">
                <div class="tentangweb"  align="justify">
                    <h3>TENTANG WEB</h3>
                    <hr>
                    Website Sistem Akademik SMA Negeri 1 Sokaraja ini digunakan untuk memudahkan serta memberikan fasilitas bagi siswa dan pihak sekolah
                    dalam memberikan transparansi informasi khususnya dalam hal akademik siswa.
                </div>

                <div class="alamat">
                    <h3 id="alamat">ALAMAT</h3>
                    <hr>
                    <p class="p_bold">Alamat kami:</p>
                    JL. RAYA SOKARAJA TIMUR,
                    SOKARAJA WETAN,
                    Kec. Sokaraja, Kab. Banyumas,
                    Jawa Tengah 53191
                     <br> <br>
                    
                    <p class="p_bold">Jam Kerja</p>
                    Senin—Jum'at: 7:00 - 15:00
                </div>
            </div>
            </div>
    </div>
  </div>
@endsection
