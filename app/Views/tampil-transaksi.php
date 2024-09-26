<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Data Transaksi</h1>

<?php if (isset($error)): ?>
    <p class="error">Error: <?= esc($error) ?></p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>No. Invoice</th>
                <th>Kode User</th>
                <th>Kode Pelanggan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)): ?>
                <?php foreach ($transaksi as $item): ?>
                    <tr>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['no_invoice']) ?></td>
                        <td><?= esc($item['kd_user']) ?></td>
                        <td><?= esc($item['kd_pelanggan']) ?></td>
                        <td><?= esc($item['tgl_mulai']) ?></td>
                        <td><?= esc($item['tgl_kembali']) ?></td>
                        <td><?= esc($item['status']) ?></td>
                        <td><?= esc($item['keterangan']) ?></td>
                        <td><?= esc($item['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Tidak ada data transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
