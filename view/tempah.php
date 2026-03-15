<?php require "data/produk.php"; ?>

<h1>Borang Tempahan</h1>

<form method="POST">

    <?php foreach ($produk as $p): ?>

        <div style="background:white;padding:20px;margin-top:20px">

            <h3><?= $p['nama'] ?></h3>

            <img src="gambar/<?= $p['gambar'] ?>" width="150">

            <?php foreach ($p['harga'] as $saiz => $harga): ?>

                <div>

                    <?= ucfirst(str_replace('_', ' ', $saiz)) ?>

                    (RM <?= $harga ?>)

                    <input type="number" name="tempahan[<?= $p['id'] ?>][<?= $saiz ?>]" value="0" min="0">

                </div>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

    <br>

    <input type="text" name="nama_pelanggan" placeholder="Nama penuh" required>

    <br><br>

    <button type="submit">Teruskan</button>

</form>