<?php 
require("koneksi.php");
// require("koneksi.php");
$images = query("SELECT * FROM img");
// $siswa = query( "SELECT * FROM SISWA");  
upload();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="src/sidebar/side.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="node_modules/bootstrap/js/src/index.js"  defer></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Karla:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="">
      <div class="container sidebar position-fixed bg-dark-subtle  top-0 shadow col p-0 close " style="opacity: 0%;" id="sidebar">
        <div class="icon w-100 ms-0"></div>
        <button type="submit" class="humberger-toggle  d-flex justify-content-center align-items-center h-10 ms-0 btn position-absolute end-0"><i class="bi bi-list fs-1 "></i></button>
        <div class="sidebar-content-container">
            <div class="dashboard border border-dark w-100 ms-0 mb-2 d-flex align-items-center gap-2 ">
              <i class="bi bi-speedometer2 fs-1 ms-3 "></i>
              <span class="fs-2 nav-child-closed ms-3">Dashboard</span>
            </div>
            <a href="index.php" class="data  border border-dark w-100 ms-0 mb-2 d-flex align-items-center gap-2">
              <label for="data"><i class="bi bi-bar-chart-fill fs-1 ms-3"></i></label>
              <span class="fs-2 nav-child-closed ms-2" id="data">Data</span>
            </a>
            <div class="img  border border-dark w-100 ms-0 mb-2 d-flex align-items-center gap-2">
              <i class="bi bi-image-fill ms-3 fs-1"></i>
              <span class="fs-2 nav-child-closed ms-3"><a href="image.php">Image</a></span>
            </div>
            <div class="setting  border border-dark w-100 ms-0 mb-2 d-flex align-items-center gap-2">
            <i class="bi bi-gear-fill ms-3 fs-1"></i>
              <span class="fs-2 nav-child-closed ms-3"><a href="index.php">Setting</a></span>
            </div>
        </div>
      </div>
    </header>
    <main>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <button type="submit" name="upload-submit">kirim</button>    
      </form>
      <?php foreach ($images as $img): ?>
        <img src="img/<?= $img['img_name'] ?>" alt="" srcset="">
        <form action="" method="post">
          <input type="hidden" value="<?= $img["img_name"]?>" name="img_name">
          <button type="submit" name="hapus_gambar">hapus</button>
        </form>
      <?php endforeach ?>
    </main>
</body>
</html>