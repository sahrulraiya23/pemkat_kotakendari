<?php
include 'masyarakat/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengaduan Masyarakat Kota Kendari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Resi
  * Template URL: https://bootstrapmade.com/resi-free-bootstrap-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Pengaduan Masyarakat</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#langkah">Langkah</a></li>
          <li><a class="nav-link scrollto" href="#statistik">Statistik</a></li>
          <li><a class="nav-link scrollto " href="#faq">faq</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="masyarakat/index.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Pengaduan Masyarakat Kota Kendari</h1>
          <div class="mt-5">
            <a href="masyarakat/index.php" class="btn-get-quote">Kirim Pengaduan</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="langkah" class="why-us">
      <div class="container">
        <div class="section-title">
          <h2>Langkah-Langkah Membuat Pengaduan</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" style="height: 100%;">
              <span style="  display: block;
  font-size: 28px;
  font-weight: 700;
  color: #b9b9fa;">01</span>
              <h4>Daftar Akun</h4>
              <p>Buatlah Akun, Dengan Mengisikan NIK, Nama Lengkap, Username, dan Nomor Telpon. Jika Sudah pernah membuat Akun cukup login dan tidak perlu membuat akun yang baru</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" style="height: 100%;">
              <span style=" display: block;
  font-size: 28px;
  font-weight: 700;
  color: #b9b9fa;">02</span>
              <h4>Kirim Pengaduan</h4>
              <p>Kirim keluhan,saran atau kritik dan permasalahan yang ingin dikirim ,lalu tunggu persetuuan dari kami untuk selanjutnya di proses.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" style="height: 100%;">
              <span style=" display: block;
  font-size: 28px;
  font-weight: 700;
  color: #b9b9fa;">03</span>
              <h4>Tanggapan</h4>
              <p>Setelah itu, Tanggapan Akan Dikirimkan Ke Akun Anda.</p>
            </div>
          </div>
        </div>


      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="statistik" class="counts section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Statistik</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <?php
              $query = "SELECT*FROM masyarakat";
              $sql = mysqli_query($koneksi, $query);
              $data = mysqli_num_rows($sql);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Akun Masyarakat</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <?php
              $query = "SELECT*FROM pengaduan";
              $sql = mysqli_query($koneksi, $query);
              $data = mysqli_num_rows($sql);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Data Pengaduan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <?php
              $query = "SELECT*FROM petugas";
              $sql = mysqli_query($koneksi, $query);
              $data = mysqli_num_rows($sql);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Data Petugas</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <?php
              $query = "SELECT*FROM tanggapan";
              $sql = mysqli_query($koneksi, $query);
              $data = mysqli_num_rows($sql);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Data Tanggapan</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Pricing Section ======= -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apakah Setiap Ingin Menambahkan Pengaduan Harus membuat dan register username baru?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Hal tersebut tidak perlu dilakukan. Satu username dapat melakukan pengaduan lebih dari satu. Ketika setelah selesai membuat satu pengaduan, anda dapat membuat pengaduan terkait dengan dugaan pelanggaran dan/atau ketidakpuasan terhadap pelayanan yang diberikan lainnya dengan memilih “tambah pengaduan”. Masing-masing pengaduan akan mendapatkan nomor register yang berbeda.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Saya Sudah Mengirimkan pengaduan namun dikemudian hari saya ingin merubah/menambahkan data terkait apakah saya perlu membuat akun baru? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Data yang sudah dilaporkan sebelumnya dapat dilakukan perubahan apabila data belum di proses dan ditanggapi namun anda bisa menambahkan data lain terkait pengaduan dengan mengunggah data dalam bentuk seperti foto. Untuk melakukan hal tersebut diatas tidak perlu membuat pengaduan baru. Mengunggah data tambahan baru dapat dilakukan dengan login username yang telah diregistrasikan sebelumnya di aplikasi ini lalu masuk ke halaman pengaduan.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Apa Saja unsur pengaduan yang harus dipenuhi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Pengaduan Anda akan mudah ditindaklanjuti apabila memenuhi unsur sebagai berikut: What:Perbuatan berindikasi pelanggaran yang diketahui Where:Dimana perbuatan tersebut dilakukan When:Kapan perbuatan tersebut dilakukan Who:Siapa saja yang terlibat dalam perbuatan tersebut How:agaimana perbuatan tersebut dilakukan (modus, cara, dsb.)
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Apakah bentuk respon yang diberikan kepada pelapor atas pengaduan yang disampaikan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Respon yang diberikan kepada pelapor berupa respon awal (ucapan terima kasih telah melakukan pengaduan) dan status/tindak lanjut pengaduan paling akhir sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Kota Kendari Sulawesi Tenggara</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>kendari@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>0821 1729 1729</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Muhammad Saharullah Raiya</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/resi-free-bootstrap-html-template/ -->
          Designed by <a href="https://bootstrapmade.com/">kelompok 5 kelas C Rpl </a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>