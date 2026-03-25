<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data_resit = prosesDataTempahan($_POST, $senarai_biskut);
    
    if (!$data_resit) {
        echo "<script>alert('Sila pilih sekurang-kurangnya satu biskut'); window.location='index.php?page=tempahan';</script>";
        exit;
    }

    $_SESSION['data_resit'] = $data_resit;
    header("Location: index.php?page=resit");
    exit;
}
?>

<h1 class="tajuk-utama">Borang Tempahan</h1>

<form method="POST" action="" id="borangTempahan">
    <div class="grid-produk">
        <?php foreach ($senarai_biskut as $biskut): ?>
            <div class="kotak-produk">
                <img src="gambar/<?= htmlspecialchars($biskut['gambar']) ?>" class="gambar-produk">
                <h3 class="nama-produk"><?= $biskut['nama'] ?></h3>

                <?php foreach ($biskut['harga'] as $saiz => $harga): ?>
                    <div class="pilihan-saiz">
                        <label><?= ucwords(str_replace('_', ' ', $saiz)) ?> <span class="harga-produk"><?= formatHargaRM($harga) ?></span></label>
                        <input type="number" name="pilihan_tempahan[<?= $biskut['id'] ?>][<?= $saiz ?>]" value="0" min="0" data-harga="<?= $harga ?>" class="input-kuantiti">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="bahagian-bayaran">
        <div class="jumlah-tunjuk">
            <span>Jumlah Keseluruhan:</span>
            <span id="jumlahHarga">RM 0.00</span>
        </div>

        <div class="input-group">
            <label>Nama Penuh:</label>
            <input type="text" name="nama_pelanggan" required placeholder="Masukkan nama penuh">
        </div>

        <button type="submit" class="btn-hantar">Hantar Tempahan</button>
    </div>
</form>

<script src="js/kalkulator_tempahan.js"></script>