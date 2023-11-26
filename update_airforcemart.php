<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ip_primary = $_POST['ip_primary'];
    $idrac = $_POST['idrac'];
    $osver = $_POST['osver'];
    $server = $_POST['server'];
    $type_server = $_POST['type_server'];
    $sn = $_POST['sn'];
    $hdd = $_POST['hdd'];
    $ram = $_POST['ram'];
    $postgree = $_POST['postgree'];
    $transhello = $_POST['transhello'];
    $scale = $_POST['scale'];
    $lapor = $_POST['lapor'];
    $note = $_POST['note'];

    $sql = "UPDATE airforcemart 
            SET ip_primary = '$ip_primary',
                idrac = '$idrac',
                osver = '$osver',
                type_server = '$server',
                type_server = '$type_server',
                sn = '$sn',
                hdd = '$hdd',
                ram = '$ram',
                postgree = '$postgree',
                transhello = '$transhello',
                scale = '$scale',
                lapor = '$lapor',
                note = '$note'
                WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER["HTTP_REFERER"] . "?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}
}
$conn->close();
?>