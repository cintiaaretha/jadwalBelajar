<?php 
    session_start();
    include'koneksi.php';

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
        }else{
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

        .login-card{
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 15px;

        }

        .login-title{
            font-weight: bold;
            color: #dc02a2;
        }

        .form-control{
            border-radius: 10px;
            padding: 10px;
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