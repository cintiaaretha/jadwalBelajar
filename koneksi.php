<?php
<<<<<<< HEAD
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "jadwalbelajar";

$konek = new mysqli ($hostname, $username, $password, $database);

if ($koneksi -> connect_error) {
    die('Maaf koneksi gagal: ' . $koneksi->connect_error);
}
=======
$host = "localhost";
$username = "root";
$password = "";
$file = "jadwalbelajar";

$koneksi = mysqli_connect($host, $username, $password, $file);
>>>>>>> e8c965872093191a0b80ca5b4141f39705af01f3
?>