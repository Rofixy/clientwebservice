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
        
        <!-- Tombol Tambah Transaksi -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahTransaksi">Tambah Transaksi</button>

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
                    <th>Aksi</th>
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

                    <!-- Kolom Aksi -->
                    <td>
                        <a href="<?= base_url('transaksi/edit/'.$t['id']) ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="<?= base_url('transaksi/hapus/'.$t['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Transaksi -->
    <div class="modal fade" id="modalTambahTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form Tambah Transaksi -->
            <form action="<?= base_url('transaksi/tambah') ?>" method="post">
              <div class="form-group">
                <label for="no_invoice">No Invoice</label>
                <input type="text" class="form-control" name="no_invoice" required>
              </div>
              <div class="form-group">
                <label for="kd_user">Kode User</label>
                <input type="text" class="form-control" name="kd_user" required>
              </div>
              <div class="form-group">
                <label for="kd_pelanggan">Kode Pelanggan</label>
                <input type="text" class="form-control" name="kd_pelanggan" required>
              </div>
              <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_mulai" required>
              </div>
              <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tgl_kembali" required>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" required>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
