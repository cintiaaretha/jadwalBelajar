<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($konek, "DELETE FROM jadwal WHERE id='$id'");

header("Location: lihat.php");