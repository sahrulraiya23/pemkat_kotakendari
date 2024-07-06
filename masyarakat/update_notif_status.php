<?php
// update_notif_status.php

// Handle CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Simulasi ambil nik dari pengguna yang sedang login
session_start();
$nik = $_SESSION['masyarakat']['nik']; // Ambil nik pengguna dari sesi
$status = 'seen'; // Status yang ingin di-set (dari 'unseen' menjadi 'seen')

// Koneksi ke database (ganti dengan koneksi Anda)
$koneksi = mysqli_connect("localhost", "username", "password", "database");

if (!$koneksi) {
    $response = [
        'success' => false,
        'message' => 'Koneksi database gagal: ' . mysqli_connect_error()
    ];
    echo json_encode($response);
    exit;
}

// Update notif_status di database
$query_update = mysqli_query($koneksi, "UPDATE pengaduan SET notif_status = '$status' WHERE nik = '$nik' AND notif_status = 'unseen'");

if ($query_update) {
    $response = [
        'success' => true,
        'message' => 'Notifikasi berhasil dilihat.'
    ];
} else {
    $response = [
        'success' => false,
        'message' => 'Gagal memperbarui status notifikasi.'
    ];
}

echo json_encode($response);
