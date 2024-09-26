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
        <a href="<?= base_url('users/tambah') ?>" class="btn btn-primary mb-3">Tambah Pengguna</a>

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

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
