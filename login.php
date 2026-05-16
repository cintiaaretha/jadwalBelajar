<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($cek) > 0){
        $data = mysqli_fetch_assoc($cek);
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id'] = $data['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulio: Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="img/kalender.png" />
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
    
    .main-content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        min-height: 80vh;
    }
    .login-card {
        width: 100%;
        max-width: 400px;
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .login-title {
        font-weight: bold;
        color: #161f70;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand"><i class="bi bi-book-half"></i> Schedulio</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <div class="main-content">
        <div class="card login-card shadow-lg p-4">
            <h2 class="text-center mb-4 login-title">LOGIN</h2>

            <?php
            if(isset($error)){
                echo "<div class='alert alert-danger text-center'>$error</div>";
            }
            ?>

            <form method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" name="login" class="btn btn-warning w-100 btn-login">
                    Login
                </button>
            </form>
            <br><a class="text-center" href="regis.php">Belum punya akun? Register sekarang!</a>
        </div>
    </div>

    <footer class="text-center text-lg-start">
      <div class="text-center" style="color: whitesmoke;">
        © 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>