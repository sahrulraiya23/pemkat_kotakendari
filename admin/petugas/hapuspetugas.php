<?php
$id = $_GET['id_petugas'];

// Nonaktifkan pemeriksaan foreign key
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS = 0");

// Hapus data dari tabel petugas
$query = "DELETE FROM petugas WHERE id_petugas='$id'";
$sql = mysqli_query($koneksi, $query);

// Aktifkan kembali pemeriksaan foreign key
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS = 1");

if ($sql) {
    echo '<script>
    Swal.fire({
        title: "Data Petugas Berhasil Dihapus",
        text: "Terimakasih",
        icon: "success",
        willClose: () => {
            window.location.href = "?halaman=petugas";
        }
    });
  </script>';
}
