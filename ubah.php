<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
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
    <title>Ubah data siswa</title>
</head>
<body>
    <h1>Ubah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa["gambar"];?>">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?= $siswa["nama"];?>">
        <br>
        <label for="nis">NIS : </label>
        <input type="text" name="nis" id="nis" value="<?= $siswa["nis"];?>">
        <br>
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas" id="kelas" value="<?= $siswa["kelas"];?>">
        <br>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $siswa["jurusan"];?>">
        <br>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" value="<?= $siswa["email"];?>">
        <br>
        <label for="gambar">Gambar :</label><br>
        <img src="dd/<?= $siswa['gambar']?>" width="70"><br>
        <input type="file" name="gambar" id="gambar">
        <br>
        <button type="submit" name="submit">Ubah Data!</button>
    </form>
</body>
</html>

<!-- keterangan -->
<!-- required pada input digunakan untuk memastikan
bahwa pengguna harus memasukkan nilai pada input tersebut
sebelum dapat mengirimkan formulir -->