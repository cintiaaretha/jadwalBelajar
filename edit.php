<?php
    session_start();
    include 'koneksi.php';

    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id='$id'"));

    if(isset($_POST['update'])){
        $mapel = $_POST['mapel'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $catatan = $_POST['catatan'];

        mysqli_query($koneksi, "UPDATE jadwal SET
            mapel='$mapel',
            hari='$hari',
            jam_mulai='$jam_mulai',
            jam_selesai='$jam_selesai',
            catatan='$catatan'
            WHERE id='$id'
        ");

        header("Location: dashboard.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulio: Edit</title>
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
            background-image: url('img/background.gif');
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

        .form-control:focus{
            border-color: #dc02a2;
            box-shadow: 0 0 5px rgba(220,2,162,0.5);
        }

        .btn-custom{
            border-radius: 10px;
            font-weight: bold;
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
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Edit Jadwal</a>
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
        <div class="header">
            <h2>Edit Jadwal</h2>
            <p class="mb-0">
                Sesuaikan jadwalmu yang sesungguhnya.
            </p>
        </div>

        <!-- Card Edit -->
        <div class="card p-4 shadow-lg">
            <h4 class="mb-4 text-center">Form Edit Jadwal</h4>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="<?= $data['mapel']; ?>" placeholder="Masukkan mata pelajaran" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-control" value="<?= $data['hari']; ?>" required>
                        <option <?= ($data['hari']=='Senin') ? 'selected' : ''; ?>>Senin</option>
                        <option <?= ($data['hari']=='Selasa') ? 'selected' : ''; ?>>Selasa</option>
                        <option <?= ($data['hari']=='Rabu') ? 'selected' : ''; ?>>Rabu</option>
                        <option <?= ($data['hari']=='Kamis') ? 'selected' : ''; ?>>Kamis</option>
                        <option <?= ($data['hari']=='Jumat') ? 'selected' : ''; ?>>Jumat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" name="mulai" class="form-control" value="<?= $data['jam_mulai']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" name="selesai" class="form-control" value="<?= $data['jam_selesai']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" placeholder="Tambahkan catatan belajar" rows="4"><?= $data['catatan']; ?>></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-warning w-100 btn-custom">
                    Update Jadwal
                </button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>