<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_kampus");
if (!$koneksi) {
    die("Koneksi database gagal");
}
?>