<?php
session_start();
$conn = mysqli_connect("localhost","root","","SISWA");
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    $_cresult = mysqli_query($conn,"SELECT * FROM `login` WHERE id=$id");
    $c_row = mysqli_fetch_assoc($_cresult);

    if ($key === hash("sha512",$c_row["user"]) ) {
        $_SESSION["login"] = true;
    }
}
// register
function register(){
            global $conn;
            $username = strtolower(stripslashes($_POST["username_register"])); 
            $password = mysqli_real_escape_string($conn,$_POST["password_register"]); 
            $password_repeat = mysqli_real_escape_string($conn,$_POST["password_register_repeat"]);
            $result = mysqli_query($conn,"SELECT username FROM `loginNonAdmin` WHERE username='$username'");
            // if ($result) {
            //    echo "<script> alert('username anda sudah ada')</script>";
            //    return false;
            // }
            if ($password != $password_repeat) {
                echo " <script> alert('sandi tidak sama') </script>";
                return false;
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO `login` (id,username,`password`,`admin`) VALUES (NULL,'$username','$password','0')");
            $_SESSION['username-from-register'] = $username;
            header("Location: ../user-profile-input/index.php");
        // }
}
//login
function login(){
        global $conn;
        $username = $_POST["username_login"];
        $password = $_POST["password_login"];
        $data_login = mysqli_query($conn,"SELECT * FROM `login` WHERE username='$username'");
        $result_data_login = mysqli_fetch_assoc($data_login);
        $password_db_fetch = $result_data_login['password'];

        $admin = $result_data_login['admin'];
        $verify = password_verify($password,$password_db_fetch);
        if($verify && $username == $result_data_login["username"]){
            //check if the user have admin atribute
            if ($admin === '1') {
                $_SESSION["login-admin"] = true;
                $_SESSION["login"] = false;
                header("Location: ../sidebar/index.php");

            }
            else{
                $_SESSION["login"] = true;
                $_SESSION['username-from-login'] = $username;
                header("Location: ../user/index.php");
            }
        }
}
//logout
if(isset($_POST["logout-yes"])) {
    // $_SESSION['login'] = false;
    session_destroy();
    session_unset();
    setcookie('id',false,time()-500000,"/");
    setcookie('key',false,time()-500000,"/");
    header("Location: ../login/login.php");
    exit;
}




function query($querry){
    global $conn;
    $result = mysqli_query($conn,$querry);
    $rows = [];
while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
return $rows;
}

if (isset($_POST["submit-tambah"])) {


    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $noabsen = $_POST["noabsen"];
    $umur = $_POST["umur"];
    $email = $_POST["email"]; 
    $nohp = $_POST["nohp"];
    $alamat = $_POST["alamat"];
    $querry = "INSERT INTO SISWA (id, nama, kelas, `no absen`, umur, email, `no hp`, alamat) VALUES (NULL, '$nama', '$kelas', '$noabsen', '$umur', '$email', '$nohp', '$alamat');";
    mysqli_query($conn,$querry);
    $ef = mysqli_affected_rows($conn);
    if(
        $nama === ''|| $kelas === ''
    ){
        
    }
    if ($ef > 0 ) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location = 'index.php';
      </script>";
    }

}
//hapus
if(isset($_POST['delete'])){
    $id = $_POST["id"];
    $hapus = mysqli_query($conn,"DELETE FROM SISWA WHERE id=$id");
    if($hapus){
        echo "<script>
                alert('data berhasil dihapus');
                document.location = 'index.php';
              </script>";
    }
    else{
        echo "<script>
        document.location = 'index.php';
        alert('data gagal dihapus');
      </script>";
    }
}
//update

if (isset($_POST['submit-update'])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $noabsen = $_POST["noabsen"];
    $umur = $_POST["umur"];
    $email = $_POST["email"]; 
    $nohp = $_POST["nohp"];
    $alamat = $_POST["alamat"];
    $querry = "UPDATE SISWA SET nama = '$nama', kelas= '$kelas', `no absen`= '$noabsen', umur= '$umur', email= '$email', `no hp`= '$nohp', alamat='$alamat' WHERE id = '$id';
    ";
    $update =
    mysqli_query($conn,$querry);
    if($update){
        echo "<script>
                alert('data berhasil di update');
                document.location = 'index.php';
              </script>";
    }
    else{
        echo "<script>
        alert('data gagal diupdate');
        document.location = 'index.php';
      </script>";
    }
}
//read
function read($keyword){
    global $conn;
    $result = mysqli_query($conn,"SELECT * FROM SISWA WHERE nama LIKE '%$keyword%';");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    
}
return $rows;
}


//upload
//user upload profile
// if (isset($_POST['submit-profile-user-input'])) {
//     $nama = $_FILES['img']["name"];
//     $uniqid = uniqid();
//     $type = explode('.',"$nama");
//     $type = strtolower(end($type));
//     $nama = $uniqid.'.'.$type;
//     $size = $_FILES['img']["size"];
//     $tmp  = $_FILES["img"]["tmp_name"];
//     $valid_type = ["jpg","jpeg","png"];
//     if(!in_array($type,$valid_type)){
//         echo "<script>alert('yang anda upload bukan gambar')</script>";
//         return false;
//     }
//     if ($size > 200000) {
//         echo "<script>alert('yang anda upload kelebihan mb)</script>";
//     }
    
// }
function upload(){{
    global $conn;
    $nama = $_FILES["img"]["name"];
    $uniqid = uniqid();
    $type = explode(".","$nama");
    $type = strtolower(end($type));
    $nama = $uniqid.'.'.$type;
    $size = $_FILES['img']["size"];
    $tmp  = $_FILES["img"]["tmp_name"];
    echo $nama;
    $valid_type = ["jpg","jpeg","png"];
    if(!in_array($type,$valid_type)){
        echo "hii";
        var_dump($size);
        echo 'yang ada upload bukan gambar';
        return false;
    };
    if($size > 200000){
        echo "terlalu besar";
        return false;
    };
    move_uploaded_file($tmp,"img/". $nama);
    mysqli_query($conn,"INSERT INTO img (id,img_name) VALUES (NULL,'$nama');");
    header("Location: image.php");

    $querry = mysqli_query($conn,"SELECT * FROM img");
    $rows = [];
    while($row = mysqli_fetch_assoc($querry)){
            $rows = $row;
        }
    return $rows;
};
}
if (isset($_POST["hapus_gambar"])) {
    $namafile = $_POST["img_name"];
    $hp = unlink("img/"."$namafile");
    mysqli_query($conn,"DELETE FROM img WHERE img_name='$namafile'");


}
//submit data saat pertama kali daftar
function first_data_add(){
    global $conn;
    $nama = strtoupper($_POST["nama"]); 
    $nisn = $_POST["nisn"];
    $noabsen = $_POST["noabsen"];
    $tanggallahir = $_POST["tanggallahir"];
    $absensi = $_POST["absensi"];
    $nohp = $_POST["nohp"];
    $alamat = $_POST["alamat"];

    $Profilepicturename = $_FILES['img']["name"];
    $uniqid = uniqid();
    $type = explode('.',"$Profilepicturename");
    $type = strtolower(end($type));
    $Profilepicturename = $uniqid.'.'.$type;
    $size = $_FILES['img']["size"];
    $tmp  = $_FILES["img"]["tmp_name"];
    $valid_type = ["jpg","jpeg","png"];
    if(!in_array($type,$valid_type)){
        echo "<script>alert('yang anda upload bukan gambar')</script>";
        return false;
    }
    if ($size > 200000) {
        echo "<script>alert('yang anda upload kelebihan mb)</script>";
        return false;
    }
     
    echo "$Profilepicturename";
    echo "$tmp";
    move_uploaded_file($tmp,'../../img/profile-picture'.$Profilepicturename);
    $username_input = $_SESSION['username-from-register'];
    mysqli_query($conn, "INSERT INTO SISWA (id, nama, nisn, `no absen`, `tanggal lahir`, absensi, `no hp`, alamat, `profile-pic`, username) VALUES (NULL, '$nama', '$nisn', '$noabsen', '$tanggallahir', '$absensi', '$nohp', '$alamat','$Profilepicturename', '$username_input');");
    $_SESSION["login"] = true;
    $_SESSION["nama"] = $nama;
    header('Location: ../user/index.php');
}
?>  
