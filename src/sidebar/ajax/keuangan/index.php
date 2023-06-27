<?php 
// require 'koneksi';
$A = $_SESSION['a'];

$conn = mysqli_connect("localhost","root","","2023_ADMINISTRATION");
$month = ['januari','februari','maret','april','mei','juni','juli','agustus','september','november','oktober','desember'];
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
$date =(int)date('m') + 1;
$latest = mysqli_fetch_assoc(mysqli_query($conn," SELECT * FROM `now` WHERE id=(SELECT MAX(id) FROM `now`)" )) ;
$present = (int)$latest['num'];
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

if( $date === $present){
//bulan ini content = query
  }
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
$passed = $present;
if ($date === $present + 1) {
    $bulan = $month[$present +1 ];
    mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada pemasukan','masuk','0','','$latest_saldo')");
    mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada peneluaran','keluar','0','','$latest_saldo')");
    mysqli_query($conn,"INSERT INTO `passed` SELECT * FROM `now` WHERE num='$passed'");
    mysqli_query($conn,"DELETE FROM `now` WHERE num='$passed'");
    //bulan ini content = bla/
    //add new previous content
}

if(isset($_POST['submit'])) {
  $_SESSION['a'] = 'c';
  $hasil = (int)$latest_saldo;
  echo $hasil;
  echo $latest_saldo;
  echo 'ld2okdjij';
  // mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$date','belum ada','masuk','0','','$latest_saldo')");
}
// for ($present=date('m'); $present < date('m'); $present++) { 
// }
?>

<div class="container w-xl-25">
     <div class=" main border border-1 border-dark rounded rounded-2 ms-0">
        <div class="header top-02">
          <span>Bulan Ini</span>
        </div>
        <div class="main-contentbottom-0 w-100">
          <div class="saldo-kas d-flex flex-column mb-4 ms-lg-3 text-center text-lg-start">
            <span class="saldo-text">Saldo Kas:</span>
                <span class="saldo"><?= $latest_saldo?></span>
              </div>
            <div class="row w-100 border border-1 border-dark ms-0 masuk-keluar">
                <div class="col border border-1 border-dark d-flex flex-column p-4">
                    <span class="masuk-text">keluar:</span>
                    <span class="masuk"><?= array_sum($latest_keluar_sum)?></span>
                  </div>
                  <div class="col border border-1 border-dark d-flex flex-column p-4 position-relative">
                    <i class="bi bi-plus-circle-fill position-absolute keluar-masuk "data-bs-toggle="modal" data-bs-target="#modalTambah"></i>
                    <span class="keluar-text">masuk:</span>
                    <span class="keluar"><?= array_sum($latest_masuk_sum)?></span>
                  </div>
                </div>
                <div class="row w-100 border border-1 border-dark ms-0 masuk-keluar position-relative">
                  <div class="col-12 col-xl-6 border border-1 border-dark d-flex flex-column p-0">
                  <i class="bi bi-minus-circle-fill position-absolute keluar-masuk"></i>
                    <span class="bg-primary p-2 text-center">masuk</span>
                    <div class="accordion m-0 d-flex flex-column gap-2 bg-dark-subtle" id="accordionExample">
                      
                    <?php foreach($masuk as $value) :?>
                      <?php if($value['value'] != '0'):?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $value['id']?>" aria-expanded="true" aria-controls="collapseOne">
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
                  <?php foreach($keluar as $value) :?>
                  <?php if($value['value'] != '0'):?>
                  <div class="accordion m-0" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               <?= $value['tanggal'] ?>
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body"><?= $value['deskripsi']?></div>
                            </div>
                        </div>
                  </div>
                  <?php endif ?>
                  <?php endforeach ?>
              </div>
            </div>
     </div>
</div>
<div class="main border border-1 border-dark" id="history">
  <div class="header">History</div>
  <div class="data-history m-2 d-flex flex-column gap-2 bg-white">
    <?php foreach($passed_db as $key) : ?>
      <?php if($value['value'] != '0'):?>
        <div class="accordion m-0" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key['id']?>" aria-expanded="true" aria-controls="collapseOne">
                            <span><?= $key['tanggal']?></span> 
                            <div class="perubahan-saldo position-absolute ">
                            <span class="">+<?= $key['value']?></span>
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
</div>

<!-- MODAL -->
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
<?= (int)date('m')?>