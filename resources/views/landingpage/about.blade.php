@extends('landingpage.index')
@section('content')
<div class="container-fluid">
    <br>
    <ul class="breadcrumb" style="margin-left: 20px;">
        <li><a href="#visi_misi">VISI MISI</a></li>
        <li class="slesh">/</li>
        <li><a href="#sejarah">SEJARAH</a></li>
        <li class="slesh">/</li>
        <li><a href="#sarana">SARANA & PRASARANA</a></li>
        <li class="slesh">/</li>
        <li class="active"><a href="#guru">DAFTAR GURU & KARYAWAN </a></li>
        <li class="slesh">/</li>
    </ul>
</div>

<div class="container-fluid" style="text-align: justify; margin-left: 20px;">
    <h3>➣ VISI MISI</h3>
    <div class="row">
        <div class="col-md-9">
            <img src="{{url('assets/img/visimisi.jpg')}}" alt="" id="imgvisimisi">
            <span class="span_red">VISI SEKOLAH :</span>
            <p class="p_bold">mewujudkan seluruh warga sekolah menjadi insan yang “Taqwa, Terampil, Cerdas, Inovatif,dan Berbudaya Lingkungan, yang disingkat TAMPIL CERIA”.</p>

            <div id="visi_misi">
                <span class="span_green">MISI SEKOLAH :</span>
                <ul id="misi">
                    <li>Menyediakan dan menyelenggarakan wahana pembinaan keagamaan, kemasyarakatan, dan Kebhinekaan secara terrencana dan berkesinambungan.</li>
                    <li>Menanamkan rasa cinta tanah air dan akhlak mulia pada semua warga sekolah baik dalam kegiatan belajar mengajar maupun di luar kegiatan belajar mengajar.</li>
                    <li>Menyediakan dan menyelenggarakan wahana pembinaan keterampilan dan teknologi secara terrencana dan berkesinambungan.</li>
                    <li>Meningkatkan keamanan, ketertiban dan kedisiplinan siswa.</li>
                    <li>Mengefektifkan dan mengoptimalkan pelaksanaan kegiatan belajar mengajar, meningkatkan pemberian layanan belajar peserta didik serta melengkapi sumber belajar.</li>
                    <li>Menyediakan dan menyelenggarakan wahana pembinaan olahraga dan seni budaya secara terrencana dan berkesinambungan.</li>
                    <li>Menyediakan dan menyelenggarakan “Pendidikan Berbasis Keunggulan Lokal (PBKL) batik dan kewirausahaan” secara terrencana dan berkesinambungan.</li>
                    <li>Menjalin hubungan yang harmonis dan mengoptimalkan peran serta seluruh warga sekolah.</li>
                    <li>Meningkatkan kualitas Sumber Daya Manusia (SDM) yang peduli dan berbudaya lingkungan.</li>
                    <li>Meningkatkan kualitas lingkungan hidup, mencegah pencemaran, mengatasi kerusakan dan melakukan pelestarian terhadap sumber daya alam serta lingkungan.</li>
                </ul>
            </div>

            <div id="sejarah">
                <h3 style="margin-top: 50px">➣ SEJARAH</h3>
                <img src="{{url('assets/img/sejarah.jpg')}}" alt="" id="imgsejarah">
                <p id="p_sejarah" style="text-align: justify; text-indent: 30px">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sebelum berdiri SMA Negeri 1 Sokaraja, di wilayah Kecamatan Sokaraja telah ada satu SMA, yakni SMA Pemda Sokaraja. SMA tersebut didirikan untuk memenuhi kebutuhan para siswa lulusan SMP di sekitar Sokaraja yang karena alasan tertentu tidak bisa melanjutkan sekolahnya di kota (Purwokerto).
                    Untuk sementara SMA Pemda Sokaraja menempati gedung SMP Negeri 2 Sokaraja yang terletak di desa Sokaraja Wetan, Kecamatan Sokaraja, Kabupaten Banyumas. Kegiatan Belajar Mengajar pada saat itu dilaksanakan pada sore hari.
                    Mengingat jumlah siswa SMA Pemda Sokaraja pada saat itu cukup banyak dan SMA tersebut tidak dapat menampungnya, maka timbul gagasan untuk mendirikan gedung sekolah sendiri, agar nantinya para siswa SMA Pemda Sokaraja bisa masuk sekolah pada pagi hari.
                    Untuk keperluan itulah, kemudian dibentuk Panitia Pendiri SMA Pemda Sokaraja. <br> <br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Langkah pertama yang dilakukan panitia adalah mencari lahan untuk dijadikan lokasi pembangunan gedung SMA Pemda Sokaraja. Masyarakat yang menyadari sepenuhnya bahwa keberadaan sebuah SMA di Sokaraja memang sangat dibutuhkan, maka warga/masyarakat setempat yang lahan/sawahnya mau dijadikan lokasi pembangunan gedung SMA Pemda Sokaraja.
                    Beberapa saat setelah panitia berhasil memiliki lahan untuk lokasi pembangunan gedung SMA Pemda Sokaraja, datanglah kiriman atau paket dana dari pemerintah pusat untuk membangun sebuah unit gedung baru SMA di Sokaraja, melalui Daftar Isian Proyek Menteri Pendidikan dan Kebudayaan RI Nomor : 2224/0/1980, tanggal 11 September 1980.
                    Dengan dana yang sepenuhnya berasal dari pemerintah pusat inilah kemudian di Sokaraja dibangun sebuah SMA di lokasi yang sebagian telah menjadi milik Panitia Pendiri SMA Pemda Sokaraja, yang kemudian diberi nama SMA Negeri Sokaraja. Selanjutnya panitia pendiri SMA Pemda Sokaraja mendirikan gedung sendiri dan kemudian mengubah nama SMA Pemda Sokaraja menjadi SMA Budi Utomo Sokaraja. <br> <br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sebelum gedung SMA Negeri Sokaraja selesai dibangun, turun Inrtruksi Kepala kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Jawa Tengah Nomor : 674/I03/T.81, tanggal 30 April 1981, yang isinnya mengintruksikan kepada Kepala SMA Negeri 1 Purwokerto yang waktu itu dijabat oleh Bapak Drs. Soediro Wirohartono untuk melaksanakan pendaftaran siswa baru untuk SMA Negeri Sokaraja.
                    Atas dasar intruksi tersebut, maka Kepala SMA Negeri 1 Purwokerto segera melaksanakan Pendaftaran Siswa Baru untuk SMA Negeri Sokaraja Tahun Pelajaran 1981/1982. Pada saat itu yang diterima sebagai siswa baru di SMA Negeri Sokaraja baru tiga kelas, dan untuk sementara masuk sore hari, bertempat di SMA Negeri 1 Purwokerto. <br> <br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk sementara Kepala SMA Negeri Sokaraja dirangkap oleh Kepala SMA Negeri 1 Purwokerto. Demikian pula untuk para guru, sebagian merupakan guru-guru SMA Negeri 1 Purwokerto. Beberapa orang guru yang pada waktu itu mengajar siswa angkatan pertama SMA Negeri Sokaraja yang sampai saat ini masih tetap menjadi guru SMA Negeri Sokaraja adalah : Ibu Djiah Budi Arly, S.Pd., dan Ibu Farida, BA.
                    Sedangkan tenaga pelaksana dan pembantu pelaksana yang sampai saat ini masih bertugas di SMA Negeri Sokaraja adalah Ibu Sudimah dan Ibu Kriswanti. Pada awal tahun pelajaran 1981/1982, tepatnya tanggal 14 Juli 1981, Menteri Pendidikan dan Kebudayaan RI mengeluarkan Surat Keputusan Nomor : 0219/O/1981 tentang Pendirian 270 SMP dan SMA Negeri se-Indonesia, terhitung mulai tanggal 1 Juli 1981.
                    satu di antara 270 sekolah yang resmi didirikan oleh pemerintah adalah SMA Negeri Sokaraja. Dengan demikian secara yuridis formal sebenarnya SMA Negeri Sokaraja berdiri pada tanggal 1 Juli 1981. Sebagai Kepala Sekolah definitif yang bertama adalah Bapak Basoeki Dwijomartojo, yang semula merupakan guru SMA Negeri 1 Purwokerto. <br> <br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembangunan gedung SMA Negeri Sokaraja baru selesai dan diresmikan oleh Menteri Pendidikan dan Kebudayaan RI pada saat itu yaitu Bapak Prof. Dr. Daoed Joesoep pada tanggal 18 Maret 1981. Bulan berikutnya, tepatnya pada tanggal 21 April 1982, bersamaan dengan peringatan Hari Kartini, para siswa, guru dan pelaksana serta pembentuk pelaksana SMA Negeri Sokaraja pindah dari SMA Negeri 1 Purwokerto ke SMA Negeri Sokaraja. <br> <br>
                </p>
            </div>

            <div id="sarana">
                <h3 style="margin-top: 50px">➣ SARANA DAN PRASARANA</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{url('assets/img/lab_kimia.jpg')}}" alt="">
                        <span>Laboratorium IPA</span>
                    </div>
                    <div class="col-md-3">
                        <img src="{{url('assets/img/sanggar.jpg')}}" alt="">
                        <span>Sanggar Batik</span>
                    </div>
                    <div class="col-md-3">
                        <img src="{{url('assets/img/perpus.jpg')}}" alt="">
                        <span>Perpustakaan</span>
                    </div>
                    <div class="col-md-3">
                        <img src="{{url('assets/img/lab_bahasa.jpg')}}" alt="">
                        <span>Laboratorium Bahasa</span>
                    </div>
                </div>
            </div>

            <div id="guru">
                <h3 style="margin-top: 50px">➣ DAFTAR GURU & KARYAWAN</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{url('assets/img/kepalasekolah.png')}}" target="_blank">
                                <button class="btn" style="position: absolute; bottom: 10px; right: 10px;">
                                    ➣
                                </button>
                                <img src="{{url('assets/img/kepalasekolah.png')}}" class="img-fluid rounded-start" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Drs. Sudarto, M.Pd</h5>
                                <p class="card-text">
                                    <span class="span_red">Kepala Sekolah</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{url('assets/img/guru.jpg')}}" target="_blank">
                                <button class="btn" style="position: absolute; bottom: 10px; right: 10px;">
                                    ➣
                                </button>
                                <img src="{{url('assets/img/guru.jpg')}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Guru SMAN 1 Sokaraja</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="{{url('assets/img/karyawan.jpg')}}" target="_blank">
                                <button class="btn" style="position: absolute; bottom: 10px; right: 10px;">
                                    ➣
                                </button>
                                <img src="{{url('assets/img/karyawan.jpg')}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Karyawan SMAN 1 Sokaraja</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="col-md-3">
            <div class="tentangweb">
                <h4>Tentang Web</h4>
                <hr>
                Website Sistem Akademik SMA Negeri 1 Sokaraja ini digunakan untuk memudahkan serta memberikan fasilitas bagi siswa dan pihak sekolah
                dalam memberikan transparansi informasi khususnya dalam hal akademik siswa.
            </div>



            <div class="alamat">
                <h4 id="alamat">ALAMAT</h4>
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