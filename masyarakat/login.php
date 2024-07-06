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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/sweetalert/sweetallert.all.min.js" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main id="main">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Log In</h2>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <?php
                    if (isset($_GET['pesan'])) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Login Gagal</strong> <?php echo $_GET['pesan'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-body">
                            <form class="pt-3" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 form-group mt-3 text-center">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 form-group mt-3 text-center">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
                                        <p><a href="lupapassword.php">Lupa Password?</a></p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-outline-primary" name="login" id="loginButton"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-md-6 text-center font-weight-light">Belum Mempunyai Akun? <a href="registrasi.php" class="text-primary">Silahkan daftar</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


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
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM masyarakat WHERE username='$username'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) >= 1) {
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['masyarakat'] = $data;
            // Redirect with SweetAlert
            echo '<script>
                    Swal.fire({
                        title: "Login Berhasil!",
                        text: "Anda akan dialihkan ke halaman utama.",
                        icon: "success",
                        willClose: () => {
                            window.location.href = "index.php";
                        }
                    });
                  </script>';
            exit; // Exit the script after redirecting
        } else {
            // SweetAlert for incorrect password
            echo '<script>
                    Swal.fire({
                        title: "Password Salah!",
                        text: "Silakan coba lagi.",
                        icon: "error",
                        willClose: () => {
                            window.location.href = "login.php";
                        }
                    });
                  </script>';
            exit; // Exit the script after redirecting
        }
    } else {
        // SweetAlert for incorrect username
        echo '<script>
                Swal.fire({
                    title: "Username Salah!",
                    text: "Silakan coba lagi.",
                    icon: "error",
                    willClose: () => {
                        window.location.href = "login.php";
                    }
                });
              </script>';
        exit; // Exit the script after redirecting
    }
}
?>



</html>