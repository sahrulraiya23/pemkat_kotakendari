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

                <div class="card">
                    <div class="card-body">
                        <form class="pt-3" method="post">
                            <div class="row justify-content-center">
                                <div class="col-md-8 form-group mt-3 text-center">
                                    <input type="password" class="form-control <?php if (isset($_GET['errorpw'])) echo 'is-invalid'; ?>" id="password" name="password_baru" placeholder="Masukkan Password anda yang baru">
                                    <?php if (isset($_GET['errorpw'])) : ?>
                                        <span class="invalid-feedback">
                                            <?php echo $_GET['errorpw']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 form-group mt-3 text-center">
                                    <input type="password" class="form-control <?php if (isset($_GET['errorpw'])) echo 'is-invalid'; ?>" id="password" name="conf_password" placeholder="Masukkan kembali password anda yang baru">
                                </div>
                                <?php if (isset($_GET['errorpw'])) : ?>
                                    <span class="invalid-feedback">
                                        <?php echo $_GET['errorpw']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-6 text-center">
                                    <button type="submit" name="ubah" class="btn btn-outline-primary">Ubah Password</button>
                                </div>
                            </div>

                        </form>
                        <?php
                        if (isset($_POST['ubah'])) {
                            $username = $_GET['username'];
                            $pwbaru = $_POST['password_baru'];
                            $cpwbaru = $_POST['conf_password'];
                            if ($_POST['password_baru'] && $_POST['conf_password'] != '') {
                                if ($_POST['password_baru'] != $_POST['conf_password']) {
                                    header("location:ubahpassword.php?username=$username&errorpw=Password Harus Sama");
                                } else {
                                    $cpwbaru = password_hash($_POST['conf_password'], PASSWORD_BCRYPT);
                                    $query = "UPDATE masyarakat SET password='$cpwbaru' WHERE username='$username'";
                                    $sql = mysqli_query($koneksi, $query);
                                    header("location:login.php");
                                }
                            } else if (empty($_POST['password_baru']) || empty($_POST['conf_password'])) {
                                header("location:ubahpassword.php?username=$username&errorpw=Kolom Ini Wajib Diisi");
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