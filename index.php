<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa - KSI 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white text-center">
        <h3>Data Mahasiswa</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Jurusan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['npm']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['prodi']}</td>
                        <td>{$row['jurusan']}</td>
                      </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='5' class='text-muted'>Belum ada data mahasiswa</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
