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
            // $result = mysqli_query($conn,"SELECT username FROM `loginNonAdmin` WHERE username='$username'");
            // if ($result) {
            //    echo "<script> alert('username anda sudah ada')</script>";
            //    return false;
            // }
            

            //check the username
            // $username_check =  mysqli_query($conn, "SELECT * FROM `login` WHERE username='$username'");
            // if(mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `login` WHERE username='$username'"))){
            //     echo " <script> alert('Username sudah ada') </script>";
            //     return false;
            // }
            if ($password != $password_repeat) {
                echo " <script> alert('sandi tidak sama') </script>";
                return false;
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $_SESSION['username-from-register'] = $username;
            $_SESSION['password-from-register'] = $password;
            $_SESSION['password-from-register-repeat'];
            $_SESSION['otp'] = true;
            // echo $_SESSION['username-from-register'];
            header("Location: otp/index.php");
        // }
}
function otp(){
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    if (isset($_POST['submit-otp'])) {
        $nomor = mysqli_escape_string($conn, $_POST['nomor']);
        if ($nomor) {
            if (!mysqli_query($conn, "DELETE FROM otp WHERE nomor = $nomor")) {
                echo ("Error description: " . mysqli_error($conn));
            }
            $curl = curl_init();
            $otp = rand(100000, 999999);
            $waktu = time();
            mysqli_query($conn, "INSERT INTO `otp` (id,nomor,otp,waktu) VALUES (NULL,'$nomor','$otp','$waktu')");
            $data = [
                'target' => $nomor,
                'message' => "Your OTP : " . $otp
            ];
    
            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: DRVHa3T9LhkBQ!nJw9oV",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
        }
    } elseif (isset($_POST['submit-login'])) {
        $otp = $_POST['otp'];
        $nomor = $_POST['nomor'];
        var_dump($otp);
        var_dump($nomor);
        $q = mysqli_query($conn, "SELECT * FROM otp WHERE otp=$otp");
        $q = mysqli_query($conn, "SELECT * FROM otp WHERE nomor=$nomor AND otp=$otp");
        $row = mysqli_num_rows($q);
        $r = mysqli_fetch_array($q);
        var_dump($r);
        if ($row) {
            if (time() - $r['waktu'] <= 300) {
                $_SESSION['user-profile-input'] = true;
                header('Location: ../user-profile-input/index.php');
            } else {
                echo "otp expired";
            }
        } else {
            echo "otp salah";
        }
        // echo "$q";
    }
    
}
//submit data saat pertama kali daftar
function first_data_add(){
    global $conn;
    $username = $_SESSION['username-from-register'];
    $password = $_SESSION['password-from-register'];
    mysqli_query($conn, "INSERT INTO `login` (id,username,`password`,`admin`) VALUES (NULL,'$username','$password','0')");
    //insert absensi
    mysqli_query($conn, "INSERT INTO `absensi` (id,username,sakit,izin,alpha,bulan) VALUES 
            (NULL,'$username',0,0,0,'juni'),
            (NULL,'$username',0,0,0,'juli'),
            (NULL,'$username',0,0,0,'agustus'),
            (NULL,'$username',0,0,0,'september'),
            (NULL,'$username',0,0,0,'oktober'),
            (NULL,'$username',0,0,0,'novemver'),
            (NULL,'$username',0,0,0,'desember')
            ");
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
        echo "<script>alert('yang anda upload kelebihan mb')</script>";
        return false;
    }
    move_uploaded_file($tmp,'../../../img/profile-picture/'.$Profilepicturename);
    $username_input = $_SESSION['username-from-register'];
    mysqli_query($conn, "INSERT INTO SISWA (id, nama, nisn, `no absen`, `tanggal lahir`, absensi, `no hp`, alamat, `profile-pic`, username) VALUES (NULL, '$nama', '$nisn', '$noabsen', '$tanggallahir', '$absensi', '$nohp', '$alamat','$Profilepicturename', '$username_input');");
    $_SESSION["login"] = true;
    $_SESSION["nama"] = $nama;
    unset($_SESSION['password-from-register'] );
    unset($_SESSION['otp'] );
    unset($_SESSION['user-profile-input'] );
    header('Location: ../../user/index.php');
}
//login
function login(){
        global $conn;
        $username = $_POST["username_login"];
        $password = $_POST["password_login"];
        $data_login = mysqli_query($conn,"SELECT * FROM `login` WHERE username='$username'");
        if (!$data_login) {
            echo '<scrtipt> user tidak ditemukan </script>';
        }
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

?>  
