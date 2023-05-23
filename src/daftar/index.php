<?php 
   
    require "../../koneksi.php";
    if (isset($_POST['register'])) {
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
    <!-- <script src="../sidebar/side.js" defer></script> -->
    <title>Document</title>
</head>
<body>
<div class="container d-flex flex-column border border-2 justify-content-center align-items-center p-5">
        <span>Daftar</span>
        <form action="" method="post" class="d-flex flex-column gap-3 border border-2 p-4">
            <label for="username_register">username</label>
            <input type="text" name="username_register" id="username_register">
            <label for="password_register">password</label>
            <input type="password" name="password_register" id="password_register"class="password" >
            <label for="password_register_repeat">konfirmasi password</label>
            <input type="password" name="password_register_repeat"id="password_register_repeat"class="password" >
            <span class="show-password" id="i"> s</span>
            <button type="submit" name="username-register" >Login</button>
            <!-- <span><a href="../login">login</a></span> -->
        </form>
        
    </div>
</body>
</html>