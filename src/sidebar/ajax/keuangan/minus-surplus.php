<?php
    $conn = mysqli_connect("localhost","root","","SISWA");
    $json = filter_input(INPUT_POST,'json');
    $decoded_json = json_decode($json);
    $value = $decoded_json -> value;
    $id = $decoded_json -> id;
    $siswa =  mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM SISWA WHERE id = '$id';"));
    $hasil_tunggakan_akhir = (int)$siswa['surplus kas'] - (int)$value;
    mysqli_query($conn,"UPDATE SISWA SET `surplus kas` = '$hasil_tunggakan_akhir'  WHERE id = '$id';");

 ?>