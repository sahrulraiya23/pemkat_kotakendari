<?php
include '../masyarakat/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Pengaduan Masyarakat</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap petugas template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free petugas, free bootstrap template, bootstrap petugas template, petugas theme, petugas dashboard, dashboard template, petugas template, responsive" />
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">


    <link href="datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">


</head>

<body>

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php">
                            <h4 style="color:white;font-size:12px;margin-top:12px;font-family:poppins">Pengaduan Masyarakat</h4>
                        </a>

                    </div>

                    <div class="navbar-container container-fluid">



                        <ul class="nav-right">
                            <li class="header-notification">

                                <?php

                                $sql = "SELECT p.id_pengaduan, m.username
            FROM pengaduan p
            JOIN masyarakat m ON p.nik = m.nik
            WHERE p.notif = 'unseen'";
                                $result = mysqli_query($koneksi, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // Jika ada pengaduan baru
                                    echo '
                                      <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink"></span>
                                </a><ul class="show-notification">';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $username = $row['username'];
                                        echo '
            <li>
                <div class="media">
                    <img class="d-flex align-self-center img-radius">
                    <div class="media-body">
                <a href="ubah_notif.php">Ada Pengaduan dari ' . $username . '</a>
                        <span class="notification-time">Baru saja</span>
                    </div>
                </div>
            </li>';
                                    }
                                    echo '</ul>';
                                } else {
                                    echo '
          <a href="#!">
                                    <i class="ti-bell"></i>
                                
                                </a><ul class="show-notification">
            <li>
                <div class="media">
                    <img class="d-flex align-self-center img-radius">
                    <div class="media-body">
                       <a href="ubah_notif.php">Tidak Ada Pengaduan</a>
                        <span class="notification-time">Baru saja</span>
                    </div>
                </div>
            </li>
        </ul>';
                                }


                                ?>

                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $_SESSION['admin']['nama_petugas'] ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="logout.php" id="logout">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>

                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>

                                </li>
                                <li>
                                    <a href="index.php?halaman=masyarakat">
                                        <span class="pcoded-micon"><i class="ti-user"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Masyarakat</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-comment"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pengaduan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="?halaman=pengaduanmasuk">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pengaduan Masuk</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="?halaman=pengaduanproses">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Pengaduan Proses</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="?halaman=pengaduanselesai">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Pengaduan Selesai</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="?halaman=pengaduanbatal">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Pengaduan Batal</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="?halaman=laporan">
                                            <span class="pcoded-micon"><i class="ti-save"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Generate Laporan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>


                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
                                    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
                                    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>

                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                                    <?php
                                    if (isset($_GET['halaman'])) {
                                        if ($_GET['halaman'] == 'petugas') {
                                            include 'petugas/petugas.php';
                                        } else if ($_GET['halaman'] == 'tambahpetugas') {
                                            include 'petugas/tambahpetugas.php';
                                        } else if ($_GET['halaman'] == 'editpetugas') {
                                            include 'petugas/editpetugas.php';
                                        } else if ($_GET['halaman'] == 'hapuspetugas') {
                                            include 'petugas/hapuspetugas.php';
                                        } else if ($_GET['halaman'] == 'pengaduanmasuk') {
                                            include 'pengaduan/pengaduanmasuk.php';
                                        } else if ($_GET['halaman'] == 'pengaduanproses') {
                                            include 'pengaduan/pengaduanproses.php';
                                        } else if ($_GET['halaman'] == 'pengaduanselesai') {
                                            include 'pengaduan/pengaduanselesai.php';
                                        } else if ($_GET['halaman'] == 'pengaduandetail') {
                                            include 'pengaduan/pengaduandetail.php';
                                        } else if ($_GET['halaman'] == 'pengaduanbatal') {
                                            include 'pengaduan/pengaduanbatal.php';
                                        } else if ($_GET['halaman'] == 'laporan') {
                                            include 'laporan.php';
                                        } else if ($_GET['halaman'] == 'masyarakat') {
                                            include 'masyarakat.php';
                                        }
                                    } else {
                                        include 'dashboard.php';
                                    }

                                    ?>
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script>
        $(document).ready(function() {
            $("#logout").click(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Logout",
                    text: "Anda yakin ingin logout?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, logout",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "logout.php",
                            type: "POST",
                            success: function(response) {
                                window.location.href = "login.php";
                            },
                            error: function(xhr, status, error) {
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

    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vartical-demo.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="datatables/datatables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>






    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
    <script>
        const data = {
            labels: [
                'Batal',
                'Selesai',
                'Proses',
                'Belum di konfirmasi'
            ],
            datasets: [{
                label: 'Status Pengaduan',
                data: [
                    <?php $query = "SELECT*FROM pengaduan where status='batal'";
                    $sql = mysqli_query($koneksi, $query);
                    $data = mysqli_num_rows($sql);
                    echo $data ?>,
                    <?php $query = "SELECT*FROM pengaduan where status='selesai'";
                    $sql = mysqli_query($koneksi, $query);
                    $data = mysqli_num_rows($sql);
                    echo $data ?>,
                    <?php $query = "SELECT*FROM pengaduan where status='proses'";
                    $sql = mysqli_query($koneksi, $query);
                    $data = mysqli_num_rows($sql);
                    echo $data ?>,
                    <?php $query = "SELECT*FROM pengaduan where status='0'";
                    $sql = mysqli_query($koneksi, $query);
                    $data = mysqli_num_rows($sql);
                    echo $data ?>
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(150, 150, 150)'
                ],
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        )
    </script>
</body>

</html>