<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if ( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
</head>
<body>
    <h1>Tambah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <label for="nis">NIS : </label>
        <input type="text" name="nis" id="nis" required>
        <br>
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" required>
        <br>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required>
        <br>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar">
        <br>
        <button type="submit" name="submit">Tambah Data!</button>
    </form>
</body>
</html>