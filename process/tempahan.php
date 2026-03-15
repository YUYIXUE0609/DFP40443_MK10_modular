<?php

require "data/produk.php";

$nama = htmlspecialchars($_POST['nama_pelanggan']);

$tempahan = $_POST['tempahan'] ?? [];

$item = [];
$total = 0;

foreach ($tempahan as $produk_id => $saiz_list) {

    foreach ($produk as $p) {

        if ($p['id'] == $produk_id) {

            foreach ($saiz_list as $saiz => $qty) {

                $qty = (int) $qty;

                if ($qty > 0) {

                    $harga = $p['harga'][$saiz];

                    $jumlah = $qty * $harga;

                    $item[] = [
                        'nama' => $p['nama'],
                        'saiz' => $saiz,
                        'harga' => $harga,
                        'qty' => $qty,
                        'jumlah' => $jumlah
                    ];

                    $total += $jumlah;

                }

            }

        }

    }

}

$_SESSION['invois_data'] = [

    'nama' => $nama,
    'items' => $item,
    'total' => $total,
    'no' => "INV-" . rand(10000, 99999),
    'tarikh' => date("d/m/Y")

];

header("Location:index.php?menu=invois");

exit;