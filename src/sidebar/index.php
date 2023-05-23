<?php 
session_start();
require("../../koneksi.php");
if($_SESSION['login-admin'] == false){
  header("Location: ../login/login.php");
}
// if(($_SESSION['login'])){
//   header("Location: ../login/login.php");
//   echo "mdmd </br> dqd ";
// }
  // echo "mdmd </br> dqd ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.6.4.min.js"></script>
    <script src="side.js"  defer></script>
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="side.css" type="text/css">
    <!-- dashboard css -->
    <link rel="stylesheet" href="ajax/dashboard-content/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js" defer></script>
    <!-- <script src="script.js" defer></script> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Karla:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="">
      <div class="container sidebar position-fixed bg-dark-subtle  top-0 shadow col p-0 close" id="sidebar">
        <div class="icon w-100 ms-0"></div>
        <button type="submit" class="humberger-toggle  d-sm-flex justify-content-center align-items-center h-10 ms-0 btn position-absolute end-0" id="humberger-toggle"><i class="bi bi-list fs-1 "></i></button>
        <div class="sidebar-content-container">
            <div class="dashboard w-100 ms-0 mb-2 d-flex align-items-center gap-2 ">
              <i class="bi bi-speedometer2 fs-1 ms-3 "></i>
              <span class="fs-2 nav-child-closed ms-3">Dashboard</span>
            </div>
            <div class="data  w-100 ms-0 mb-2 d-flex align-items-center gap-2">
              <i class="bi bi-bar-chart-fill fs-1 ms-3"></i>
              <span class="fs-2 nav-child-closed ms-3" id="data">
               data
              </span>
            </div>
            <div class="img  w-100 ms-0 mb-2 d-flex align-items-center gap-2">
              <i class="bi bi-image-fill ms-3 fs-1"></i>
              <span class="fs-2 nav-child-closed ms-3">image</span>
            </div>
            <div class="setting  w-100 ms-0 mb-2 d-flex align-items-center gap-2">
            <i class="bi bi-gear-fill ms-3 fs-1"></i>
              <span class="fs-2 nav-child-closed ms-3">setting</span>
            </div>
        </div>
      </div>
    </header>
    <main></main>
</body>
</html>