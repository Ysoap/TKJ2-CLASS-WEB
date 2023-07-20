<?php
require("../../koneksi.php");
session_start();
if (isset($_SESSION['login'])) {
    header('Location: ../user/index.php');
}
if (isset($_POST["login"])) {
    login();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../main.css">
    <script src="jquery-3.6.4.min.js"></script>
    <script defer src="index.js"></script>
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <div class="container d-flex flex-column border border-2  justify-content-center align-items-center p-5">
        <span><?= $_SESSION['login']?>Login</span>
        <form action="" method="post" class="d-flex flex-column gap-3 border border-2 p-3">
            <input type="text" name="username_login" class="border border-2 border-dark rounded rounded-5 ps-2 pb-2 pt-2">
            <div class="password-container d-flex border border-2 border-dark border border-1 rounded rounded-5 ps-2 overflow-hidden">
                <input type="password" name="password_login"class="password border-0 " id="password">
                <i class="bi bi-eye-slash-fill show-password m-2 pe-auto"></i>
            </div>
            <div class="remember-me d-flex"> 
                <input type="checkbox" name="remember" id="">
                <span class="ms-1">Remember me</span>
            </div>
           
            <button type="submit" name="login" class="outline-0 border-0 border p-2 m-auto rounded-5 w-75 bg-dark-subtle">Login</button>
            <a href="../daftar/index.php">register</a>
            <!-- <form action="" method="post">
            <input type="hidden" name="daftar" value="daftar" id="">
            <button type="submit" name="daftar">dafatr </button>
        </form> -->
        </form>
    </div>
</body>
</html>