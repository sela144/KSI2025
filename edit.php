<?php
include 'db.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
  echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
  exit;
}

// Ambil data mahasiswa berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
  exit;
}

// Update data
if (isset($_POST['update'])) {
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $prodi = $_POST['prodi'];
  $jurusan = $_POST['jurusan'];

  $update = mysqli_query($conn, "UPDATE mahasiswa SET 
                npm='$npm', 
                nama='$nama', 
                prodi='$prodi', 
                jurusan='$jurusan' 
              WHERE id='$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui data.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa - KSI 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #a2d9ff, #ffffff);
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .card-header {
      background: linear-gradient(90deg, #33ccff, #0099ff);
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
    }
    h3 {
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    .form-control {
      border-radius: 10px;
      border: 1px solid #cce7ff;
    }
    .form-control:focus {
      border-color: #0099ff;
      box-shadow: 0 0 8px rgba(0,153,255,0.3);
    }
    .btn-custom {
      border-radius: 30px;
      font-size: 15px;
      padding: 10px 18px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .btn-primary {
      background-color: #0099ff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #007acc;
    }
    .btn-secondary {
      background-color: #9e9e9e;
      border: none;
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-white text-center py-3">
        <h3>✏️ Edit Data Mahasiswa</h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm" value="<?= $data['npm']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $data['prodi']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $data['jurusan']; ?>" required>
          </div>

          <div class="d-flex justify-content-between">
            <a href="index.php" class="btn btn-secondary btn-custom">← Kembali</a>
            <button type="submit" name="update" class="btn btn-primary btn-custom">💾 Update Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
