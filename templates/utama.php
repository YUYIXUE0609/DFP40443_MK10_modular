<h1 class="tajuk-utama">Selamat Datang ke Biskut Klasik</h1>

<div class="produk-gambar-row">
    <?php foreach ($senarai_biskut as $biskut): ?>
        <img src="gambar/<?= htmlspecialchars($biskut['gambar']) ?>" 
             alt="<?= htmlspecialchars($biskut['nama']) ?>" 
             class="gambar-biskut">
    <?php endforeach; ?>
</div>

<div class="nota-panduan">
    <h3>Cara Mudah Buat Tempahan</h3>
    <p>1. Klik menu Tempah<br>2. Pilih kuantiti<br>3. Isi nama<br>4. Dapatkan resit</p>
</div>