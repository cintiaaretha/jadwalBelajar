<<<<<<< HEAD
<?php
session_start();
include 'koneksi.php';

$error = '';
$berhasil = '';

if(isset($_POST['regis'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

    if(mysqli_num_rows($cek) > 0){
        $error = "Username suda terdaftar!";
    } else {
        $query = "INSERT INTO pengguna (username, password) VALUES ('$username', '$password')";
        if(mysqli_query($koneksi, $query)){
            $berhasil = "Pendaftaran berhasil! Silahkan login.";
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($koneksi);
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        html, body{
            height: 100%;
            margin: 0;
        }
        body{
            background-image: ;
            background-size: cover;
            background-position: center;
            background-repeat: flex;
            flex-direction: column;
        }
        .navbar{
            background: linear-gradient();
        }
        
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
=======
<?php
session_start();
include 'koneksi.php';

$error = '';
$berhasil = '';

if(isset($_POST['regis'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

    if(mysqli_num_rows($cek) > 0){
        $error = "Username suda terdaftar!";
    } else {
        $query = "INSERT INTO pengguna (username, password) VALUES ('$username', '$password')";
        if(mysqli_query($koneksi, $query)){
            $berhasil = "Pendaftaran berhasil! Silahkan login.";
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($koneksi);
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        html, body{
            height: 100%;
            margin: 0;
        }
        body{
            background-image: ;
            background-size: cover;
            background-position: center;
            background-repeat: flex;
            flex-direction: column;
        }
        .navbar{
            background: linear-gradient();
        }
        
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
>>>>>>> e8c965872093191a0b80ca5b4141f39705af01f3
</html>