<?php
$koneksi = mysqli_connect("localhost", "username", "password", "toko");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>