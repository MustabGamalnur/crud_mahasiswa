<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id']; $nim = $_POST['nim']; $nama = $_POST['nama']; $jurusan = $_POST['jurusan'];
    $foto_lama = $_POST['foto_lama']; $nama_file = $foto_lama;

    if ($_FILES['foto']['error'] === 0) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nama_file = time() . '_' . uniqid() . '.' . $ext;
        $tmp = $_FILES['foto']['tmp_name'];
        
        if (move_uploaded_file($tmp, "uploads/" . $nama_file)) {
            if ($foto_lama && file_exists("uploads/" . $foto_lama)) unlink("uploads/" . $foto_lama);
        }
    }

    if ($id) {
        mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', foto='$nama_file' WHERE id='$id'");
    } else {
        mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, jurusan, foto) VALUES ('$nim', '$nama', '$jurusan', '$nama_file')");
    }
    echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
}
?>