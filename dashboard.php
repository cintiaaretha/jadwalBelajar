<?php
    session_start();
    include 'koneksi.php';

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }

    if(isset($_POST['tambah'])){
        $user_id = $_SESSION['id'];
        $mapel = $_POST['mapel'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $catatan = $_POST['catatan'];

        $query = mysqli_query($koneksi, "INSERT INTO jadwal (user_id, mapel, hari, jam_mulai, jam_selesai, catatan) VALUES ('$user_id','$mapel','$hari','$jam_mulai','$jam_selesai','$catatan')");

        if($query){
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
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
            background-image: url('img/background.gif');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container main-container">
        <!-- Header -->
        <div class="header">
            <h1>Jadwal Belajar</h1>
            <p class="mb-0">
                Selamat datang,
                <b><?php echo $_SESSION['username']; ?></b>
            </p>

        </div>

        <!-- Form Tambah Jadwal -->
        <div class="card p-4 mb-4 shadow-lg">
            <h4 class="mb-4 text-center">Tambah Jadwal</h4>

            <form method="POST">
                <div class="row">
                    <!-- Mata Pelajaran -->
                    <div class="col-md-3 mb-3">
                        <input type="text" name="mapel" class="form-control" placeholder="Mata Pelajaran">
                    </div>

                    <!-- Hari -->
                    <div class="col-md-2 mb-3">
                        <select name="hari" class="form-control" required>
                            <option value="" selected disabled>Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <!-- Jam Mulai -->
                    <div class="col-md-2 mb-3">
                        <input type="time" name="jam_mulai" class="form-control">
                    </div>

                    <!-- Jam Selesai -->
                    <div class="col-md-2 mb-3">
                        <input type="time" name="jam_selesai" class="form-control">
                    </div>

                    <!-- Catatan -->
                    <div class="col-md-2 mb-3">
                        <input type="text" name="catatan" class="form-control" placeholder="Catatan">
                    </div>

                    <!-- Button -->
                    <div class="col-md-1 mb-3">
                        <button type="submit" name="tambah" class="btn btn-warning w-100 btn-custom">
                            +
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="card p-4 shadow-lg">
            <h4 class="mb-4 text-center">Daftar Jadwal</h4>

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
                        <?php
                            $no = 1;
                            $id_user = $_SESSION['id'];
                            $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE user_id='$id_user'"); while($data = mysqli_fetch_assoc($query)){
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['mapel']; ?></td>
                            <td><?php echo $data['hari']; ?></td>
                            <td><?php echo $data['jam_mulai']; ?></td>
                            <td><?php echo $data['jam_selesai']; ?></td>
                            <td><?php echo $data['catatan']; ?></td>

                            <td>
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus jadwal ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
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