<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $bo_host = $_POST['bo_host'];
    $bo_type = $_POST['bo_type'];
    $bo_brand = $_POST['bo_brand'];
    $bo_os = $_POST['bo_os'];
    $bo_osver = $_POST['bo_osver'];
    $bo_idrac = $_POST['bo_idrac'];
    $bo_passidrac = $_POST['bo_passidrac'];
    $bo_versidrac = $_POST['bo_versidrac'];
    $bo_sn = $_POST['bo_sn'];
    $bo_warranty = $_POST['bo_warranty'];
    $bo_hdd = $_POST['bo_hdd'];
    $bo_avail = $_POST['bo_avail'];
    $bo_ram = $_POST['bo_ram'];
    $bo_rodc = $_POST['bo_rodc'];
    $bo_vfs = $_POST['bo_vfs'];
    $bo_lapor = $_POST['bo_lapor'];
    $bo_scale = $_POST['bo_scale'];
    $bo_osscale = $_POST['bo_osscale'];
    $bo_ems = $_POST['bo_ems'];
    $bo_tcs = $_POST['bo_tcs'];
    $bo_jaguar = $_POST['bo_jaguar'];
    $ps_host = $_POST['ps_host'];
    $ps_type = $_POST['ps_type'];
    $ps_brand = $_POST['ps_brand'];
    $ps_os = $_POST['ps_os'];
    $ps_osver = $_POST['ps_osver'];
    $ps_idrac = $_POST['ps_idrac'];
    $ps_passidrac = $_POST['ps_passidrac'];
    $ps_versidrac = $_POST['ps_versidrac'];
    $ps_sn = $_POST['ps_sn'];
    $ps_warranty = $_POST['ps_warranty'];
    $ps_hdd = $_POST['ps_hdd'];
    $ps_avail = $_POST['ps_avail'];
    $ps_ram = $_POST['ps_ram'];
    $ps_postgres = $_POST['ps_postgres'];
    $ps_transhello = $_POST['ps_transhello'];
    $ps_tvs = $_POST['ps_tvs'];
    $ps_smartsales = $_POST['ps_smartsales'];
    $ps_postdeptstore = $_POST['ps_postdeptstore'];
    $bs_host = $_POST['bs_host'];
    $bs_type = $_POST['bs_type'];
    $bs_brand = $_POST['bs_brand'];
    $bs_os = $_POST['bs_os'];
    $bs_osver = $_POST['bs_osver'];
    $bs_idrac = $_POST['bs_idrac'];
    $bs_passidrac = $_POST['bs_passidrac'];
    $bs_versidrac = $_POST['bs_versidrac'];
    $bs_sn = $_POST['bs_sn'];
    $bs_warranty = $_POST['bs_warranty'];
    $bs_hdd = $_POST['bs_hdd'];
    $bs_avail = $_POST['bs_avail'];
    $bs_ram = $_POST['bs_ram'];

    $sql = "UPDATE luar_jabodetabek 
            SET bo_host = '$bo_host',
                bo_type = '$bo_type',
                bo_brand = '$bo_brand',
                bo_os = '$bo_os',
                bo_osver = '$bo_osver',
                bo_idrac = '$bo_idrac',
                bo_passidrac = '$bo_passidrac',
                bo_versidrac = '$bo_versidrac',
                bo_sn = '$bo_sn',
                bo_warranty = '$bo_warranty',
                bo_hdd = '$bo_hdd',
                bo_avail = '$bo_avail',
                bo_ram = '$bo_ram',
                bo_rodc = '$bo_rodc',
                bo_vfs = '$bo_vfs',
                bo_lapor = '$bo_lapor',
                bo_scale = '$bo_scale',
                bo_osscale = '$bo_osscale',
                bo_ems = '$bo_ems',
                bo_tcs = '$bo_tcs',
                bo_jaguar = '$bo_jaguar',
                ps_host = '$ps_host',
                ps_type = '$ps_type',
                ps_brand = '$ps_brand',
                ps_os = '$ps_os',
                ps_osver = '$ps_osver',
                ps_idrac = '$ps_idrac',
                ps_passidrac = '$ps_passidrac',
                ps_versidrac = '$ps_versidrac',
                ps_sn = '$ps_sn',
                ps_warranty = '$ps_warranty',
                ps_hdd = '$ps_hdd',
                ps_avail = '$ps_avail',
                ps_ram = '$ps_ram',
                ps_postgres = '$ps_postgres',
                ps_transhello = '$ps_transhello',
                ps_tvs = '$ps_tvs',
                ps_smartsales = '$ps_smartsales',
                ps_postdeptstore = '$ps_postdeptstore',
                bs_host = '$bs_host',
                bs_type = '$bs_type',
                bs_brand = '$bs_brand',
                bs_os = '$bs_os',
                bs_osver = '$bs_osver',
                bs_idrac = '$bs_idrac',
                bs_passidrac = '$bs_passidrac',
                bs_versidrac = '$bs_versidrac',
                bs_sn = '$bs_sn',
                bs_warranty = '$bs_warranty',
                bs_hdd = '$bs_hdd',
                bs_avail = '$bs_avail',
                bs_ram = '$bs_ram',
                bs_post_backup = 'bs_post_backup',
                bs_backup_pc = 'bs_backup_pc'
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

