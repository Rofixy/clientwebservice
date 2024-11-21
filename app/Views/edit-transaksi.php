<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Transaksi</h1>
        
        <form action="<?= base_url('transaksi/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= esc($transaksi['id']) ?>">

            <div class="form-group">
                <label for="no_invoice">No Invoice</label>
                <input type="text" class="form-control" name="no_invoice" value="<?= esc($transaksi['no_invoice']) ?>" required>
            </div>

            <div class="form-group">
                <label for="kd_user">Kode User</label>
                <input type="text" class="form-control" name="kd_user" value="<?= esc($transaksi['kd_user']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="kd_pelanggan">Kode Pelanggan</label>
                <input type="text" class="form-control" name="kd_pelanggan" value="<?= esc($transaksi['kd_pelanggan']) ?>" required>
            </div>

            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?= esc($transaksi['tgl_mulai']) ?>" required>
            </div>

            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tgl_kembali" value="<?= esc($transaksi['tgl_kembali']) ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" value="<?= esc($transaksi['status']) ?>" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?= esc($transaksi['keterangan']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('transaksi') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
