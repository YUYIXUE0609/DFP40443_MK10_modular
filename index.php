<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$halaman = $_GET['page'] ?? 'home';

switch ($halaman) {
    case 'home':
        $tajuk_halaman = "Laman Utama";
        $menu_aktif = "home";
        $kandungan = 'templates/utama.php';
        break;

    case 'tempahan':
        $tajuk_halaman = "Borang Tempahan";
        $menu_aktif = "tempahan";
        $kandungan = 'templates/tempah.php';
        break;

    case 'resit':
        $tajuk_halaman = "Resit Tempahan";
        $menu_aktif = "resit";
        $kandungan = 'templates/invois.php';
        break;

    default:
        $tajuk_halaman = "Halaman Tidak Dijumpai";
        $menu_aktif = "";
        $kandungan = 'templates/notfound.php';
        http_response_code(404);
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navigation.php';
require_once __DIR__ . '/' . $kandungan;
require_once __DIR__ . '/includes/footer.php';
?>