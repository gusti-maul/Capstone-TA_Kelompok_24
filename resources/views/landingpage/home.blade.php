@extends('landingpage.index')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>Selamat Datang di <br><span>SMA Negeri 1 Sokaraja</span></h1>
    <h2>menciptakan lulusan Terbaik dan Berkompeten</h2>
    <div class="d-flex">
      @auth
      <a href="/dashboard" class="btn-get-started scrollto">Dashboard</a>
      @else
      <a href="" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#login-modal">Login</a>
      @endauth
      <a href="https://www.youtube.com/watch?v=vQW_ZK1mEXw&t=1s" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
    </div>
  </div>
</section><!-- End Hero -->

@endsection