<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tugas WHERE id='$id'");

    header("Location: dashboard.php");
?>