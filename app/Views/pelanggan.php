<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pelanggan</h2>
    
    <!-- Cek apakah ada data pelanggan -->
    <?php if (isset($pelanggan) && !empty($pelanggan)) : ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping data pelanggan -->
                <?php $no = 1; foreach ($pelanggan as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($row['nama']); ?></td>
                    <td><?= esc($row['alamat']); ?></td>
                    <td><?= esc($row['no_hp']); ?></td>
                    <td><?= esc($row['username']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Tidak ada data pelanggan.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
