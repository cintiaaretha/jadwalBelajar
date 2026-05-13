<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulio: Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

   <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            background-image:
            linear-gradient(rgba(0,0,0,0.4),
            rgba(0,0,0,0.4)),
            url('background2.gif');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

            font-family: Arial, sans-serif;
        }
        .navbar{
            background: linear-gradient(135deg, #dc02a2, #df9f30);
        }
        .navbar-brand{
            font-weight: bold;
            color: white !important;
        }
        .nav-link{
            color: white !important;
        }
        .main-container{
            padding: 40px 20px;
        }
        .header{
            background: linear-gradient(135deg, #dc02a2, #df9f30);
            color: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .header h2{
            font-weight: bold;
        }
        .card{
            border: none;
            border-radius: 20px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(5px);
        }
        .form-control{
            border-radius: 10px;
            padding: 10px;
        }
        select.form-control{
            height: 45px;
        }
        .form-control:focus{
            border-color: #dc02a2;
            box-shadow: 0 0 5px rgba(220,2,162,0.5);
        }
        .btn-custom{
            border-radius: 10px;
            font-weight: bold;
        }
        .table{
            overflow: hidden;
            border-radius: 15px;
        }
        .table thead{
            background: linear-gradient(135deg, #dc02a2, #df9f30);
            color: white;
        }
        .table-hover tbody tr:hover{
            background-color: rgba(220,2,162,0.08);
        }
        footer{
            background: linear-gradient(135deg, #dc02a2, #df9f30);
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">

        <div class="container">
            <a class="navbar-brand" href=""><i class="bi bi-book-half">Schedulio</i></a>

            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Dashboard
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="conainer main-container">
        <div class="header">
            <h2>Jadwal Belajar</h2>
            <p class="mb-0">Selamat datang, <b><?php echo $_SESSION['username']; ?></b>
            </p>
        </div>

        <div class="card p-4 mb-4 shadow-lg">
            <h4>class="mb-4 text-center">
            Tambah Jadwal</h4>

            <form action="#">
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="text" class="form-control" placeholder="Mata Pelajaran">
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <select class="form-control">
                            <option selected disabled>
                                Pilih Hari
                            </option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                    <input type="time"
                           class="form-control">
                    </div>

                    <!-- Jam Selesai -->
                    <div class="col-md-2 mb-3">
                    <input type="time"
                           class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Catatan">
                    </div>

                    <div class="col-md-1 mb-3">

                    <button type="submit"
                            class="btn btn-warning w-100 btn-custom">

                        +
                    </button>
                    </div>
                </div> 
            </form>
        </div>

        <div class="card p-4 shadow-lg">
        <h4 class="mb-4 text-center">
            Daftar Jadwal
        </h4>

        <div class="table-responsive">

            <table class="table table-bordered table-hover text-center align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Hari</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Algoritma dan Struktur Data</td>
                        <td>Senin</td>
                        <td>08:00</td>
                        <td>10:00</td>
                        <td>Belajar array dan linked list</td>

                        <td>
                            <a href="edit.php?id=1"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus.php?id=1"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin mau hapus jadwal ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manajemen Basis Data</td>
                        <td>Kamis</td>
                        <td>13:00</td>
                        <td>15:00</td>
                        <td>Belajar ERD dan relasi tabel</td>
                        <td>
                            <a href="edit.php?id=2"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="hapus.php?id=2"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin mau hapus jadwal ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>
    <footer>
        <p>© 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>