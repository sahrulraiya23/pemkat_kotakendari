<?php
$id = $_GET['id_pengaduan'];

$queryhapus = "SELECT * FROM pengaduan WHERE id_pengaduan='$id'";
$sql = mysqli_query($koneksi, $queryhapus);
$data = mysqli_fetch_array($sql);
unlink("../bukti/" . $data['bukti']);

$query = "DELETE FROM pengaduan WHERE id_pengaduan='$id'";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
    echo '<script>
    Swal.fire({
        title: "Pengaduan Berhasil Dihapus",
        text: "Terimakasih.",
        icon: "success",
        willClose: () => {
            window.location.href = "index.php";
        }
    });
  </script>';
}
