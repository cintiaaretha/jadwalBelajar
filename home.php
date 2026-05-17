<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulio: Home</title>
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
        .navbar.scrolled {
            background: linear-gradient(135deg, #dc02a2, #df9f30);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
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
        .nav-link {
            color: white;
        }
        .hero {
            padding: 120px 20px;
            text-align: center;
            background: url('img/bghome.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero .container {
            width: 100%;
        }

        .hero h1 {
            font-size: 55px;
            font-weight: bold;
        }

        .hero p {
            font-size: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
            color: #ccccdf;
        }
        .card {
            border: none;
            border-radius: 20px;
        }

        .feature-icon {
            font-size: 50px;
            color: #161f70;
        }

        .logo-circle {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            margin: auto;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 45px;
            color: #161f70;
            margin-bottom: 20px;
        }

        .about-img {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .about-text h3 {
            color: #161f70;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-text p {
            font-size: 17px;
            line-height: 1.8;
            color: #161f70;
            text-align: justify;
        }
        .about-section {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 20px 0;
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
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Features</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark px-3 ms-2" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="logo-circle">
                <i class="bi bi-journal-check"></i>
            </div>

            <h1>Schedulio</h1>
            <p>
                Website manajemen jadwal belajar yang dirancang untuk membantu mahasiswa <br> mengatur waktu belajar agar lebih terstruktur dan efisien.
            </p>

            <a href="regis.php" class="btn btn-warning btn-lg mt-3">Mulai Sekarang</a>
        </div>
    </section>

    <!-- About Us -->
    <section class="container py-5" id="about">
    <h2 class="section-title">About Us</h2>
    <div class="about-section">
        <div class="row align-items-center justify-content-center g-5">
            <div class="col-md-5 text-center">
                <img src="img/kalender2.jpeg" class="about-img">
            </div>
            <div class="col-md-6 about-text">
                <h3>Belajar Lebih Teratur</h3>
                <p>
                    Schedulio dibuat untuk membantu mahasiswa mengatur
                    jadwal dan aktivitas akademik dengan lebih mudah. Dengan tampilan sederhana dan fitur yang praktis, pengguna dapat mengelola waktu belajar secara efektif.
                </p>
                <p>
                    Kesuksesan tidak datang secara instan, melainkan terbentuk dari usaha-usaha kecil yang dilakukan secara konsisten setiap hari. Melalui website pengelola jadwal belajar ini, mahasiswa diharapkan dapat membangun kebiasaan belajar yang lebih teratur, disiplin, dan produktif agar tujuan akademik dapat tercapai dengan lebih baik.
                </p>
            </div>
        </div>
    </div>
    </section>

    <!-- Features -->
    <section class="container py-5" id="fitur">
        <h2 class="section-title">Features</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow p-4 text-center h-100">
                    <i class="bi bi-calendar2-heart feature-icon"></i>
                    <h4 class="mt-3">Manage Schedule</h4>
                    <p>
                        Tambah, edit, dan hapus jadwal belajar dengan mudah.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 text-center h-100">
                    <i class="bi bi-clock-history feature-icon"></i>
                    <h4 class="mt-3">Time Management</h4>
                    <p>
                        Membantu mengatur waktu belajar agar lebih produktif.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 text-center h-100">
                    <i class="bi bi-person-lock feature-icon"></i>
                    <h4 class="mt-3">Secure Login</h4>
                    <p>
                        Data jadwal tersimpan dengan sistem login pengguna.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center text-lg-start" style="background: linear-gradient(135deg,  #140a7e, #8489cc)">
      <div class="text-center" style="color: whitesmoke;">
        © 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>