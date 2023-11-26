<?php
include 'koneksi.php';

$id= $_POST['id'];

$query=mysqli_query($conn, "
DELETE FROM jabodetabek WHERE id='$id'
");

if ($query){
    ?>
    <script type="text/javascript">
        alert("Hapus Data Berhasil");
        window.location='jabodetabek.php';
    </script>
    <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Terjadi Kesalahan");
        window.location='jabodetabek.php';
    </script>
    <?php
}
?>
