<?php

if (!isset($_SESSION['invois_data'])) {

    echo "Tiada invois";

    return;

}

$inv = $_SESSION['invois_data'];

?>

<h1>Invois Tempahan</h1>

<p>Nama: <?= $inv['nama'] ?></p>

<p>No Invois: <?= $inv['no'] ?></p>

<p>Tarikh: <?= $inv['tarikh'] ?></p>

<table border="1" width="100%" cellpadding="10">

    <tr>

        <th>Produk</th>
        <th>Saiz</th>
        <th>Harga</th>
        <th>Kuantiti</th>
        <th>Jumlah</th>

    </tr>

    <?php foreach ($inv['items'] as $i): ?>

        <tr>

            <td><?= $i['nama'] ?></td>

            <td><?= $i['saiz'] ?></td>

            <td>RM <?= $i['harga'] ?></td>

            <td><?= $i['qty'] ?></td>

            <td>RM <?= $i['jumlah'] ?></td>

        </tr>

    <?php endforeach; ?>

    <tr>

        <td colspan="4">Jumlah Besar</td>

        <td>RM <?= $inv['total'] ?></td>

    </tr>

</table>

<br>

<button onclick="window.print()">Cetak</button>