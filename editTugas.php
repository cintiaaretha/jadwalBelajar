<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tugas WHERE id='$id'"));

if(isset($_POST['update'])){
    $jadwal_id = $_POST['jadwal_id'];
    $nama_tugas = $_POST['nama_tugas'];
    $deadline = $_POST['deadline'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];

    $update = mysqli_query($koneksi, "UPDATE tugas SET
        jadwal_id='$jadwal_id',
        nama_tugas='$nama_tugas',
        deadline='$deadline',
        catatan='$catatan',
        status='$status'
        WHERE id='$id'
    ");

    if($update){
        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulio: Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="img/book.png" />
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
            border-radius: 20px;
            text-align: center;
            margin: 0 auto 30px auto;
            padding: 30px;
            max-width: 750px;
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

       .edit-card{
            max-width: 750px;
            border-radius: 15px;
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
                        <a class="nav-link active" href="#">Edit Tugas</a>
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
                Sesuaikan tugas yang telah diberikan.
            </p>
        </div>

        <!-- Card Edit -->
        <div class="card p-4 shadow-lg mx-auto edit-card">
            <h4 class="mb-2 text-center">Form Edit Tugas</h4>

            <form method="POST">
            <!-- Tambahkan dropdown pilih mata kuliah -->
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="jadwal_id" class="form-control" required>
                        <?php
                        $jadwal = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE user_id='".$_SESSION['id']."'");
                        while($j = mysqli_fetch_assoc($jadwal)){
                            $selected = ($j['id'] == $data['jadwal_id']) ? 'selected' : '';
                            echo "<option value='".$j['id']."' $selected>".$j['matkul']."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Tugas</label>
                    <input type="text" name="nama_tugas" class="form-control" placeholder="Masukkan nama tugas" value="<?= $data['nama_tugas']; ?>" required>
                </div>

                <div class="mb-3">
                    <input type="date" name="deadline" class="form-control" value="<?= $data['deadline']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <input type="text" name="catatan" class="form-control" placeholder="Masukkan catatan tugas" value="<?= $data['catatan']; ?>">
                </div>
                   
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Belum"<?= ($data['status']=='Belum') ? 'selected' : ''; ?>>Belum</option>
                        <option value="Selesai"<?= ($data['status']=='Selesai') ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-warning w-100 btn-custom">
                    Update Tugas
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