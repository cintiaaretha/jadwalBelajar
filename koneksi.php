<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $file = "jadwalbelajar";

    $koneksi = mysqli_connect($host, $username, $password, $file);

    if(!$koneksi){
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>