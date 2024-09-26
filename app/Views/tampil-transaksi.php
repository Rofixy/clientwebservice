<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Transaksi</h1>
        
        <!-- Tombol Tambah Barang -->
        <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary mb-3">Tambah Barang</a>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>No Invoice</th>
                    <th>Kode User</th>
                    <th>Kode Pelanggan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Created At</th>
                    <th>Transaksi</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $t): ?>
                <tr>
                    <td><?= esc($t['id']) ?></td>
                    <td><?= esc($t['no_invoice']) ?></td>
                    <td><?= esc($t['kd_user']) ?></td>
                    <td><?= esc($t['kd_pelanggan']) ?></td>
                    <td><?= esc($t['tgl_mulai']) ?></td>
                    <td><?= esc($t['tgl_kembali']) ?></td>
                    <td><?= esc($t['status']) ?></td>
                    <td><?= esc($t['keterangan']) ?></td>
                    <td><?= esc($t['created_at']) ?></td>

                    <!-- Kolom Transaksi (untuk melihat detail) -->
                    <td>
                        <a href="<?= base_url('transaksi/view/'.$t['id']) ?>" class="btn btn-info btn-sm">Lihat</a>
                    </td>

                    <!-- Kolom Hapus -->
                    <td>
                        <a href="<?= base_url('transaksi/hapus/'.$t['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
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
