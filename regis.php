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
        html, body{
            height: 100%;
            margin: 0;
        }

        body{
            background-image: url('img/background.gif');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, #dc02a2, #df9f30);
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
        }

        .nav-link {
            color: white;
        }

        .main-content{
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-card{
            width: 100%;
            max-width: 450px;
            border: none;
            border-radius: 20px;
        }


        .register-title{
            font-weight: bold;
            color: #dc02a2;
        }

        .form-control{
            border-radius: 10px;
            padding: 10px;
        }
        
        .btn-register{
            border-radius: 10px;
            font-weight: bold;
            padding: 10px;
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
            <br><a class="text-center" href="login.php">Sudah punya akun? Login sekarang</a>
        </div>
    </div>

    <footer class="text-center text-lg-start" style="background: linear-gradient(135deg, #dc02a2, #df9f30)">
      <div class="text-center p-3" style="color: whitesmoke;">
        © 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>