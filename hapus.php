<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM jadwal WHERE id='$id'");

    header("Location: dashboard.php");
?>