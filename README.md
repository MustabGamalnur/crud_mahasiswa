# Aplikasi Manajemen Data Mahasiswa

Proyek ini adalah aplikasi web sederhana berbasis CRUD (Create, Read, Update, Delete) yang dikembangkan untuk memenuhi tugas ujian praktikum pemrograman web.

## Tema Proyek
Aplikasi ini mengelola Data Mahasiswa dengan atribut sebagai berikut:
* NIM
* Nama Lengkap
* Jurusan
* Foto Profil

## Fitur Utama
1. Daftar Data: Menampilkan seluruh data mahasiswa dalam bentuk tabel beserta foto profil.
2. Tambah Data: Input data mahasiswa baru sekaligus mengunggah foto.
3. Edit Data: Memperbarui informasi mahasiswa dan mengganti foto yang sudah ada.
4. Hapus Data: Menghapus rekaman data secara permanen dari database dan folder penyimpanan.
5. Validasi: Pengecekan input kosong, format gambar, dan ukuran file (maksimal 2 MB) menggunakan JavaScript.

## Teknologi yang Digunakan
* Bahasa Pemrograman: PHP (Native)
* Database: MySQL
* Frontend: HTML5, CSS3, JavaScript (Native)
* Server Lokal: Laragon

## Cara Instalasi
1. Clone repository ini ke folder `www`.
2. Import file `db_kampus.sql` ke dalam database MySQL melalui HeidiSQL atau phpMyAdmin.
3. Pastikan konfigurasi pada `koneksi.php` sudah sesuai dengan server lokal Anda.
4. Akses melalui browser di `localhost/crud_mahasiswa`.

Terimakasih!