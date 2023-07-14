<?php
    include 'index.php';
    $json = filter_input(INPUT_POST,'json');
    $decoded_json = json_decode($json);
    $deskripsi = $decoded_json -> deskripsi;
    $value = $decoded_json -> value;
    $latest_saldo = (int)$latest['sisa_saldo'] - (int)$value;
    $full_date = date('d-m-y');
    mysqli_query($conn,"INSERT INTO `now` (id,num,tanggal,ket,`value`,deskripsi,sisa_saldo) VALUES (NULL,'$present','$full_date','keluar','$value','$deskripsi','$latest_saldo')");

 ?>