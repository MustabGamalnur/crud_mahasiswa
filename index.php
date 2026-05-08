<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        img { width: 80px; border-radius: 4px; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; }
        .btn-add { background: #007BFF; }
        .btn-edit { background: #FFC107; color: black; }
        .btn-delete { background: #DC3545; }
    </style>
</head>
<body>
    <h2>Daftar Data Mahasiswa</h2>
    <a href="form.php" class="btn btn-add">Tambah Data Baru</a>
    <table>
        <tr>
            <th>No</th><th>Foto</th><th>NIM</th><th>Nama Lengkap</th><th>Jurusan</th><th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><img src="uploads/<?= $row['foto'] ?>" alt="Foto"></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="form.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>