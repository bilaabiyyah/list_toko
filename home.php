<?php
session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arimo&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/home.css">
<link rel="icon" href="assets/icon/favicon-home.ico" type="image/x-icon">
<title>Data center | Home</title>
</head>
<body>
    <div class="container">
    <div class="welcome-message">Your're logged in as, <?php echo $_SESSION['username']; ?>!</div>
    <div class="d-grid gap-1">
    <div class="d-grid gap-2">
  <a href="jabodetabek.php" class="btn btn-primary" role="button">List Toko Jabodetabek</a>
  <a href="luar_jabodetabek.php" class="btn btn-primary" role="button">List Toko Luar Jabodetabek</a>
  <a href="airforcemart.php" class="btn btn-primary" role="button">Airforce Mart</a>
  <a href="multimart.php" class="btn btn-primary" role="button">MultiMart</a>
</div>
</div>
<div class="copyright"><p>&copy; 2023 PT.Trans Retail Indonesia</div>
</div>

</body>
</html>
