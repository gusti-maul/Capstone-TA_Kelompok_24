 @extends('landingpage.index')
 @section('content')
      <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Portfolio</h2>
      <h3>Dokumentasi <span>Kami</span></h3>
      <p>Inilah Dokumentasi kegiatan kegiatan Kami</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">Semua</li>
          <li data-filter=".filter-app">Sosial</li>
          <li data-filter=".filter-card">Event</li>
          <li data-filter=".filter-web">Prestasi</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{url('assets/img/portfolio/donor.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Donor Darah Kemanusiaan</h4>
          <p>Hari Darah Sedunia</p>
          <a href="{{url('assets/img/portfolio/donor.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Donor Darah di Aula Soedarso"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="{{url('assets/img/portfolio/polisi.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Sosialisasi</h4>
          <p>Penerimaan Terpadu Polresta Banyumas</p>
          <a href="{{url('assets/img/portfolio/polisi.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Sosialisasi Penerimaan Terpadu Polresta Banyumas"><i class="bx bx-plus"></i></a>
          </div>
      </div>
      
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{url('assets/img/portfolio/hb.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Pemeriksaan Hemoglobin</h4>
          <p>serta Pembagian Tablet Penambah Darah oleh Puskesmas I Sokaraja</p>
          <a href="{{url('assets/img/portfolio/hb.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Pemeriksaan Hemoglobin dan Pembagian Tablet Penambah Darah oleh Puskesmas I Sokaraja "><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="{{url('assets/img/portfolio/prestasi.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Juara 3</h4>
          <p>Olimpiade Akuntansi SMA/ SMK Sederajat</p>
          <a href="{{url('assets/img/portfolio/prestasi.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Olimpiade Akuntansi SMA/ SMK Sederajat Universitas Muhammadiyah Purwokerto Tahun 2023"><i class="bx bx-plus"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="{{url('assets/img/portfolio/prestasi1.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Juara Umum 3</h4>
          <p>Jumbara</p>
          <a href="{{url('assets/img/portfolio/prestasi1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Juara Umum 3 jumbara yang berhasil diraih oleh PMR WIRA SMA Negeri 1 Sokaraja"><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="{{url('assets/img/portfolio/karya.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>gelar karya</h4>
          <p>Projek Penguatan Profil Pelajar Pancasila</p>
          <a href="{{url('assets/img/portfolio/karya.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="gelar karya Projek Penguatan Profil Pelajar Pancasila"><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{url('assets/img/portfolio/pohon.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>PENANAMAN 1000 POHON</h4>
          <p>DAN BAKTI SOSIAL DI DESA KARANG DUREN SOKARAJA</p>
          <a href="{{url('assets/img/portfolio/pohon.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="PENANAMAN 1000 POHON DAN BAKTI SOSIAL DI DESA KARANG DUREN SOKARAJA"><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="{{url('assets/img/portfolio/polisi2.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Police go to school</h4>
          <p>Kapolsek Sokaraja AKP Soetrisno, S.H</p>
          <a href="{{url('assets/img/portfolio/polisi2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="police go to school bersama Kapolsek Sokaraja AKP Soetrisno, S.H"><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="{{url('assets/img/portfolio/film.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>juara 2</h4>
          <p>lomba kreatif dimension 2022</p>
          <a href="{{url('assets/img/portfolio/film.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="juara 2 dalam lomba kreatif dimension 2022 yang diselenggarakan oleh HIMA Digital Public Relations, Telkom University."><i class="bx bx-plus"></i></a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="{{url('assets/img/portfolio/karate.jpg')}}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Juara 3 kata perorangan </h4>
          <p>cadet putra Kejurnas BKC Piala Menteri Agama RI 2022</p>
          <a href="{{url('assets/img/portfolio/karate.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Juara 3 kata perorangan cadet putra dalam Kejurnas BKC Piala Menteri Agama RI 2022"><i class="bx bx-plus"></i></a>
          </div>
      </div>
    </div>

  </div>
</section><!-- End Portfolio Section -->
 @endsection
 
