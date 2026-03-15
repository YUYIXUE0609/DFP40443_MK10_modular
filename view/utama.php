<?php require "data/produk.php"; ?>

<h1>Selamat Datang</h1>

<div style="display:flex;gap:20px;margin-top:30px;flex-wrap:wrap;">

    <?php foreach ($produk as $p): ?>

        <img src="gambar/<?= $p['gambar'] ?>" width="150">

    <?php endforeach; ?>

</div>

<div style="margin-top:40px;background:white;padding:30px;border-radius:8px">

    <h3>Cara Membuat Tempahan</h3>

    <p>

        Klik menu <b>Tempah</b>, pilih biskut dan kuantiti.
        Masukkan nama dan tekan <b>Teruskan</b>.
        Invois akan dipaparkan untuk dicetak.

    </p>

</div>