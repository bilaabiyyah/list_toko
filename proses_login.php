<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "datacenter";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("location: home.php");
} else {
    header("location: login.php?error=1");
}
mysqli_close($koneksi);
?>
