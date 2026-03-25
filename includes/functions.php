<?php
function formatHargaRM($nilai) {
    return 'RM ' . number_format((float)$nilai, 2, '.', ',');
}

function hasilkanNomborResit() {
    $tarikh = date('Ymd');
    $acak = rand(1000, 9999);
    return "RESIT-{$tarikh}-{$acak}";
}

function dapatProdukByID($id_produk, $senarai) {
    foreach ($senarai as $produk) {
        if ($produk['id'] == $id_produk) return $produk;
    }
    return false;
}

function prosesDataTempahan($data_post, $senarai_produk) {
    $nama_pelanggan = htmlspecialchars(trim($data_post['nama_pelanggan'] ?? 'Pelanggan'));
    $pilihan_tempahan = $data_post['pilihan_tempahan'] ?? [];

    $item_tempahan = [];
    $jumlah_bayaran = 0;

    foreach ($pilihan_tempahan as $id => $saiz_produk) {
        $produk = dapatProdukByID($id, $senarai_produk);
        if (!$produk) continue;

        foreach ($saiz_produk as $saiz => $kuantiti) {
            $kuantiti = (int)$kuantiti;
            if ($kuantiti <= 0 || !isset($produk['harga'][$saiz])) continue;

            $harga = $produk['harga'][$saiz];
            $subjumlah = $kuantiti * $harga;

            $item_tempahan[] = [
                'nama' => $produk['nama'],
                'saiz' => ucwords(str_replace('_', ' ', $saiz)),
                'harga_seunit' => $harga,
                'kuantiti' => $kuantiti,
                'subjumlah' => $subjumlah
            ];
            $jumlah_bayaran += $subjumlah;
        }
    }

    if ($jumlah_bayaran <= 0) return false;

    return [
        'nombor_resit' => hasilkanNomborResit(),
        'nama_pelanggan' => $nama_pelanggan,
        'tarikh_tempahan' => date('d/m/Y H:i'),
        'item' => $item_tempahan,
        'jumlah_bayaran' => $jumlah_bayaran
    ];
}
?>