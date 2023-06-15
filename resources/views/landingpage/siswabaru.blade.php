@extends('landingpage.index')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-9 famplet">
                    <img src="{{url('assets/img/formulir/famplet.jpg')}}" alt="" id="imgvisimisi" class="mt-3">
                </div>
    
                <div class="col-md-3">
                    <div class="tentangweb mt-3">
                        <h3>Link Download</h3>
                        <hr>
                        <button type="button" class="btn btn-primary"><a href="{{url('assets/img/formulir/famplet.jpg')}}" class="text-white">Pamflet</a></button>
                        <button type="button" class="btn btn-danger"><a href="{{url('assets/img/formulir/formulir.pdf')}}" class="text-white">Formulir</a></button>
                    </div>

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
@endsection
