<?php
include 'koneksi.php'; // Pastikan telah memasukkan file koneksi.php yang berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['record_id'])) {
    $record_id = $_POST['record_id'];

    // Lakukan operasi DELETE
    $sql = "DELETE FROM airforcemart WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $record_id);
    if ($stmt->execute()) {
        $stmt->close(); // Tutup pernyataan
        
        // Script JavaScript untuk menampilkan alert setelah dihapus
        echo '<script>alert("Data anda telah terhapus!"); window.location.href = "airforcemart.php";</script>';
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Tidak menerima ID data untuk dihapus.";
}
?>
