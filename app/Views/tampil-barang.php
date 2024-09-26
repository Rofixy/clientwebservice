<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
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

<h1>Data Barang</h1>

<?php if (!empty($barang)): ?>
    <?php foreach ($barang as $item): ?>
        <tr>
            <td><?= esc($item['id']) ?></td>
            <td><?= esc($item['nama']) ?></td>
            <td><?= esc($item['harga']) ?></td>
            <td><?= esc($item['stok']) ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4">Tidak ada data barang.</td>
    </tr>
<?php endif; ?>

</body>
</html>
