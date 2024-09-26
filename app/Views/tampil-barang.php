<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Barang</h1>
        
        <!-- Tombol Tambah Barang -->
        <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary mb-3">Tambah Barang</a>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>kd_barang</th>
                    <th>nama</th>
                    <th>merek</th>
                    <th>kd_user</th>
                    <th>harga</th>
                    <th>stok/th>
                    <th>Barang</th>
                    <th>Hapus</th>
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

                    <!-- Kolom barang (untuk melihat detail) -->
                    <td>
                        <a href="<?= base_url('barang/view/'.$b['id']) ?>" class="btn btn-info btn-sm">Lihat</a>
                    </td>

                    <!-- Kolom Hapus -->
                    <td>
                        <a href="<?= base_url('barang/hapus/'.$b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
