<?php
// proses_edit.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil data dari form edit
  $row_id = $_POST['row_id'];
  $bo_host = $_POST['bo_host'];
  // ... (Ambil semua bidang yang ingin diubah)

  // Lakukan koneksi ke database dan jalankan query UPDATE untuk mengubah data
  $conn = new mysqli("localhost", "user", "password", "nama_database");
  if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
  }

  $sql = "UPDATE jabodetabek SET bo_host = '$bo_host' WHERE id = $row_id";
  // ... (Tambahkan query untuk setiap bidang yang ingin diubah)

  if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diubah";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
