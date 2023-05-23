<?php
session_start();
$conn = mysqli_connect('localhost','root','','SISWA');
//get in from login
if(isset($_SESSION['username-from-login'])){
    $username = $_SESSION['username-from-login'];
}
//get in from register
if(isset($_SESSION['username-from-register'])){
    $username = $_SESSION['session-from-register'];
}
$result = mysqli_query($conn,"SELECT * FROM `SISWA` WHERE username='$username'");
$fetch = mysqli_fetch_assoc($result);
// if (mysqli_num_rows($fetch['username'])==0) { echo 'kontol'; };
$nisn = $fetch['nisn'];
$nama = $fetch['nama'];
$Profile_Picture = $fetch['profile-pic'];
echo $_SESSION['username-from-login'];

?>

<div class="container">
    <div class="row absensi-container mt-5 p-3">
            <div class="row border border-1 border-dark p-3">
                <div class="col-4 col-md-2 col-sm-3 bg-white rounded-circle profile-picture">
                    <img src="<?= $Profile_Picture ?>" alt="" srcset="">
                </div>
                <div class="profile-text col-8 d-flex flex-column justify-content-center align-items-start">
                    <span class=""><?= $nama;?></span>
                    <div class="status">
                        <div class="indicator"></div>
                        <span class="status-text">siswa</span>
                    </div>
                    <span class="nisn"><?= $nisn ?></span>
                </div>
            </div>
    </div>
    <div class="row calendar-container p-3">
        <div class="col calendar rounded" id="calendar"></div>
    </div>
    <div class="row g-3 row-cols-2 data-d-container ">
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
                <i class="bi bi-speedometer2  "></i>
                <span class="icon-text">Dashboard</span>
            </div>
        </div>
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
                <i class="bi bi-bar-chart-fill "></i>
                <span class="icon-text">Data</span>
            </div>
        </div>
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
                <i class="bi bi-image-fill "></i>
                <span class="icon-text">Images</span>
            </div>
        </div>
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
                <i class="bi bi-gear-fill "></i>
                <span class="icon-text">Setting</span>
            </div>
        </div>
      
</div>
