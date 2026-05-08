<?php
include 'koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$nim = ''; $nama = ''; $jurusan = ''; $foto = '';

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
    $nim = $data['nim']; $nama = $data['nama']; $jurusan = $data['jurusan']; $foto = $data['foto'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form { max-width: 400px; display: flex; flex-direction: column; gap: 15px; }
        input, button { padding: 8px; }
    </style>
</head>
<body>
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Data Mahasiswa</h2>
    <form action="proses.php" method="POST" enctype="multipart/form-data" id="formMahasiswa">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="foto_lama" value="<?= $foto ?>">
        
        <label>NIM:</label><input type="text" name="nim" id="nim" value="<?= $nim ?>">
        <label>Nama Lengkap:</label><input type="text" name="nama" id="nama" value="<?= $nama ?>">
        <label>Jurusan:</label><input type="text" name="jurusan" id="jurusan" value="<?= $jurusan ?>">
        <label>Foto Profil:</label><input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
        
        <?php if ($foto): ?><small>File saat ini: <?= $foto ?></small><?php endif; ?>
        
        <button type="submit" name="simpan" style="background: #28A745; color: white; border: none; cursor: pointer;">Simpan Data</button>
        <a href="index.php">Batal</a>
    </form>

    <script>
        document.getElementById('formMahasiswa').addEventListener('submit', function(e) {
            let nim = document.getElementById('nim').value.trim();
            let nama = document.getElementById('nama').value.trim();
            let jurusan = document.getElementById('jurusan').value.trim();
            let foto = document.getElementById('foto').files[0];
            let id = document.querySelector('input[name="id"]').value;

            if (!nim || !nama || !jurusan) { alert('Semua kolom teks wajib diisi!'); e.preventDefault(); return; }
            if (!id && !foto) { alert('Foto wajib diunggah!'); e.preventDefault(); return; }
            if (foto) {
                if (!['image/jpeg', 'image/jpg', 'image/png'].includes(foto.type)) { alert('Format foto harus JPG/PNG!'); e.preventDefault(); return; }
                if (foto.size > 2 * 1024 * 1024) { alert('Ukuran foto maksimal 2 MB!'); e.preventDefault(); return; }
            }
        });
    </script>
</body>
</html>