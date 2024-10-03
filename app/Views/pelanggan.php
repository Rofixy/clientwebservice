<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
<<<<<<< HEAD
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pelanggan</h1>
        
        <!-- Tombol Tambah Pelanggan -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahPelanggan">Tambah Pelanggan</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
=======
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
>>>>>>> 774f263 (perubahan pada pelanggan)
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Username</th>
<<<<<<< HEAD
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $p): ?>
                <tr>
                    <td><?= esc($p['id']) ?></td>
                    <td><?= esc($p['nama']) ?></td>
                    <td><?= esc($p['alamat']) ?></td>
                    <td><?= esc($p['no_hp']) ?></td>
                    <td><?= esc($p['username']) ?></td>
                    <td><?= esc($p['password']) ?></td>

                    <!-- Kolom Aksi -->
                    <td>
                        <a href="<?= base_url('pelanggan/view/'.$p['id']) ?>" class="btn btn-info btn-sm">Lihat</a>
                        <a href="<?= base_url('pelanggan/hapus/'.$p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</a>
                    </td>
=======
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
>>>>>>> 774f263 (perubahan pada pelanggan)
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<<<<<<< HEAD
    </div>

    <!-- Modal Tambah Pelanggan -->
    <div class="modal fade" id="modalTambahPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form Tambah Pelanggan -->
            <form action="<?= base_url('pelanggan/tambah') ?>" method="post">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" name="no_hp" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
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
 
=======
    <?php else: ?>
        <p class="text-center">Tidak ada data pelanggan.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> 774f263 (perubahan pada pelanggan)
