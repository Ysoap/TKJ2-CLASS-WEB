<?php
session_start();
$conn = mysqli_connect('localhost','root','','SISWA');
//get in from login

if(isset($_SESSION['username-from-login'])){
    $username = $_SESSION['username-from-login'];
}
//get in from register
if(isset($_SESSION['username-from-register'])){
    $username = $_SESSION['username-from-register'];
}
$result = mysqli_query($conn,"SELECT * FROM `SISWA` WHERE username='$username'");
$result_absensi = mysqli_query($conn ,"SELECT * FROM `absensi` WHERE username='$username'");
$fetch = mysqli_fetch_assoc($result);
$fetch_absensi = mysqli_fetch_assoc($result_absensi);
// if (mysqli_num_rows($fetch['username'])==0) { echo 'kontol'; };
$nisn = $fetch['nisn'];
$nama = $fetch['nama'];
$noabsen = $fetch['no absen'];
$sakit = $fetch_absensi['sakit'];
$izin = $fetch_absensi['izin'];
$alpha = $fetch_absensi['alpha'];
$Profile_Picture = $fetch['profile-pic'];
$tanggallahir = $fetch['tanggal lahir']

?>

<div class="container">
   
    <div class="row calendar-container p-2 g-3 mt-5">
        <div class="col calendar rounded" id="calendar">
            <div class="container absensi-container  p-3">
                <div class="row border border-1 border-dark p-3">
                    <div class="col-4 col-md-2 col-sm-3 bg-white rounded-circle profile-picture">
                        <img src="../../img/profile-picture/<?= $Profile_Picture ?>" alt="" srcset="" class="w-100">
                    </div>
                    <div class="profile-text col-8 d-flex flex-column justify-content-center align-items-start">
                        <span class=""><?= $nama;?>(<?= $noabsen ?>)</span>
                        <div class="status">
                            <div class="indicator"></div>
                            <span class="status-text">siswa</span>
                        </div>
                        <span class="nisn"><?= $nisn ?></span>
                        <span class="tanggallahir"><?= $tanggallahir?></span>
                    </div>
                </div>
            </div>  
            <div class="absensi border border-1 border-dark">
            <div class="row juni justify-content-center mb-3">
                    <div class="col-5">BULAN</div>
                    <div class="col-2">SAKIT</div>
                    <div class="col-2">IZIN</div>
                    <div class="col-2">ALPHA</div>
                </div>
            <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row juni justify-content-center">
                    <div class="col-5">JUNI</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
                <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row juli justify-content-center">
                    <div class="col-5">JULI</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
            <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row agustus justify-content-center">
                    <div class="col-5">AGUSTUS</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
                <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row september justify-content-center">
                    <div class="col-5">SEPTEMBER</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
            <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row november justify-content-center">
                    <div class="col-5">NOVEMBER</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
            <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row oktober justify-content-center">
                    <div class="col-5">OKTOBER</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
            <?php 
            $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$username' AND bulan='juni'") ;
            $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
            
            ?>
                <div class="row desember justify-content-center">
                    <div class="col-5">DESEMBER</div>
                    <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                    <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                    <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 row-cols-2 data-d-container ">
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center dashboard-dashboard">
                <i class="bi bi-speedometer2 "></i>
                <span class="icon-text">Dashboard</span>
            </div>
        </div>
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center dashboard-data">
                <i class="bi bi-bar-chart-fill "></i>
                <span class="icon-text">Data</span>
            </div>
        </div>
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center dashboard-keuangan">
                <i class="bi bi-currency-dollar dashboard-keuangan"></i>
                <span class="icon-text">Keuangan</span>
            </div>
        </div>
        <div class="data-d-container ">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center dashboard-setting">
                <i class="bi bi-gear-fill "></i>
                <span class="icon-text">Setting</span>
            </div>
        </div>
      
</div>
