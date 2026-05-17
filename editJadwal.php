<?php
    session_start();
    include 'koneksi.php';

    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id='$id'"));

    if(isset($_POST['update'])){
        $matkul = $_POST['matkul'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $ruangan = $_POST['ruangan'];
        $dosen = $_POST['dosen'];

        mysqli_query($koneksi, "UPDATE jadwal SET
            matkul='$matkul',
            hari='$hari',
            jam_mulai='$jam_mulai',
            jam_selesai='$jam_selesai',
            ruangan='$ruangan',
            dosen='$dosen'
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
    .main-container {
    padding: 40px 20px;
    }
    .header {
        background: linear-gradient(135deg, #140a7e, #8489cc);
        color: white;
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 30px;
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
    }
    .header h2 { font-weight: bold; }
    .card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .edit-card {
        max-width: 750px;
        margin: 0 auto;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #333;
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
        <div class="card p-4 shadow-lg mx-auto edit-card">
            <h4 class="mb-2 text-center">Form Edit Jadwal</h4>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <input type="text" name="matkul" class="form-control" placeholder="Masukkan mata pelajaran" value="<?= $data['matkul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-control" required>
                        <option value="Senin" <?= ($data['hari']=='Senin') ? 'selected' : ''; ?>>Senin</option>
                        <option value="Selasa" <?= ($data['hari']=='Selasa') ? 'selected' : ''; ?>>Selasa</option>
                        <option value="Rabu" <?= ($data['hari']=='Rabu') ? 'selected' : ''; ?>>Rabu</option>
                        <option value="Kamis" <?= ($data['hari']=='Kamis') ? 'selected' : ''; ?>>Kamis</option>
                        <option value="Jumat" <?= ($data['hari']=='Jumat') ? 'selected' : ''; ?>>Jumat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" value="<?= $data['jam_mulai']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" value="<?= $data['jam_selesai']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ruangan</label>
                    <input type="text" name="ruangan" class="form-control" placeholder="Masukkan ruangan" value="<?= $data['ruangan']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Dosen</label>
                    <input type="text" name="dosen" class="form-control" placeholder="Masukkan nama dosen" value="<?= $data['dosen']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-warning w-100 btn-custom">
                    Update Jadwal
                </button>
            </form>
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