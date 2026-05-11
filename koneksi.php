<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "jadwalbelajar";

$konek = new mysqli ($hostname, $username, $password, $database);

if ($koneksi -> connect_error) {
    die('Maaf koneksi gagal: ' . $koneksi->connect_error);
}
?>