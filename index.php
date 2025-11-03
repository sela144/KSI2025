<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa - KSI 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #c2e9fb, #e2f0cb);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .card-header {
      background: linear-gradient(90deg, #00c6ff, #0072ff);
      border: none;
    }
    .card-header h3 {
      font-weight: 600;
      color: #fff;
    }
    table {
      border-radius: 10px;
      overflow: hidden;
    }
    th {
      background-color: #0072ff !important;
      color: white !important;
    }
    .btn-custom {
      border-radius: 30px;
      font-size: 14px;
      padding: 6px 14px;
      transition: 0.3s ease;
    }
    .btn-warning {
      background-color: #4fd2f3ff;
      border: none;
      color: #fff;
    }
    .btn-warning:hover {
      background-color: #11e9deff;
    }
    .btn-danger {
      background-color: #f70b13ff;
      border: none;
    }
    .btn-danger:hover {
      background-color: #e03e44;
    }
    .btn-success {
      background-color: #38b000;
      border: none;
    }
    .btn-success:hover {
      background-color: #2a8500;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header text-center py-3">
        <h3>📋 Data Mahasiswa</h3>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="mt-2 text-secondary">Daftar Mahasiswa Terdaftar</h5>
          <a href="tambah.php" class="btn btn-success btn-custom">➕ Tambah Data</a>
        </div>

        <table class="table table-striped table-hover text-center align-middle">
          <thead>
            <tr>
              <th>No</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Jurusan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                echo "
                  <tr>
                    <td>{$no}</td>
                    <td>{$row['npm']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>
                      <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm btn-custom'>✏️ Edit</a>
                      <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm btn-custom'>🗑️ Hapus</a>
                    </td>
                  </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='6' class='text-muted'>Belum ada data mahasiswa</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
