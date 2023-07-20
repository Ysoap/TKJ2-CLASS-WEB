<?php
require '../../../../koneksi.php';
$jumlahsiswaperhalaman = 4;
    $jumlahseluruhdata = count(query("SELECT * FROM SISWA"));
    $jumlahhalaman = ceil($jumlahseluruhdata/$jumlahsiswaperhalaman);
    $halamanaktif= (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awaldata = ($jumlahsiswaperhalaman * $halamanaktif) - $jumlahsiswaperhalaman;
    $siswa = query( "SELECT * FROM SISWA 
    -- LIMIT $awaldata, $jumlahsiswaperhalaman
    "); 
    $i = 1;
?>
<?php foreach($siswa as $value): ?>
  <div class="row rounded mb-4" id="row">
          <div class="id rounded-start p-2 d-flex justify-content-center align-items-center"><?= $i ?></div>
          <div class="nama col-sm-2 align-items-center ">NAMA</div>
          <div class="nama col-sm-2 align-items-center p-2 "><?= $value["nama"]?></div>
          <div class="kelas col-sm-1 align-items-center ">KELAS</div>
          <div class="kelas col-sm-1 align-items-center p-2 "><?= $value["nisn"]?></div>
          <div class="noabsen col-sm align-items-center">NO ABSEN</div>
          <div class="noabsen col-sm align-items-center p-2 "><?= $value["no absen"]?></div>
          <div class="umur col-sm-1 align-items-center  ">UMUR</div>
          <div class="umur col-sm-1 align-items-center p-2 "><?= $value["tanggal lahir"]?></div>
          <div class="email col-sm-2  align-items-center  ">EMAIL</div>
          <div class="email col-sm-2  align-items-center p-2 "><?= $value["absensi"]?></div>
          <div class="nohp align-items-center justify content-center  ">NO.HP</div>
          <div class="nohp align-items-center justify content-center p-2 "><?= $value["no hp"]?></div>
          <div class="alamat col-sm-2 align-items-center ">ALAMAT</div>
          <div class="alamat col-sm-2 align-items-center p-2 "><?= $value["alamat"]?></div>
</div>
   </div>
         
        <?php $i++?>
        <?php endforeach?>