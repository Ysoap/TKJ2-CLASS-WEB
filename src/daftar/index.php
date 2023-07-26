<?php 
   
    require "../../koneksi.php";
    session_start();
    if (isset($_SESSION['login'])) {
        header('Location: ../user/index.php');
    }
    if(!isset($_SESSION['user-profile-input']));
    if (isset($_POST['username-register'])) {
        register();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="../../jquery-3.6.4.min.js"></script>
    <script src="script.js" defer></script>
    <title>Document</title>
</head>
<body>
<div class="container d-flex flex-column border border-2 justify-content-center align-items-center p-5">
        <span>Daftar</span>
        <form action="" method="post" class="d-flex flex-column gap-3 border border-2 p-4 rounded rounded-4 ">
            <label for="username_register">username</label>
            <input type="text" name="username_register" id="username_register" required class="border border-1 border-dark rounded rounded-5 ps-2 pb-2 pt-2">
            <label for="password_register">password</label>
            <div class="password-register-container d-flex border border-1 rounded rounded-5">
                <input type="password" name="password_register" id="password_register"class="password ps-2" required>
                <i class="bi bi-eye-slash-fill show-password m-2 pe-auto"></i>
            </div>
            <label for="password_register_repeat">konfirmasi password</label>
            <div class="password-register-container d-flex border border-1 rounded rounded-5 ps-2">
                <input type="password" name="password_register_repeat"id="password_register_repeat"class="password" required>
                <i class="bi bi-eye-slash-fill show-password m-2 pe-auto"></i>
            </div>
            <button type="submit" name="username-register" class=" outline-0 border-0 border p-2 m-auto rounded-4">Register</button>
            <!-- <span><a href="../login">login</a></span> -->
        </form>
        
    </div>
</body>
</html>