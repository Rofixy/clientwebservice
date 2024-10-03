<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
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

<h1>Data Pelanggan</h1>

<?php if (!empty($pelanggan)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pelanggan as $item): ?>
                <tr>
                    <td><?= esc($item['id']) ?></td>
                    <td><?= esc($item['nama']) ?></td>
                    <td><?= esc($item['alamat']) ?></td>
                    <td><?= esc($item['no_hp']) ?></td>
                    <td><?= esc($item['username']) ?></td>
                    <td><?= esc($item['password']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="error">Tidak ada data pelanggan.</p>
<?php endif; ?>

</body>
</html>
