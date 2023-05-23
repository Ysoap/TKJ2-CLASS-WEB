<?php
session_start();
$nama = $_SESSION['name'];
$nisn = $_SESSION['nisn'];
echo $nama;

?>


<div class="container">
    <div class="row absensi-container mt-5 p-3">
            <div class="row border border-1 border-dark p-3">
                <div class="col-4 col-md-2 col-sm-3 bg-white rounded-circle profile-picture">
                </div>
                <div class="profile-text col-8 d-flex flex-column justify-content-center align-items-start">
                    <span class=""><?= $nama;?></span>
                    <div class="status">
                        <div class="indicator"></div>
                        <span class="status-text">Admin</span>
                    </div>
                    <span class="nisn"><?= $nisn ?></span>
                </div>
            </div>
    </div>
    <div class="row calendar-container p-3">
        <div class="col calendar rounded" id="calendar"></div>
    </div>
    <div class="row g-3 row-cols-2 data-d-container dashboard-dashboard">
        <div class="data-d-container">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
            <i class="bi bi-speedometer2  "></i>
            <span class="icon-text">Dashboard</span>
            </div>
        </div>
        <div class="data-d-container data-dashboard">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
            <i class="bi bi-bar-chart-fill "></i>
            <span class="icon-text">Data</span>
            </div>
        </div>
        <div class="data-d-container images-dashboard">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
            <i class="bi bi-image-fill "></i>
            <span class="icon-text">Images</span>
            </div>
        </div>
        <div class="data-d-container setting-dashboard">
            <div class="col-sm-3 col col-lg-4 data-d d-flex justify-content-center rounded flex-column align-items-center">
            <i class="bi bi-gear-fill "></i>
            <span class="icon-text">Setting</span>
            </div>
        </div>
      
</div>
