<?php 
// the data var are separated because the keuangan section need the data too so it eazier to separated the variable 
include 'data-var.php';
?>

    <form action="" method="post" class="">
    <h1 class="header fs-1 bold mt-3 ms-5 header">Daftar Siswa</h1>
    </form>
 
<!-- tambah data -->
    <div class="tambah  d-flex justify-content-center justify-content-sm-between flex-sm-row flex-column ps-sm-5 pe-sm-5 gap-2">
                  <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-data">
          tambah data
        </button>
        <!-- read -->
        <div class="searchbar-container d-flex bg-white rounded-5 border border-1 border-dark">
              <form method="post" action="">
                 <input type="text"class="border-0" id="keyword" rows="1" name="keyword"></input>
              </form>
              <img src="../../img/loader.gif" alt="" srcset="" class='loader'>
        </div>
      </div>
                <form action="koneksi.php" method="post">
                  <!-- Modal -->
                  <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="name" class="form-label">nama</label>
                            <input type="text" class="form-control" id="name" placeholder="nama" name="nama">
                          </div>
                          <div class="mb-3">
                            <label for="nisn" class="form-label">nisn </label>
                            <input type="text"class="form-control" id="nisn" rows="1" name="kelas"></input>
                          </div>
                          <div class="mb-3">
                            <label for="noabsen" class="form-label">no absen</label>
                            <input type="text"class="form-control" id="noabsen" rows="1"name="noabsen"></input>
                          </div>
                          <div class="mb-3">
                            <label for="tanggallahir" class="form-label">tanggal lahir</label>
                            <input type="text"class="form-control" id="tanggallahir" rows="1" name="umur"></input>
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email"class="form-control" id="email" rows="1" name="email"></input>
                          </div>
                          <div class="mb-3">
                            <label for="nohp" class="form-label">no. hp</label>
                            <input type="text"class="form-control" id="nohp" rows="1" name="nohp"></input>
                          </div>
                          <div class="mb-3">
                            <label for="alamat" class="form-label">alamat</label>
                            <textarea type="text"class="form-control" id="alamat" rows="1" name="alamat"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer d-flex flex-column">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submit-tambah">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>   
    
      <div class="container-fluid p-5 ">
        <div class="row rounded data-container">
            <div class="id  border rounded-start border-dark p-2 border-1 d-flex justify-content-center">id</div>
            <div class="nama col-2 p-2 ">NAMA</div>
            <div class="kelas col-1 p-2 ">NISN</div>
            <div class="noabsen col p-2 ">NO ABSEN</div>
            <div class="umur col-1 p-2 ">TANGGAL LAHIR</div>
            <div class="email col-2 p-2 ">EMAIL</div>
            <div class="nohp p-2 border-1">NO.HP</div>
            <div class="alamat col-2 p-2 ">ALAMAT</div>
            <div class="aksi col-1 rounded-end p-2 ">AKSI</div>
      </div>
<div class="outer-data-container">
    <?php foreach($siswa as $value): ?>
        <?php if(isset($_POST["yakin"])){
            echo "<h1>hLLO </h1>";             
        }?>
        <div class="row rounded mb-4 pb-lg-2 pt-lg-2" id="row">
          <div class="id rounded-start p-2 d-flex justify-content-center align-items-center"><?= $i ?></div>
          <div class="nama col-sm-2 align-items-center">NAMA</div>
          <div class="nama col-sm-2 align-items-center p-2 "><?= $value["nama"]?></div>
          <div class="kelas col-sm-1 align-items-center">KELAS</div>
          <div class="kelas col-sm-1 align-items-center p-2 "><?= $value["nisn"]?></div>
          <div class="noabsen col-sm align-items-center">NO ABSEN</div>
          <div class="noabsen col-sm align-items-center p-2 "><?= $value["no absen"]?></div>
          <div class="umur col-sm-1 align-items-center ">UMUR</div>
          <div class="umur col-sm-1 align-items-center p-2 "><?= $value["tanggal lahir"]?></div>
          <div class="email col-sm-2  align-items-center ">EMAIL</div>
          <div class="email col-sm-2  align-items-center p-2 "><?= $value["email"]?></div>
          <div class="nohp align-items-center justify content-center ">NO.HP</div>
          <div class="nohp align-items-center justify content-center p-2 "><?= $value["no hp"]?></div>
          <div class="alamat col-sm-2 align-items-center">ALAMAT</div>
          <div class="alamat col-sm-2 align-items-center p-2 "><?= $value["alamat"]?></div>
          <div class="aksi col-sm-1 rounded-end align-items-center p-2 d-flex gap-2">
                  <!-- Button hapus modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $value["id"]?>">
                    hapus
                  </button>
                  <!-- button update modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalUpdate<?= $value["id"]?>">
                    update 
                  </button>
                  <!-- </form> -->
          </div>
        </div>
                <!-- Modal hapus -->
                <div class="modal fade" id="modalHapus<?= $value["id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="id" id="" value="<?= $value["id"]?>">
                        <div class="modal-body">
                          <span>Apakah Anda Yakin Menghapus Data Ini</span>
                          <br>
                          <span><?= $value["nama"] ?></span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
                          <button type="submit" class="btn btn-danger" name="delete">Yakin</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- modal update -->
                <form action="" method="post" id="update-data">
                 <input type="hidden" name="id" id="update-data-id" value="<?= $value['id']?>">
              <!-- Modal -->
              <div class="modal fade" id="modalUpdate<?= $value["id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="name" class="form-label">nama</label>
                        <input type="text" class="form-control" id="name" placeholder="nama" name="nama" value="<?= $value["nama"]?>">
                      </div>
                      <div class="mb-3">
                        <label for="kelas" class="form-label">nisn</label>
                        <input type="text"class="form-control" id="nisn" rows="1" name="nisn" value="<?= $value["nisn"]?>"></input>
                      </div>
                      <div class="mb-3">
                        <label for="noabsen" class="form-label">no absen</label>
                        <input type="text"class="form-control" id="noabsen" rows="1"name="noabsen" value="<?= $value["no absen"]?>"></input>
                      </div>
                      <div class="mb-3">
                        <label for="tanggallahir" class="form-label">tanggal lahir</label>
                        <input type="text"class="form-control" id="tanggallahir" rows="1" name="tanggallahir" value="<?= $value["tanggal lahir"]?>"></input>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email"class="form-control" id="email" rows="1" name="email" value="<?= $value["email"]?>"></input>
                      </div>
                      <div class="mb-3">
                        <label for="nohp" class="form-label">no. hp</label>
                        <input type="text"class="form-control" id="nohp" rows="1" name="nohp" value="<?= $value["no hp"]?>"></input>
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text"class="form-control" id="alamat" rows="2" name="alamat" value="<?= $value["alamat"]?>"></input>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit-update">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        <?php $i++?>
        <?php endforeach?>
</div>
      <script src="jquery-3.6.4.min.js"></script>  