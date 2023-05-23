<?php 
require("../../xkoneksi.php");
if(isset($_POST["submit"])){
    tambah($_POST);;
    header("Location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
</head>
<body>
    <form action="" method="post">

        <ul>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="kelas">kelas</label>
                <input type="text" name="kelas" id="kelas" required>
            </li>
            <li>
                <label for="noabsen">no absen</label>
                <input type="text" name="noabsen" id="noabsen" required>
            </li>
            <li>
                <label for="umur">umur</label>
                <input type="text" name="umur" id="umur" required>
            </li>
            <li>
                <label for="email">email</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="nohp">no hp</label>
                <input type="text" name="nohp" id="nohp" required>
            </li>
            <li>
                <label for="alamat">alamat</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <button type="submit" name="submit">submit</button>
            </li>
        </ul>
        <a href="index.php">kembali</a>
    </form>
</body>
</html>