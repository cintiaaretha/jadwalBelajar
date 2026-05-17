<?php
session_start();
include 'koneksi.php';

$error = '';
$berhasil = '';

if(isset($_POST['regis'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $cek_nama = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama = '$nama'");
    $cek_email = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$email'");

    if(mysqli_num_rows($cek_nama) > 0){
        $error = "Nama sudah terdaftar!";
    }
    else if(mysqli_num_rows($cek_email) > 0){
        $error = "Email sudah terdaftar!";
    }
    else if($password != $confirm_password){
        $error = "Password dan Konfirmasi Password tidak cocok!";
    }
    else {
        $query = "INSERT INTO pengguna (nama, email, password) VALUES ('$nama', '$email', '$password')";
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
    <title>Schedulio: Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="img/book.png" />
    <style>
    body {
        background: url('img/bghome.jpeg') no-repeat center center fixed;
        background-size: cover;
        background-color: rgb(150, 158, 209);
        padding-top: 70px;
    }
    .navbar {
        background: linear-gradient(135deg, #140a7e, #8489cc);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }
    .navbar-brand, .nav-link {
        font-weight: bold;
        color: white;
    }
    footer {
        background: linear-gradient(135deg, #140a7e, #8489cc);
        color: white;
        text-align: center;
        padding: 15px;
        margin-top: 40px;
    }
    .form-control {
        border-radius: 10px;
        padding: 10px;
        border: 1px solid #ddd;
    }
    .form-control:focus {
        border-color: #140a7e;
        outline: none;
        box-shadow: 0 0 5px rgba(20,10,126,0.3);
    }
    .btn-warning, .btn-login, .btn-register, .btn-custom {
        background-color: #161f70;
        border: none;
        color: white;
    }
    .btn-warning:hover, .btn-login:hover, .btn-register:hover, .btn-custom:hover {
        background-color: #0e1340;
    }
        .main-content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        min-height: 80vh;
    }
    .register-card {
        width: 100%;
        max-width: 450px;
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .register-title {
        font-weight: bold;
        color: #161f70;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php"><i class="bi bi-book-half"></i> Schedulio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link active" href="register.php">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="card register-card shadow-lg p-4">
            <h2 class="text-center mb-4 register-title">DAFTAR AKUN</h2>

            <?php if($error != ''): ?>
                <div class="alert alert-danger text-center"><?php echo $error;?></div>
            <?php endif; ?>
            <?php if($berhasil != ''): ?>
                <div class="alert alert-success text-center"><?php echo $berhasil;?></div>
            <?php endif; ?>

            <form action="regis.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" name="regis" class="btn btn-warning w-100 btn-register">Daftar</button>
            </form>
            <br><a class="text-center" href="login.php">Sudah punya akun? Login sekarang!</a>
        </div>
    </div>

    <footer class="text-center text-lg-start" style="background: linear-gradient(135deg,  #140a7e, #8489cc)">
      <div class="text-center p-3" style="color: whitesmoke;">
        © 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>