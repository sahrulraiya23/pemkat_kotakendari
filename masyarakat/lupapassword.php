<?php
include 'koneksi.php';

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

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="section-title">
            <h2>Reset Password</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 col-lg-6 mx-auto">
                <?php
                if (isset($_GET['pesan'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> <?php echo $_GET['pesan'] ?>
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
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-6 text-center">
                                    <button type="submit" name="verifikasi" class="btn btn-outline-primary">Verifikasi</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['verifikasi'])) {
                            $username = $_POST['username'];
                            $query = "SELECT*FROM masyarakat WHERE username='$username'";
                            $sql = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($sql);
                            if (mysqli_num_rows($sql) >= 1) {
                                header("location:ubahpassword.php?username=$username");
                            } else if (empty($_POST['username']) || $_POST['username'] != $data['username']) {
                                header("location:lupapassword.php?pesan=Username Tidak Ditemukan");
                            }
                        }
                        ?>
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

</html>