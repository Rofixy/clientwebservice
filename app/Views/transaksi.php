<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Daftar Transaksi</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No Invoice</th>
                <th>User</th>
                <th>Pelanggan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $trx): ?>
            <tr>
                <td><?= esc($trx['no_invoice']) ?></td>
                <td><?= esc($trx['nama_user']) ?></td> <!-- Data User terkait -->
                <td><?= esc($trx['nama_pelanggan']) ?></td> <!-- Data Pelanggan terkait -->
                <td><?= esc($trx['tgl_mulai']) ?></td>
                <td><?= esc($trx['tgl_kembali']) ?></td>
                <td><?= esc($trx['status']) ?></td>
                <td><?= esc($trx['keterangan']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
