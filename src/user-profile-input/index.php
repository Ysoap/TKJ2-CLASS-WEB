<?php 
require("../../koneksi.php")


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="../../jquery-3.6.4.min.js"></script>
    <script src="script.js" defer></script>

    <title>Document</title>
</head>
<body>
    <main>
        <form class="container border border dark border-1 d-flex flex-column" method="post" enctype="multipart/form-data">
            <input type="text" name="nama" id="nama" >
            <label for="nama">NAMA</label>
            <input type="number" name="nisn" id="nisn" >
            <label for="nisn">NISN</label>
            <input type="number" name="noabsen" id="noabsen" >
            <label for="noabsen">NO ABSEN</label>
            <input type="text" name="tanggallahir" id="tanggallahir" >
            <label for="tanggallahir">TANGGAL LAHIR</label>
            <input type="text" name="absensi" id="absensi" >
            <label for="absensi">ABSENSI</label>
            <input type="number" name="nohp" id="nohp" >
            <label for="nohp">NO HP</label>
            <input type="text" name="alamat" id="alamat" >
            <label for="alamat">ALAMAT</label>
            <div  class="border border-1 border-dark img-container">
                <img src="" alt="" class="" id="imgPreview">
            </div>
            <input type="file" name="img"  id="profile-picture">
            <label for="img" class=" profile-picture-label">FOTO PROFILE</label>
            <button type="submit" class="btn btn-primary" name="first_data_add">submit</button>
        </form>
    </main>
</body>
</html>