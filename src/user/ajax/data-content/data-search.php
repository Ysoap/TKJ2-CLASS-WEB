



<?php 
usleep(500000);
require '../../../../koneksi.php';
$keyword = $_GET["keyword"];
$siswa = query("SELECT * FROM SISWA WHERE nama LIKE '%$keyword%'");
?>
<?php foreach($siswa as $value): ?>
  <div class="row rounded mb-4 " id="row"> 
          <div class="id rounded-start p-2 d-flex justify-content-center align-items-center"><?= $i ?></div>
          <div class="nama col-sm-2 align-items-center bg-dark-subtle ">NAMA</div>
          <div class="nama col-sm-2 align-items-center p-2 "><?= $value["nama"]?></div>
          <div class="kelas col-sm-1 align-items-center bg-dark-subtle ">KELAS</div>
          <div class="kelas col-sm-1 align-items-center p-2 "><?= $value["nisn"]?></div>
          <div class="noabsen col-sm align-items-center bg-dark-subtle ">NO ABSEN</div>
          <div class="noabsen col-sm align-items-center p-2 "><?= $value["no absen"]?></div>
          <div class="umur col-sm-1 align-items-center bg-dark-subtle  ">UMUR</div>
          <div class="umur col-sm-1 align-items-center p-2 "><?= $value["tanggal lahir"]?></div>
          <div class="email col-sm-2  align-items-center bg-dark-subtle  ">EMAIL</div>
          <div class="email col-sm-2  align-items-center p-2 "><?= $value["absensi"]?></div>
          <div class="nohp align-items-center justify content-center bg-dark-subtle  ">NO.HP</div>
          <div class="nohp align-items-center justify content-center p-2 "><?= $value["no hp"]?></div>
          <div class="alamat col-sm-2 align-items-center bg-dark-subtle ">ALAMAT</div>
          <div class="alamat col-sm-2 align-items-center p-2 "><?= $value["alamat"]?></div>
   </div>
      
        <?php $i++?>
        <?php endforeach?>