<?php
include '../masyarakat/koneksi.php';
session_start();
if (!isset($_SESSION['petugas'])) {
    header('location:login.php');
    exit;
}
// cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// query untuk mengubah semua status notif menjadi 'seen'
$sql = "UPDATE pengaduan SET notif='seen' WHERE notif='unseen'";

if ($koneksi->query($sql) === TRUE) {
    // redirect ke halaman pengaduanmasuk.php
    echo "
    <script>
    window.location.href='index.php?halaman=pengaduanmasuk';
    </script>
    ";

    exit();
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
