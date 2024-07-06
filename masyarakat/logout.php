<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Jika ingin menghancurkan sesi, hapus cookie sesi juga
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Kirim respons JSON sebagai tanggapan terhadap permintaan AJAX
echo json_encode(array("status" => "success"));
