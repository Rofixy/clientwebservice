<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Barang</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Kode Barang</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kode User</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($barangs) && is_array($barangs)): ?>
                    <?php foreach($barangs as $barang): ?>
                        <tr>
                            <td><?= esc($barang['id']); ?></td>
                            <td><img src="<?= base_url('uploads/' . esc($barang['image'])); ?>" alt="<?= esc($barang['nama']); ?>" width="100"></td>
                            <td><?= esc($barang['kd_barang']); ?></td>
                            <td><?= esc($barang['nama']); ?></td>
                            <td><?= esc($barang['merek']); ?></td>
                            <td><?= esc($barang['kd_user']); ?></td>
                            <td><?= esc($barang['harga']); ?></td>
                            <td><?= esc($barang['stok']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data barang.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
