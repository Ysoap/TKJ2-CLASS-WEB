<?php
$conn = mysqli_connect('localhost','root','','SISWA');
include '../data/data-var.php';
?>
          
          
       
          
<div class="container pt-5">

                <div class="accordion m-0 rounded rounded-2 mt-5 d-flex flex-column gap-2" id="accordionExample">
                    <?php foreach($siswa as $value): ?>
                        <?php $nama = $value['username']?>
                        <div class="accordion-item rounded rounded-2">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button rounded rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $value['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <span><?= $value['nama']?></span> 
                            </button>
                            </h2>
                            <div id="<?= $value['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body d-flex justify-content-between">
                                    <div class="absensi-dahsboard border border-1 border-dark w-100">
                                        <div class="row juni justify-content-center mb-3">
                                                <div class="col-5">BULAN</div>
                                                <div class="col-2">SAKIT</div>
                                                <div class="col-2">IZIN</div>
                                                <div class="col-2">ALPHA</div>
                                            </div>
                                        <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row juni justify-content-center">
                                                <div class="col-5">JUNI</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                            <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row juli justify-content-center">
                                                <div class="col-5">JULI</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                        <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row agustus justify-content-center">
                                                <div class="col-5">AGUSTUS</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                            <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row september justify-content-center">
                                                <div class="col-5">SEPTEMBER</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                        <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row november justify-content-center">
                                                <div class="col-5">NOVEMBER</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                        <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
                                        $fetch_juni = mysqli_fetch_assoc($result_absensi_juni);
                                        
                                        ?>
                                            <div class="row oktober justify-content-center">
                                                <div class="col-5">OKTOBER</div>
                                                <div class="col-2"><?= $fetch_juni['sakit'];?></div>
                                                <div class="col-2"><?= $fetch_juni['izin'];?> </div>
                                                <div class="col-2"><?= $fetch_juni['alpha'];?></div>
                                            </div>
                                        <?php 
                                        $result_absensi_juni = mysqli_query($conn, "SELECT * FROM `absensi` WHERE username='$nama' AND bulan='juni'") ;
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
                        </div>
                    <?php endforeach ?>
                </div>
</div>