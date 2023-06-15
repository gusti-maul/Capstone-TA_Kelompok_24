<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>TAMPIL CERIA</h4>
          <p>Taqwa, Terampil, Cerdas, Inovatif,dan Berbudaya Lingkungan</p>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Lokasi <span>kami</span></h3>
          <p>
            JL. RAYA SOKARAJA TIMUR, <br>
            SOKARAJA WETAN, <br>
            Kec. Sokaraja, Kab. Banyumas, <br>
            Jawa Tengah 53191<br><br>
            <strong>Phone:</strong> (0281) 6442154<br>
            <strong>Email:</strong> smanskj@yahoo.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Navigasi</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/about')}}">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/portofolio')}}">Portofolio</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/contact')}}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Informasi</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/prestasi')}}">Prestasi</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/siswabaru')}}">Penerimaan Siswa Baru</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Jejaring Sosial Kami</h4>
          <p>Ikuti Sosial Media dan Jadi yang Perama Tahu Tentang Kami</p>
          <div class="social-links mt-3">
            <a href="https://twitter.com/SMAN1Sokaraja" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/sman1sokaraja" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/smarajaofficial/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCaW6ZP1XL6fxF_451VmDG4g" target="_blank" class="Youtube"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container py-4">
    <div class="copyright">
      &copy; Copyright <strong><span>SMAN1SOKARAJA</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
      Created by <a> Tim 24 Capstone Teknik Komputer Universitas Diponegoro</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://kit.fontawesome.com/5b3710b119.js" crossorigin="anonymous"></script>


<!-- sweetallert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<!-- toas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}", 'Success')
  @endif

  @if(Session::has('error'))
  toastr.error("{{ Session::get('error') }}", 'Error')
  @endif
</script>
</body>

</html>