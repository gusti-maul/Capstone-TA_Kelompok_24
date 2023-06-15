@extends('landingpage.index')
@section('content')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Kontak Kami</h2>
      <h3><span>Silahkan hubungi kontak di bawah ini</span></h3>
      <p>Dukung kami dengan memberikan support, saran, dan Kritik yang membangun</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-6">
        <div class="info-box mb-4">
          <i class="bx bx-map"></i>
          <h3>Alamat Kami</h3>
          <p>
            <a href="https://www.google.com/maps/place/G8X5+532,+Dusun+I,+Sokaraja+Wetan,+Kec.+Sokaraja,+Kabupaten+Banyumas,+Jawa+Tengah+53181" target="_blank">
              G8X5+532, Dusun I, Sokaraja Wetan, Kec. Sokaraja, Kabupaten Banyumas, Jawa Tengah 53181
            </a>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box  mb-4">
          <i class="bx bx-envelope"></i>
          <h3>Email</h3>
          <p>
            <a href="mailto:smanskj@yahoo.com">smanskj@yahoo.com</a>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box  mb-4">
          <i class="bx bx-phone-call"></i>
          <h3>Telpon</h3>
          <p>
            <a href="tel:+6281649499908">+6281649499908</a>
          </p>
        </div>
      </div>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-6 ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15824.475092339355!2d109.3076325!3d-7.4521101!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655bc74c216065%3A0x74373fd43a68a700!2sSMA%20Negeri%201%20Sokaraja!5e0!3m2!1sid!2sid!4v1683605404707!5m2!1sid!2sid" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-lg-6">
        <div id="text-info"></div>
        <div class="col form-group mb-3">
          <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama Anda" id="name" required>
        </div>

        <div class="form-group mb-3">
          <select class="form-control" name="perihal" id="perihal" aria-label="Default select example">
            <option selected disabled>Perihal</option>
            <option value="Dukungan/Support">Dukungan & Support</option>
            <option value="Kritik Saran">Kritik Saran</option>
            <option value="Lainya ....">Lainya ....</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <textarea class="form-control" name="description" rows="5" placeholder="Keterangan" id="description"></textarea>
        </div>

        <div class="text-center"><button class="btn btn-primary send">Kirim Pesan</button></div>
        <div id="text-info"></div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <script type="text/javascript">
    $(document).on('click', '.send', function(e) {
      e.preventDefault();

      /* Inputan Formulir */
      var input_name = $("#name").val(),
        input_perihal = $("#perihal").val(),
        input_description = $("#description").val();

      /* Pengaturan Email */
      var email = 'fikirilopambudi@gmail.com',
        subject = 'Pesan dari kolom kritik/saran',
        text = 'Nama: ' + input_name + '\n\n' +
        'Perihal: ' + input_perihal + '\n\n' +
        'Keterangan: ' + input_description + '\n\n';

      /* Eksekusi Data */
      var checkout_email = 'mailto:' + email + '?subject=' + subject + '&body=' + text;

      /* jika berhasil buka Email */
      window.location.href = checkout_email;
    });
  </script>


</section>
<!-- End Contact Section -->
@endsection