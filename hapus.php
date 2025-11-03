<?php
include 'db.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
  echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
  exit;
}

// Ambil data mahasiswa yang akan dihapus
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
  exit;
}

// Jika tombol konfirmasi ditekan
if (isset($_POST['hapus'])) {
  $delete = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
  if ($delete) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location='index.php';
          </script>";
  } else {
    echo "<script>alert('Gagal menghapus data.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Data Mahasiswa - KSI 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #dee2e6);
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border: none;
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .card-header {
      background: linear-gradient(90deg, #0ceeeeff, #39edf3ff);
      border-top-left-radius: 18px;
      border-top-right-radius: 18px;
    }
    h3 {
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    .btn-custom {
      border-radius: 30px;
      font-size: 15px;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .btn-danger {
      background-color: #f80f26ff;
      border: none;
    }
    .btn-danger:hover {
      background-color: #f71128ff;
    }
    .btn-secondary {
      background-color: #dbfd42ff;
      border: none;
    }
    .btn-secondary:hover {
      background-color: #5a6268;
    }
    .info-box {
      background-color: #fff;
      border-radius: 12px;
      padding: 15px;
      border: 1px solid #f1f1f1;
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-white text-center py-3">
        <h3>⚠️ Konfirmasi Hapus Data</h3>
      </div>
      <div class="card-body text-center">
        <div class="info-box mb-4">
          <h5>Apakah kamu yakin ingin menghapus data berikut?</h5>
          <p class="mt-3 mb-1"><strong>NPM:</strong> <?= $data['npm']; ?></p>
          <p class="mb-1"><strong>Nama:</strong> <?= $data['nama']; ?></p>
          <p class="mb-0"><strong>Program Studi:</strong> <?= $data['prodi']; ?> (<?= $data['jurusan']; ?>)</p>
        </div>

        <form method="POST">
          <a href="index.php" class="btn btn-secondary btn-custom">← Batal</a>
          <button type="submit" name="hapus" class="btn btn-danger btn-custom">🗑️ Hapus Sekarang</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
