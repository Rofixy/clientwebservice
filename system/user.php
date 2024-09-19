<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Daftar User</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['nama']) ?></td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['alamat']) ?></td>
                <td><?= esc($user['no_hp']) ?></td>
                <td><?= esc($user['role']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
