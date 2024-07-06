<?php
include 'koneksi.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Masyarakat</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="section-title">
            <h2>Registrasi Masyarakat</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="pt-3" method="post">
                            <div class="row justify-content-center">
                                <div class="col-md-6 form-group text-center">
                                    <input type="text" class="form-control <?php if (isset($_GET['error_nik'])) echo 'is-invalid'; ?>" id="nik" name="nik" placeholder="NIK">
                                    <?php if (isset($_GET['error_nik'])) : ?>
                                        <span class="invalid-feedback" style="margin-left: -90px;">
                                            <?php echo $_GET['error_nik']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 form-group mt-3 text-center">
                                    <input type="text" class="form-control  <?php if (isset($_GET['error_nama'])) echo 'is-invalid'; ?>" id="nama" name="nama" placeholder="Nama">
                                    <?php if (isset($_GET['error_nama'])) : ?>
                                        <span class="invalid-feedback">
                                            <?php echo $_GET['error_nama']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6 form-group mt-3 text-center">
                                    <input type="text" class="form-control  <?php if (isset($_GET['error_un'])) echo 'is-invalid'; ?>" id="username" name="username" placeholder="Nama Pengguna">
                                    <?php if (isset($_GET['error_un'])) : ?>
                                        <span class="invalid-feedback">
                                            <?php echo $_GET['error_un']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 form-group mt-3 text-center">
                                    <input type="password" class="form-control  <?php if (isset($_GET['error_pw'])) echo 'is-invalid'; ?>" id="password" name="password" placeholder="Kata Sandi">
                                    <?php if (isset($_GET['error_pw'])) : ?>
                                        <span class="invalid-feedback">
                                            <?php echo $_GET['error_pw']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 form-group mt-3 text-center">
                                    <input type="text" class="form-control  <?php if (isset($_GET['error_nt'])) echo 'is-invalid'; ?>" id="telp" name="telp" placeholder="No.Telp">
                                    <?php if (isset($_GET['error_nt'])) : ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-6 text-center">
                                    <button type="submit" name="submit" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i> Daftar</button>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-6 text-center font-weight-light">Sudah Punya Akun? <a href="login.php" class="text-primary">Masuk</a></div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


</body>
<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<?php
// Proses validasi saat tombol submit ditekan
if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $telp = $_POST['telp'];
    // Validasi input
    if (empty($_POST['nik'])) {
        header("location:registrasi.php?error_nik=NIK wajib diisi");
    } else if (empty($_POST['nama'])) {
        header("location:registrasi.php?error_nama=Nama wajib diisi");
    } else if (empty($_POST['username'])) {
        header("location:registrasi.php?error_un=Username wajib diisi");
    } else if (empty($_POST['password'])) {
        header("location:registrasi.php?error_pw=password wajib diisi");
    } else if (empty($_POST['telp'])) {
        header("location:registrasi.php?erro_nt=No telp wajib diisi");
    } else {
        $query_check_nik = "SELECT * FROM masyarakat WHERE nik='$nik'";
        $result_check_nik = mysqli_query($koneksi, $query_check_nik);
        if (mysqli_num_rows($result_check_nik) > 0) {
            // NIK already exists, redirect back with error message
            echo '<script>
            Swal.fire({
                title: "Registrasi Gagal!",
                text: "NIK Sudah Digunakan, Gunakan NIK Lain",
                icon: "error",
                willClose: () => {
                    window.location.href = "registrasi.php";
                }
            });
          </script>';
            exit();
        }
        // Jika semua input valid, lakukan penyimpanan ke database
        $query = "INSERT INTO masyarakat(nik,nama,username,password,telp) VALUES ('$nik','$nama','$username','$password','$telp')";
        $sql = mysqli_query($koneksi, $query);
        if ($sql) {
            // Jika penyimpanan berhasil, arahkan ke halaman login
            echo '<script>
                                    Swal.fire({
                                        title: "Registrasi Berhasil!",
                                        text: "Silahkan Login.",
                                        icon: "success",
                                        willClose: () => {
                                            window.location.href = "login.php";
                                        }
                                    });
                                  </script>';
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi); // Tampilkan pesan error jika terjadi kesalahan pada kueri SQL
            exit();
        }
    }
}
?>

</html>