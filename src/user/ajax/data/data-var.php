<?php
    require("../../../../koneksi.php");

    //PAGINATION
    session_start();
    $jumlahsiswaperhalaman = 4;
    $jumlahseluruhdata = count(query("SELECT * FROM SISWA"));
    $jumlahhalaman = ceil($jumlahseluruhdata/$jumlahsiswaperhalaman);
    $halamanaktif= (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awaldata = ($jumlahsiswaperhalaman * $halamanaktif) - $jumlahsiswaperhalaman;
    $siswa = query( "SELECT * FROM SISWA 
    -- LIMIT $awaldata, $jumlahsiswaperhalaman
    "); 
    $i = 1;
    // if (!isset($_SESSION["login"])) {
    //   header("Location: src/login/login.php");
    // }
    if(isset($_POST["cari"])){
        $siswa = read($_POST['keyword']); 
    }
?>