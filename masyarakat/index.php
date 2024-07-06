<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['masyarakat'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat</title>
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="../assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body onload="getLocation();">
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">Pengaduan Masyarakat</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="?halaman=tambahpengaduan">laporan</a></li>
                    <li><a class="getstarted scrollto" style="margin-right: 10px;" href="#" id="logout"><i class="bi bi-box-arrow-right mr-3"></i> logout</a></li>
                    <li style="display: flex; align-items: center;">
                        <a href="?halaman=profil">
                            <i class="bi bi-people" style="font-size: 24px;margin-right: 5px;"></i>
                            <?php echo $_SESSION['masyarakat']['nama'] ?>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="javascript:void(0);" id="notificationBell">
                            <i class="bi bi-bell" style="font-size: 24px; position: relative;">
                                <?php
                                $nik = $_SESSION['masyarakat']['nik'];
                                $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik = '$nik' AND notif_status = 'unseen' AND (status='proses' OR status='selesai' OR status='batal')");
                                $notif_found = false;
                                $notif_message = '';
                                while ($data = mysqli_fetch_array($query)) {
                                    if ($data['status'] == 'proses') {
                                        $notif_message = 'Pengaduan Anda sedang diproses.';
                                    } elseif ($data['status'] == 'selesai') {
                                        $notif_message = 'Pengaduan Anda telah ditanggapi.';
                                    } elseif ($data['status'] == 'batal') {
                                        $notif_message = 'Pengaduan Anda telah dibatalkan';
                                    }
                                    echo '<span id="notifBadge" class="badge bg-c-pink" style="display: inline-block; position: absolute; top: -12px; right: -10px; background-color: red; border-radius: 50%; height: 20px; width: 20px;"></span>';
                                    $update_query = "UPDATE pengaduan SET notif_status = 'seen' WHERE nik = '$nik' AND notif_status = 'unseen' AND (status='proses' OR status='selesai' OR status='batal')";
                                    mysqli_query($koneksi, $update_query);
                                    $notif_found = true;
                                    break;
                                }
                                ?>
                            </i>
                        </a>

                        <input type="hidden" id="notifFound" value="<?php echo $notif_found ? '1' : '0'; ?>">
                        <input type="hidden" id="notifMessageText" value="<?php echo $notif_message; ?>">
                        <div id="notifMessage" class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none; position: absolute; top: 50px; right: 10px;">
                            <strong>Hallo!</strong> <span id="notifText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </li>

                    <script>
                        document.getElementById('notificationBell').addEventListener('click', function(event) {
                            event.preventDefault(); // Mencegah aksi default dari elemen anchor
                            var notifFound = document.getElementById('notifFound').value;
                            if (notifFound === '1') {
                                var notifMessage = document.getElementById('notifMessage');
                                var notifBadge = document.getElementById('notifBadge');
                                var notifText = document.getElementById('notifText');
                                var notifMessageText = document.getElementById('notifMessageText').value;

                                if (notifMessage && notifText) {
                                    notifText.innerText = notifMessageText;
                                    notifMessage.style.display = 'block';
                                }
                                if (notifBadge) {
                                    notifBadge.style.display = 'none';
                                }
                            }
                        });
                    </script>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <div class="wrapper" style="margin-top: 100px;">
        <div class="container align-item-center justify-content-center">
            <div class="row">
                <script src="../assets/sweetalert/sweetallert.all.min.js"></script>
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == 'narahubung') {
                        include 'narahubung.php';
                    } else if ($_GET['halaman'] == 'tambahpengaduan') {
                        include 'tambahpengaduan.php';
                    } else if ($_GET['halaman'] == 'editpengaduan') {
                        include 'editpengaduan.php';
                    } else if ($_GET['halaman'] == 'hapuspengaduan') {
                        include 'hapuspengaduan.php';
                    } else if ($_GET['halaman'] == 'detailpengaduan') {
                        include 'detailpengaduan.php';
                    } else if ($_GET['halaman'] == 'history') {
                        include 'history.php';
                    } else if ($_GET['halaman'] == 'profil') {
                        include 'profil.php';
                    } else if ($_GET['halaman'] == 'updateprofile') {
                        include 'updateprofile.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
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
<script src="../assets/js/main.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#masyarakat').DataTable({
            "paging": true, // Aktifkan paging
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan sorting kolom
            "info": true, // Aktifkan informasi jumlah data
            "pageLength": 5
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Menambahkan event click pada tautan logout
        $("#logout").click(function(event) {
            event.preventDefault(); // Mencegah aksi default dari tautan

            // Menampilkan pesan konfirmasi menggunakan SweetAlert2
            Swal.fire({
                title: "Konfirmasi Logout",
                text: "Anda yakin ingin logout?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, logout",
                cancelButtonText: "Batal"
            }).then((result) => {
                // Jika pengguna mengonfirmasi logout
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX ke file PHP yang akan melakukan logout
                    $.ajax({
                        url: "logout.php", // Ganti dengan URL yang benar untuk file logout PHP Anda
                        type: "POST", // Anda bisa menggunakan metode POST atau GET sesuai kebutuhan
                        success: function(response) {
                            // Redirect ke halaman login setelah logout berhasil

                            window.location.href = "login.php"; // Ganti dengan URL halaman login Anda
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan kesalahan jika terjadi kesalahan saat logout
                            console.error(xhr.responseText);
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan saat logout.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<!-- Template Main JS File -->




</html>