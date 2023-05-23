



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
          <div class="kelas col-sm-1 align-items-center p-2 "><?= $value["kelas"]?></div>
          <div class="noabsen col-sm align-items-center bg-dark-subtle ">NO ABSEN</div>
          <div class="noabsen col-sm align-items-center p-2 "><?= $value["no absen"]?></div>
          <div class="umur col-sm-1 align-items-center bg-dark-subtle  ">UMUR</div>
          <div class="umur col-sm-1 align-items-center p-2 "><?= $value["umur"]?></div>
          <div class="email col-sm-2  align-items-center bg-dark-subtle  ">EMAIL</div>
          <div class="email col-sm-2  align-items-center p-2 "><?= $value["email"]?></div>
          <div class="nohp align-items-center justify content-center bg-dark-subtle  ">NO.HP</div>
          <div class="nohp align-items-center justify content-center p-2 "><?= $value["no hp"]?></div>
          <div class="alamat col-sm-2 align-items-center bg-dark-subtle ">ALAMAT</div>
          <div class="alamat col-sm-2 align-items-center p-2 "><?= $value["alamat"]?></div>
          <div class="aksi col-sm-1 rounded-end align-items-center p-2 flex-column">
                  <!-- Button hapus modal -->
                  <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $value["id"]?>">
                    hapus
                  </button>
                  <!-- button update modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalUpdate<?= $value["id"]?>">
                    update
                  </button>
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
                  <form action="koneksi.php" method="post">
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
            <form action="koneksi.php" method="post">
             <input type="hidden" name="id" id="" value="<?= $value['id']?>">
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
                    <label for="kelas" class="form-label">kelas</label>
                    <input type="text"class="form-control" id="kelas" rows="1" name="kelas" value="<?= $value["kelas"]?>"></input>
                  </div>
                  <div class="mb-3">
                    <label for="noabsen" class="form-label">no absen</label>
                    <input type="text"class="form-control" id="noabsen" rows="1"name="noabsen" value="<?= $value["no absen"]?>"></input>
                  </div>
                  <div class="mb-3">
                    <label for="umur" class="form-label">umur</label>
                    <input type="text"class="form-control" id="umur" rows="1" name="umur" value="<?= $value["umur"]?>"></input>
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