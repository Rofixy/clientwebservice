<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Daftar Barang</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>image</th>
                <th>kd_barang</th>
                <th>nama</th>
                <th>merek</th>
                <th>kd_user</th>
                <th>harga</th>
                <th>stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td><?= esc($b['id']) ?></td>
                <td><?= esc($b['image']) ?></td>
                <td><?= esc($b['kd_barang']) ?></td>
                <td><?= esc($b['nama']) ?></td>
                <td><?= esc($b['merek']) ?></td>
                <td><?= esc($b['kd_user']) ?></td>
                <td><?= esc($b['harga']) ?></td>
                <td><?= esc($b['stok']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
