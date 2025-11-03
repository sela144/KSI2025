<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .card-header {
      background: linear-gradient(90deg, #0072ff, #00c6ff);
      color: white;
      border: none;
    }
    .btn-custom {
      border-radius: 30px;
      font-size: 15px;
      padding: 8px 18px;
      transition: all 0.3s ease;
    }
    .btn-success {
      background-color: #38b000;
      border: none;
    }
    .btn-success:hover {
      background-color: #2a8500;
    }
    .btn-secondary {
      background-color: #adb5bd;
      border: none;
    }
    .btn-secondary:hover {
      background-color: #868e96;
    }
    input, select {
      border-radius: 10px !important;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card col-md-6 mx-auto">
      <div class="card-header text-center py-3">
        <h3>➕ Tambah Data Mahasiswa</h3>
      </div>
      <div class="card-body">
        <?php
        if (isset($_POST['simpan'])) {
          $npm     = $_POST['npm'];
          $nama    = $_POST['nama'];
          $prodi   = $_POST['prodi'] == 'Lainnya' ? $_POST['prodi_lainnya'] : $_POST['prodi'];
          $jurusan = $_POST['jurusan'];

          $query = mysqli_query($conn, "INSERT INTO mahasiswa (npm, nama, prodi, jurusan) VALUES ('$npm','$nama','$prodi','$jurusan')");

          if ($query) {
            echo "<div class='alert alert-success text-center'>✅ Data berhasil ditambahkan!</div>";
            echo "<meta http-equiv='refresh' content='1.5; url=index.php'>";
          } else {
            echo "<div class='alert alert-danger text-center'>❌ Gagal menambahkan data!</div>";
          }
        }
        ?>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label fw-semibold">NPM</label>
            <input type="text" name="npm" class="form-control" placeholder="Masukkan NPM" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Program Studi</label>
            <select name="prodi" id="prodi" class="form-select" required>
              <option value="">-- Pilih Program Studi --</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Manajemen Informatika">Manajemen Informatika</option>
              <option value="Lainnya">Lainnya...</option>
            </select>
          </div>
          <div class="mb-3" id="inputLainnya" style="display:none;">
            <label class="form-label fw-semibold">Program Studi (Lainnya)</label>
            <input type="text" name="prodi_lainnya" id="prodi_lainnya" class="form-control" placeholder="Masukkan Program Studi Lainnya">
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required>
          </div>
          <div class="text-center mt-4">
            <button type="submit" name="simpan" class="btn btn-success btn-custom">💾 Simpan</button>
            <a href="index.php" class="btn btn-secondary btn-custom">↩️ Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const selectProdi = document.getElementById('prodi');
    const inputLainnya = document.getElementById('inputLainnya');
    selectProdi.addEventListener('change', function() {
      if (this.value === 'Lainnya') {
        inputLainnya.style.display = 'block';
        document.getElementById('prodi_lainnya').required = true;
      } else {
        inputLainnya.style.display = 'none';
        document.getElementById('prodi_lainnya').required = false;
      }
    });
  </script>
</body>
</html>
