<?php
if (!isset($_SESSION['data_resit'])) {
    echo "<script>alert('Sila buat tempahan dahulu'); window.location='index.php?page=tempahan';</script>";
    exit;
}
$resit = $_SESSION['data_resit'];
?>

<h1 class="tajuk-utama">Resit Tempahan</h1>

<div class="kotak-resit">
    <div class="maklumat-resit">
        <div><strong>Pelanggan:</strong><br><?= $resit['nama_pelanggan'] ?></div>
        <div style="text-align:right"><strong>Resit:</strong> <?= $resit['nombor_resit'] ?><br><strong>Tarikh:</strong> <?= $resit['tarikh_tempahan'] ?></div>
    </div>

    <table class="jadual-resit">
        <thead>
            <tr><th>Produk</th><th>Saiz</th><th>Harga</th><th>Kuantiti</th><th>Subjumlah</th></tr>
        </thead>
        <tbody>
            <?php foreach ($resit['item'] as $item): ?>
                <tr>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['saiz'] ?></td>
                    <td class="kanan"><?= formatHargaRM($item['harga_seunit']) ?></td>
                    <td class="tengah"><?= $item['kuantiti'] ?></td>
                    <td class="kanan"><?= formatHargaRM($item['subjumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="jumlah-keseluruhan-teks">Jumlah Bayaran</td>
                <td class="jumlah-keseluruhan-nilai"><?= formatHargaRM($resit['jumlah_bayaran']) ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="nota-resit"><p>Sila simpan/cetak resit ini</p></div>
    <div class="btn-cetak-group"><button onclick="window.print()" class="btn-cetak">Cetak</button></div>
</div>