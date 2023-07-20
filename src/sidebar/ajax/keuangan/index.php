<?php 
// require 'koneksi';
$A = $_SESSION['a'];
//include data to get all thw student query data we do this too minimize the amount of query in one page
include '../data/data-var.php';
//
$conn = mysqli_connect("localhost","root","","2023_ADMINISTRATION");
$initial_date_query = mysqli_query($conn,"SELECT * FROM  `now`");
$passed_db_query = mysqli_query($conn,"SELECT * FROM  `passed`");
$rows = [];
$passed_db = [];
while($pass = mysqli_fetch_assoc($passed_db_query)){
  $passed_db[] = $pass;
}

while($row = mysqli_fetch_assoc($initial_date_query)){
$rows[] = $row;
}
$initial_date_num_fetch = mysqli_fetch_assoc($initial_date_query);
$initial_date_num = $initial_date_num_fetch['num'];
$latest = mysqli_fetch_assoc(mysqli_query($conn," SELECT * FROM `now` WHERE id=(SELECT MAX(id) FROM `now`)" )) ;
$latest_saldo = $latest['sisa_saldo'];
$latest_keluar = mysqli_query($conn," SELECT * FROM `now` WHERE ket='keluar'" );
$latest_masuk = mysqli_query($conn," SELECT * FROM `now` WHERE ket='masuk'" );
$latest_keluar_sum = [];
$latest_masuk_sum = [];
while($a = mysqli_fetch_assoc($latest_keluar)){
  $latest_keluar_sum[] = (int)$a['value'];
}
// var_dump($latest_keluar_sum);
while($b = mysqli_fetch_assoc($latest_masuk)){
  $latest_masuk_sum[] = (int)$b['value'];
}
// var_dump($latest_keluar_sum);

$present = (int)$latest['num'];
$date =(int)date('m');
if( $date === $present){
//bulan ini content = query
$keluar = [];
$masuk = [];
foreach($rows as $item){
  if(in_array('keluar',$item)){
    $keluar[] = $item;
  };
  if(in_array('masuk',$item)){
    $masuk[] = $item;
  };
}

$masuk = array_reverse($masuk,true);
}
$passed = $present;
if ($date === $present + 1) {
    mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada pemasukan','masuk','0','','$latest_saldo')");
    mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada peneluaran','keluar','0','','$latest_saldo')");
    mysqli_query($conn,"INSERT INTO `passed` SELECT * FROM `now` WHERE num='$passed'");
    mysqli_query($conn,"DELETE FROM `now` WHERE num='$passed'");
    //bulan ini content = bla/
    //add new previous content
}

if( $date === 1){
  mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada pemasukan','masuk','0','','$latest_saldo')");
  mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada peneluaran','keluar','0','','$latest_saldo')");
  mysqli_query($conn,"INSERT INTO `passed` SELECT * FROM `now` WHERE num='$passed'");
  mysqli_query($conn,"DELETE FROM `now` WHERE num='$passed'");
}
// for ($present=date('m'); $present < date('m'); $present++) { 
// }
?>

<div class="container w-xl-25">
     <div class=" main border border-1 border-dark rounded rounded-2 ms-0">
        <div class="header top-02 justify-content-center d-flex bg-dark mb-4">
          <span>Bulan Ini</span>
        </div>
        <div class="main-contentbottom-0 w-100">
            <div class="saldo-kas d-flex flex-column mb-4 ms-lg-3 text-center text-lg-start">
              <span class="saldo-text">Saldo Kas:</span>
              <span class="saldo"><?= $latest_saldo?></span>
            </div>
            <div class="row w-100 border border-1 border-dark ms-0 masuk-keluar">
                <div class="col border border-1 border-dark d-flex flex-column p-4 position-relative">
                    <i class="bi bi-plus-circle-fill position-absolute keluar-masuk "data-bs-toggle="modal" data-bs-target="#modalTambah"></i>
                    <span class="masuk-text">Masuk:</span>
                    <span class="masuk"><?= array_sum($latest_masuk_sum)?></span>
                </div>
                <div class="col border border-1 border-dark d-flex flex-column p-4 position-relative">
                    <i class="bi bi-plus-circle-fill position-absolute keluar-masuk "data-bs-toggle="modal" data-bs-target="#modalKeluar"></i>
                    <span class="keluar-text">Keluar:</span>
                    <span class="keluar"><?= array_sum($latest_keluar_sum)?></span>
                </div>
            </div>
            <div class="row w-100 border border-1 border-dark ms-0 masuk-keluar position-relative">
                <div class="col-12 col-xl-6 border border-1 border-dark d-flex flex-column p-0">
                    <span class="bg-primary p-2 text-center">masuk</span>
                    <div class="accordion m-0 d-flex flex-column gap-2 bg-dark-subtle accordion-container" id="">
                    <?php foreach($masuk as $value) :?>
                      <?php if($value['value'] != '0'):?>
                            <div class="accordion-item ps-2 pe-2">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button justify-content-between rounded rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $value['id']?>" aria-expanded="true" aria-controls="collapseOne">
                                    <span><?= $value['tanggal']?></span> 
                                    <div class="perubahan-saldo position-absolute ">
                                      <span class="">+<?= $value['value']?></span>
                                      <span>--></span>
                                      <span class=""><?= $value['sisa_saldo']?></span>
                                    </div>
                                </button>
                                </h2>
                                <div id="<?= $value['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body"><?= $value['deskripsi']?></div>
                                </div>
                            </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
              </div>
              <div class="col-12 col-xl-6 border border-1 border-dark d-flex flex-column p-0">
                  <span class="bg-warning p-2 text-center">keluar</span>
                  <div class="accordion m-0 d-flex flex-column gap-2 bg-dark-subtle accordion-container" id="">
                  <!--  -->
                  <?php foreach($keluar as $value) :?>
                  <?php if($value['value'] != '0'):?>
                  <div class="accordion m-0" id="accordionExample">
                        <div class="accordion-item ps-2 pe-2">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button  rounded rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $value['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <span><?= $value['tanggal']?></span> 
                                    <div class="perubahan-saldo position-absolute ">
                                      <span class="">-<?= $value['value']?></span>
                                      <span>--></span>
                                      <span class=""><?= $value['sisa_saldo']?></span>
                                    </div>
                            </button>
                            </h2>
                            <div id="<?= $value['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body"><?= $value['deskripsi']?></div>
                            </div>
                        </div>
                  </div>
                  <?php endif ?>
                  <?php endforeach ?>
                  <!--  -->
                  </div>
              </div>
            </div>
     </div>
</div>
<!-- history -->
<div class="main border border-1 border-dark" id="history">
  <div class="header text-center bg-dark">History</div>
  <div class="data-history m-2 d-flex flex-column gap-2 bg-white">
    <?php foreach($passed_db as $key) : ?>
      <?php if($key['value'] != '0'):?>
        <div class="accordion m-0" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <span><?= $key['tanggal']?></span> 
                            <div class="perubahan-saldo position-absolute ">
                            <span class="">+
                              <?php 
                              if($key['ket'] == 'masuk'){
                                          echo '+';
                                      }
                                    else{
                                      echo '-';
                                    }
                              ?>
                            <?= $key['value']?></span>
                            <span>--></span>
                            <span class=""><?= $key['sisa_saldo']?></span>
                            </div>  
                      </button>
                </h2>
                <div id="<?= $key['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body"><?=$key['deskripsi']?></div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>
  </div>
</div>
<div class="main border border-1 border-dark" id="tunggakan">
  <div class="header text-center bg-dark">Rincian Kas</div>
  <div class="accordion m-0 d-flex flex-column gap-2 bg-dark-subtle accordion-container m-2" id="">
                  <!--  -->
                  <?php foreach($siswa as $value) :?>
                  <div class="accordion m-0 rounded rounded-2" id="accordionExample">
                        <div class="accordion-item rounded rounded-2">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $value['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <span><?= $value['nama']?></span> 
                            </button>
                            </h2>
                            <div id="<?= $value['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body d-flex justify-content-between">
                                <div class="tunggakan d-flex gap-2">
                                    <span>- <?= $value['tunggakan']?> </span>
                                    <i class="bi bi-plus-circle-fill color-white" data-bs-toggle="modal" data-bs-target="#modal-tunggakan"></i>
                                    <i class="bi bi-dash-circle-fill" data-bs-toggle="modal" data-bs-target="#modal-minus-tunggakan"></i>
                                </div>
                                <div class="surplus d-flex gap-2">
                                    <span>+ <?= $value['surplus kas']?> </span>
                                    <i class="bi bi-plus-circle-fill color-white" data-bs-toggle="modal" data-bs-target="#modal-surplus"></i>
                                    <i class="bi bi-dash-circle-fill" data-bs-toggle="modal" data-bs-target="#modal-minus-surplus"></i>
                                </div>
                              </div>
                            </div>
                        </div>
                  </div>
                   <!-- modal tunggakan -->
                    <div class="modal fade" id="modal-tunggakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tunggakan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>      
                                <form action="" method="post" id="tunggakan">
                                  <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" value="<?= $value['id']?>" id="tunggakan-id" name="tunggakan-id">
                                            <label for="kelas" class="form-label">Value</label>
                                            <input type="number"class="form-control" id="tunggakan-value" rows="1" name="value"></input>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal surplus -->
                    <div class="modal fade" id="modal-surplus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Surplus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>      
                                <form action="" method="post" id="surplus">
                                  <div class="modal-body">
                                        <div class="mb-3">
                                           <input type="hidden" value="<?= $value['id']?>" id="surplus-id" name="surplus-id">
                                            <label for="kelas" class="form-label">Value</label>
                                            <input type="number"class="form-control" id="surplus-value" rows="1" name="value"></input>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- modal kurangi tunggakan -->
                     <div class="modal fade" id="modal-minus-tunggakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kurangi Tunggakan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>      
                                <form action="" method="post" id="minus-tunggakan">
                                  <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" value="<?= $value['id']?>" id="minus-tunggakan-id" name="minus-tunggakan-id">
                                            <label for="kelas" class="form-label">Value</label>
                                            <input type="number"class="form-control" id="minus-tunggakan-value" rows="1" name="value"></input>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- modal kurangi surplus -->
                     <div class="modal fade" id="modal-minus-surplus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kurangi Tunggakan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>      
                                <form action="" method="post" id="minus-surplus">
                                  <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" value="<?= $value['id']?>" id="minus-surplus-id" name="minus-surplus-id">
                                            <label for="kelas" class="form-label">Value</label>
                                            <input type="number"class="form-control" id="minus-surplus-value" rows="1" name="value"></input>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  <?php endforeach ?>
                  <!--  -->
                  </div>
  
</div>
</div>
<!-- list tunggakan -->
<!-- MODAL -->
<!-- masuk -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>      
            <form action="" method="post" id="tambahLog">
               <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label" >Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="" name="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Value</label>
                        <input type="number"class="form-control" id="value" rows="1" name="value"></input>
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" name="submit">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>
<!-- keluar -->
<div class="modal fade" id="modalKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>      
            <form action="" method="post" id="tambahLog">
               <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label" >Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="" name="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Value</label>
                        <input type="number"class="form-control" id="value" rows="1" name="value"></input>
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" name="submit">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>


<?= (int)date('m')?>