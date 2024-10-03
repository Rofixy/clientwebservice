<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pengguna</h1>
        
        <!-- Tombol Tambah Pengguna -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahPelanggan">Tambah User</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= esc($u['id']) ?></td>
                    <td><?= esc($u['nama']) ?: 'Tidak ada nama' ?></td>
                    <td><?= esc($u['username']) ?: 'Tidak ada username' ?></td>
                    <td><?= esc($u['password']) ?: 'Tidak ada password' ?></td>
                    <td><?= esc($u['alamat']) ?: 'Tidak ada alamat' ?></td>
                    <td><?= esc($u['no_hp']) ?: 'Tidak ada no HP' ?></td>
                    <td><?= esc($u['role']) ?: 'Tidak ada role' ?></td>

                    <!-- Kolom aksi (untuk melihat detail) -->
                    <td>
                        <a href="<?= base_url('users/view/'.$u['id']) ?>" class="btn btn-info btn-sm">Lihat</a>
                        <a href="<?= base_url('users/hapus/'.$u['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="modalTambahUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form Tambah Users -->
            <form action="<?= base_url('users/sendData') ?>" method="post">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
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
                <label for="role">Role</label>
                <input type="text" class="form-control" name="role" required>
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
