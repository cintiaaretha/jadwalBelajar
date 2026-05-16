<?php
    session_start();
    include 'koneksi.php';

    if(!isset($_SESSION['nama'])){
        header("Location: login.php");
        exit;
    }
    
    if(isset($_POST['tambah_jadwal'])){
        $user_id = $_SESSION['id'];
        $matkul = $_POST['matkul'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $ruangan = $_POST['ruangan'];
        $dosen = $_POST['dosen'];


        $query = mysqli_query($koneksi, "INSERT INTO jadwal (user_id, matkul, hari, jam_mulai, jam_selesai, ruangan, dosen) VALUES ('$user_id','$matkul','$hari','$jam_mulai','$jam_selesai','$ruangan', '$dosen')");

        if($query){
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
    }

    if(isset($_POST['tambah_tugas'])){
        $user_id = $_SESSION['id'];
        $jadwal_id = $_POST['jadwal_id'];
        $nama_tugas = $_POST['nama_tugas'];
        $deadline = $_POST['deadline'];
        $catatan = $_POST['catatan'];
        $status = $_POST['status'];

        if($jadwal_id == ""){
            $jadwal_id = "NULL";
        }

        $queryTugas = mysqli_query($koneksi, "INSERT INTO tugas (user_id, jadwal_id, nama_tugas, deadline, catatan, status) VALUES ('$user_id', $jadwal_id, '$nama_tugas', '$deadline', '$catatan', '$status')");

        if($queryTugas){
            echo "<script>
                    alert('Tugas berhasil ditambahkan!');
                    window.location='dashboard.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal: ". mysqli_error($koneksi) ."');
                  </script>";
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

    .main-container{
        flex: 1;
        padding: 40px 20px;
        min-height: 80vh;
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
    }

    .form-control{
        border-radius: 10px;
        padding: 10px;
    }
    
    .table{
        overflow: hidden;
        border-radius: 15px;
    }

    footer {
        background: linear-gradient(135deg, #dc02a2, #df9f30);
        color: white;
        text-align: center;
        padding: 15px;
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
                <b><?php echo $_SESSION['nama']; ?></b>
            </p>

        </div>

        <!-- Form Tambah Jadwal -->
        <div class="card p-4 mb-4 shadow-lg">
            <h4 class="mb-4 text-center">Tambah Jadwal</h4>

            <form method="POST">
                <div class="row">
                    <!-- Mata Kuliah -->
                    <div class="col-md-3 mb-3">
                        <input type="text" name="matkul" class="form-control" placeholder="Mata Kuliah" required>
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
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>

                    <!-- Jam Selesai -->
                    <div class="col-md-2 mb-3">
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>

                    <!-- Ruangan -->
                    <div class="col-md-2 mb-3">
                        <input type="text" name="ruangan" class="form-control" placeholder="Ruangan" required>
                    </div>

                    <!-- Dosen -->
                    <div class="col-md-1 mb-3">
                        <input type="text" name="dosen" class="form-control" placeholder="Dosen" required>
                    </div>

                    <!-- Button -->
                    <div class="col-md-1 mb-3">
                        <button type="submit" name="tambah_jadwal" class="btn btn-warning w-100 btn-custom">
                            +
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Jadwal -->
        <div class="card p-4 shadow-lg">
            <h4 class="mb-4 text-center">Daftar Jadwal</h4>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
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
                            <td><?php echo $data['matkul']; ?></td>
                            <td><?php echo $data['hari']; ?></td>
                            <td><?php echo $data['jam_mulai']; ?></td>
                            <td><?php echo $data['jam_selesai']; ?></td>
                            <td><?php echo $data['ruangan']; ?></td>
                            <td><?php echo $data['dosen']; ?></td>

                            <td>
                                <a href="editJadwal.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="hapusJadwal.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus jadwal ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Form Tambah Tugas -->
        <div class="card p-4 mb-4 shadow-lg">
            <h4 class="mb-4 text-center"> Tambah Tugas </h4>

            <form method="POST">
                <div class="row">
                    <!-- MATKUL -->
                    <div class="col-md-2 mb-3">
                        <select name="jadwal_id" class="form-control">
                            <option value=""> Pilih Matkul</option>
                            <?php
                                $id_user = $_SESSION['id'];
                                $jadwal = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE user_id='$id_user'"); while($data = mysqli_fetch_assoc($jadwal)){
                            ?>
                            <option value="<?php echo $data['id']; ?>">
                                <?php echo $data['matkul']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- NAMA TUGAS -->
                    <div class="col-md-2 mb-3">
                        <input type="text" name="nama_tugas" class="form-control" placeholder="Nama Tugas"  required>
                    </div>
                    <!-- DEADLINE -->
                    <div class="col-md-2 mb-3">
                        <input type="date" name="deadline" class="form-control" required>
                    </div>
                    <!-- CATATAN -->
                    <div class="col-md-3 mb-3">
                        <input type="text" name="catatan" class="form-control" placeholder="Catatan tugas">
                    </div>
                    <!-- STATUS -->
                    <div class="col-md-2 mb-3">
                        <select name="status" class="form-control">
                            <option value="Belum"> Belum </option>
                            <option value="Selesai"> Selesai </option>
                        </select>
                    </div>
                    <!-- BUTTON -->
                    <div class="col-md-1 mb-3">
                        <button type="submit" name="tambah_tugas" class="btn btn-warning w-100 btn-custom">
                            +
                        </button>
                    </div>
                </div>
            </form>
        </div>

    <!-- TABLE TUGAS -->
<div class="card p-4 shadow-lg">
    <h4 class="mb-4 text-center">Daftar Tugas</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Nama Tugas</th>
                    <th>Deadline</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $id_user = $_SESSION['id'];
            $queryTugas = mysqli_query($koneksi, "SELECT tugas.*, jadwal.matkul FROM tugas LEFT JOIN jadwal ON tugas.jadwal_id = jadwal.id WHERE tugas.user_id='$id_user'");
            while ($data = mysqli_fetch_assoc($queryTugas)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['matkul'] ? $data['matkul'] : '-'; ?></td>
                    <td><?php echo $data['nama_tugas']; ?></td>
                    <td><?php echo $data['deadline']; ?></td>
                    <td><?php echo $data['catatan']; ?></td>
                    <td>
                        <?php if ($data['status'] == 'Selesai') { ?>
                            <span class="badge bg-success">Selesai</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">Belum</span>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="editTugas.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapusTugas.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus tugas ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

    <footer class="text-center text-lg-start" style="background: linear-gradient(135deg, #dc02a2, #df9f30);">
      <div class="text-center p-3" style="color: whitesmoke;">
        © 2026 Schedulio | Azka Nida_124250030 - Cintia Mutiara_124250032
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>