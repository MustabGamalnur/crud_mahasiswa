<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT foto FROM mahasiswa WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    if ($data['foto'] && file_exists("uploads/" . $data['foto'])) unlink("uploads/" . $data['foto']);
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
    
    echo "<script>window.location='index.php';</script>";
}
?>