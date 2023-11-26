<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/luar_jabodetabek.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arimo&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/luar_jabodetabek.css">
    <link rel="icon" href="assets/icon/favicon-list.ico" type="image/x-icon">
    <title>Data Center | List Luar Jabodetabek</title>
</head>

<body>
    <?php
  if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script type="text/javascript">
                window.addEventListener("DOMContentLoaded", (event) => {
                    alert("Data berhasil disimpan!");
                  });
                  </script>';
  }
  ?>
    <script>
    if (window.location.href.indexOf('?success=1') > -1) {
        var cleanURL = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, cleanURL);
    }
    </script>
    <ul class="nav nav-underline justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="jabodetabek.php">List Jabodetabek</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="luar_jabodetabek.php">List Luar Jabodetabek</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="airforcemart.php">List Airforcemart</a>
        </li>
        <li class="nav-item">
            <button id="logoutButton" class="nav-link"><i
                    class="fa-solid fa-arrow-right-from-bracket fa-lg"></i></button>
        </li>
    </ul>
    <table class="table" id="example">
        <thead class="table-warning">
            <tr>
              <th scope="col">NO</th>
                <th scope="col">INISIAL TOKO</th>
                <th scope="col">STORE CODE</th>
                <th scope="col">STORE NAME</th>
                <th scope="col">BACK OFFICE</th>
                <th scope="col">PRIMARY SERVER</th>
                <th scope="col">BACKUP SERVER</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
      $nomorUrut = 1;
      $conn = new mysqli("localhost", "root", "", "datacenter");
      if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM luar_jabodetabek";
      $result = $conn->query($sql);
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $backofficeId = 'modalBackoffice_' . $row['id']; // Membuat id unik berdasarkan ID dari database
          $primaryId = 'modalPrimaryoffice_' . $row['id']; // Membuat id unik berdasarkan ID dari database
          $backupId = 'modalBackup_' . $row['id']; // Membuat id unik berdasarkan ID dari database
          ?>
            <tr>
                        <td>
                    <?php echo $nomorUrut ; ?>
                </td>
                <td>
                    <?php echo $row['in_toko']; ?>
                </td>
                <td>
                    <?php echo $row['cd_store']; ?>
                </td>
                <td>
                    <?php echo $row['nm_store']; ?>
                </td>
                <td>
                    <!-- Modal Back Office -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#<?php echo $backofficeId; ?>">Back Office</button>
                    <div class="modal fade" id="<?php echo $backofficeId; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo $backofficeId; ?>Label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalBackofficeLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <th>Host</th>
                                            <td>
                                                <?php echo $row['bo_host']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>
                                                <?php echo $row['bo_type']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td>
                                                <?php echo $row['bo_brand']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS</th>
                                            <td>
                                                <?php echo $row['bo_os']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS Ver</th>
                                            <td>
                                                <?php echo $row['bo_osver']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Idrac</th>
                                            <td>
                                                <?php echo $row['bo_idrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Password Idrac</th>
                                            <td>
                                                <?php echo $row['bo_passidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Versi Idrac</th>
                                            <td>
                                                <?php echo $row['bo_versidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>S/N</th>
                                            <td>
                                                <?php echo $row['bo_sn']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Warranty</th>
                                            <td>
                                                <?php echo $row['bo_warranty']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>HDD</th>
                                            <td>
                                                <?php echo $row['bo_hdd']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Avail</th>
                                            <td>
                                                <?php echo $row['bo_avail']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RAM</th>
                                            <td>
                                                <?php echo $row['bo_ram']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RODC</th>
                                            <td>
                                                <?php echo $row['bo_rodc']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>VFS</th>
                                            <td>
                                                <?php echo $row['bo_vfs']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lapor</th>
                                            <td>
                                                <?php echo $row['bo_lapor']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Scale</th>
                                            <td>
                                                <?php echo $row['bo_scale']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS Scale</th>
                                            <td>
                                                <?php echo $row['bo_osscale']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>EMS</th>
                                            <td>
                                                <?php echo $row['bo_ems']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TCS</th>
                                            <td>
                                                <?php echo $row['bo_tcs']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jaguar</th>
                                            <td>
                                                <?php echo $row['bo_jaguar']; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModalBO_<?php echo $row['id']; ?>"><i
                            class="fa-solid fa-pencil"></i></button>
                    <div class="modal fade" id="editModalBO_<?php echo $row['id']; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalBOLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalBOLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="update_luar_jabodetabek.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="row mb-3">
                                            <label for="bo_host" class="col-sm-3 col-form-label">Host</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_host" name="bo_host"
                                                    value="<?php echo $row['bo_host']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_type" class="col-sm-3 col-form-label">Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_type" name="bo_type"
                                                    value="<?php echo $row['bo_type']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_brand" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_brand" name="bo_brand"
                                                    value="<?php echo $row['bo_brand']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_os" class="col-sm-3 col-form-label">OS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_os" name="bo_os"
                                                    value="<?php echo $row['bo_os']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_osver" class="col-sm-3 col-form-label">OS Ver</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_osver" name="bo_osver"
                                                    value="<?php echo $row['bo_osver']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_idrac" class="col-sm-3 col-form-label">Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_idrac" name="bo_idrac"
                                                    value="<?php echo $row['bo_idrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_passidrac" class="col-sm-3 col-form-label">Password
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_passidrac"
                                                    name="bo_passidrac" value="<?php echo $row['bo_passidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_versidrac" class="col-sm-3 col-form-label">Versi
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_versidrac"
                                                    name="bo_versidrac" value="<?php echo $row['bo_versidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_sn" class="col-sm-3 col-form-label">Serial Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_sn" name="bo_sn"
                                                    value="<?php echo $row['bo_sn']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_warranty" class="col-sm-3 col-form-label">Warranty</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_warranty"
                                                    name="bo_warranty" value="<?php echo $row['bo_warranty']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_hdd" class="col-sm-3 col-form-label">HDD</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_hdd" name="bo_hdd"
                                                    value="<?php echo $row['bo_hdd']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_avail" class="col-sm-3 col-form-label">Avail</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_avail" name="bo_avail"
                                                    value="<?php echo $row['bo_avail']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_ram" class="col-sm-3 col-form-label">RAM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_ram" name="bo_ram"
                                                    value="<?php echo $row['bo_ram']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_rodc" class="col-sm-3 col-form-label">RODC</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_rodc" name="bo_rodc"
                                                    value="<?php echo $row['bo_rodc']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_vfs" class="col-sm-3 col-form-label">VFS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_vfs" name="bo_vfs"
                                                    value="<?php echo $row['bo_vfs']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_lapor" class="col-sm-3 col-form-label">Lapor</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_lapor" name="bo_lapor"
                                                    value="<?php echo $row['bo_lapor']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_scale" class="col-sm-3 col-form-label">Scale</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_scale" name="bo_scale"
                                                    value="<?php echo $row['bo_scale']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_osscale" class="col-sm-3 col-form-label">OS SCale</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_osscale"
                                                    name="bo_osscale" value="<?php echo $row['bo_osscale']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_ems" class="col-sm-3 col-form-label">EMS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_ems" name="bo_ems"
                                                    value="<?php echo $row['bo_ems']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_tcs" class="col-sm-3 col-form-label">TCS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_tcs" name="bo_tcs"
                                                    value="<?php echo $row['bo_tcs']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bo_jaguar" class="col-sm-3 col-form-label">JAGUAR</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bo_jaguar" name="bo_jaguar"
                                                    value="<?php echo $row['bo_jaguar']; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                </td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#<?php echo $primaryId; ?>">Primary Server</button>
                    <div class="modal fade" id="<?php echo $primaryId; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo $primaryId; ?>Label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalPrimaryofficeLabel">Primary Server</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <th>Host</th>
                                            <td>
                                                <?php echo $row['ps_host']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>
                                                <?php echo $row['ps_type']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td>
                                                <?php echo $row['ps_brand']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS</th>
                                            <td>
                                                <?php echo $row['ps_os']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS Ver</th>
                                            <td>
                                                <?php echo $row['ps_osver']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Idrac</th>
                                            <td>
                                                <?php echo $row['ps_idrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Password Idrac</th>
                                            <td>
                                                <?php echo $row['ps_passidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Versi Idrac</th>
                                            <td>
                                                <?php echo $row['ps_versidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>S/N</th>
                                            <td>
                                                <?php echo $row['ps_sn']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Warranty</th>
                                            <td>
                                                <?php echo $row['ps_warranty']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>HDD</th>
                                            <td>
                                                <?php echo $row['ps_hdd']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Avail</th>
                                            <td>
                                                <?php echo $row['ps_avail']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RAM</th>
                                            <td>
                                                <?php echo $row['ps_ram']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Postgres</th>
                                            <td>
                                                <?php echo $row['ps_postgres']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Transhello</th>
                                            <td>
                                                <?php echo $row['ps_transhello']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TVS</th>
                                            <td>
                                                <?php echo $row['ps_tvs']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Smart Sales</th>
                                            <td>
                                                <?php echo $row['ps_smartsales']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Postdepstore</th>
                                            <td>
                                                <?php echo $row['ps_postdeptstore']; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModalPS_<?php echo $row['id']; ?>"><i
                            class="fa-solid fa-pencil"></i></button>
                    <div class="modal fade" id="editModalPS_<?php echo $row['id']; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalPSLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalPSLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="update_luar_jabodetabek.php">
                                        <div class="row mb-3">
                                            <label for="ps_host" class="col-sm-3 col-form-label">Host</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_host" name="ps_host"
                                                    value="<?php echo $row['ps_host']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_type" class="col-sm-3 col-form-label">Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_type" name="ps_type"
                                                    value="<?php echo $row['ps_type']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_brand" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_brand" name="ps_brand"
                                                    value="<?php echo $row['ps_brand']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_os" class="col-sm-3 col-form-label">OS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_os" name="ps_os"
                                                    value="<?php echo $row['ps_os']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_osver" class="col-sm-3 col-form-label">OS Ver</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_osver" name="ps_osver"
                                                    value="<?php echo $row['ps_osver']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_idrac" class="col-sm-3 col-form-label">Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_idrac" name="ps_idrac"
                                                    value="<?php echo $row['ps_idrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_passidrac" class="col-sm-3 col-form-label">Password
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_passidrac"
                                                    name="ps_passidrac" value="<?php echo $row['ps_passidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_versidrac" class="col-sm-3 col-form-label">Versi
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_versidrac"
                                                    name="ps_versidrac" value="<?php echo $row['ps_versidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_sn" class="col-sm-3 col-form-label">Serial Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_sn" name="ps_sn"
                                                    value="<?php echo $row['ps_sn']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_warranty" class="col-sm-3 col-form-label">Warranty</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_warranty"
                                                    name="ps_warranty" value="<?php echo $row['ps_warranty']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_hdd" class="col-sm-3 col-form-label">HDD</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_hdd" name="s_hdd"
                                                    value="<?php echo $row['ps_hdd']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_avail" class="col-sm-3 col-form-label">Avail</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_avail" name="ps_avail"
                                                    value="<?php echo $row['ps_avail']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_ram" class="col-sm-3 col-form-label">RAM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_ram" name="ps_ram"
                                                    value="<?php echo $row['ps_ram']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_postgres" class="col-sm-3 col-form-label">POSTGRESS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_postgres"
                                                    name="ps_postgres" value="<?php echo $row['ps_postgres']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_transhello"
                                                class="col-sm-3 col-form-label">TRANSHELLO</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_transhello"
                                                    name="ps_transhello" value="<?php echo $row['ps_transhello']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_tvs" class="col-sm-3 col-form-label">TVS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_tvs" name="ps_tvs"
                                                    value="<?php echo $row['ps_tvs']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_smartsales" class="col-sm-3 col-form-label">SMART
                                                SALES</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_smartsales"
                                                    name="ps_smartsales" value="<?php echo $row['ps_smartsales']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ps_postdeptstore" class="col-sm-3 col-form-label">POST
                                                DEPSTORE</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_postdeptstore"
                                                    name="ps_postdeptstore"
                                                    value="<?php echo $row['ps_postdeptstore']; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                </td>
                <td>
                    <!-- Modal Backup Server --->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#<?php echo $backupId; ?>">Backup Server</button>
                    <div class="modal fade" id="<?php echo $backupId; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo $backupId; ?>Label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalBackupLabel">Backup Server</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <th>Host</th>
                                            <td>
                                                <?php echo $row['bs_host']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>
                                                <?php echo $row['bs_type']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td>
                                                <?php echo $row['bs_brand']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS</th>
                                            <td>
                                                <?php echo $row['bs_os']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>OS Ver</th>
                                            <td>
                                                <?php echo $row['bs_osver']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Idrac</th>
                                            <td>
                                                <?php echo $row['bs_idrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Password Idrac</th>
                                            <td>
                                                <?php echo $row['bs_passidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Versi Idrac</th>
                                            <td>
                                                <?php echo $row['bs_versidrac']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>S/N</th>
                                            <td>
                                                <?php echo $row['bs_sn']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Warranty</th>
                                            <td>
                                                <?php echo $row['bs_warranty']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>HDD</th>
                                            <td>
                                                <?php echo $row['bs_hdd']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Avail</th>
                                            <td>
                                                <?php echo $row['bs_avail']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>RAM</th>
                                            <td>
                                                <?php echo $row['bs_ram']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Postgres Backup</th>
                                            <td>
                                                <?php echo $row['bs_post_backup']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Backup PC</th>
                                            <td>
                                                <?php echo $row['bs_backup_pc']; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModalBS_<?php echo $row['id']; ?>"><i
                            class="fa-solid fa-pencil"></i></button>
                    <div class="modal fade" id="editModalBS_<?php echo $row['id']; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalBSLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalBSLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="update_luar_jabodetabek.php">
                                        <div class="row mb-3">
                                            <label for="bs_host" class="col-sm-3 col-form-label">Host</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_host" name="bs_host"
                                                    value="<?php echo $row['bs_host']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_type" class="col-sm-3 col-form-label">Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ps_type" name="ps_type"
                                                    value="<?php echo $row['bs_type']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_brand" class="col-sm-3 col-form-label">Brand</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_brand" name="bs_brand"
                                                    value="<?php echo $row['bs_brand']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_os" class="col-sm-3 col-form-label">OS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_os" name="bs_os"
                                                    value="<?php echo $row['bs_os']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_osver" class="col-sm-3 col-form-label">OS Ver</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_osver" name="bs_osver"
                                                    value="<?php echo $row['bs_osver']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_idrac" class="col-sm-3 col-form-label">Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_idrac" name="bs_idrac"
                                                    value="<?php echo $row['bs_idrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_passidrac" class="col-sm-3 col-form-label">Password
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_passidrac"
                                                    name="bs_passidrac" value="<?php echo $row['bs_passidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_versidrac" class="col-sm-3 col-form-label">Versi
                                                Idrac</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_versidrac"
                                                    name="bs_versidrac" value="<?php echo $row['bs_versidrac']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_sn" class="col-sm-3 col-form-label">Serial Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_sn" name="bs_sn"
                                                    value="<?php echo $row['bs_sn']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_warranty" class="col-sm-3 col-form-label">Warranty</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_warranty"
                                                    name="bs_warranty" value="<?php echo $row['bs_warranty']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_hdd" class="col-sm-3 col-form-label">HDD</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_hdd" name="bs_hdd"
                                                    value="<?php echo $row['bs_hdd']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_avail" class="col-sm-3 col-form-label">Avail</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_avail" name="bs_avail"
                                                    value="<?php echo $row['bs_avail']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_ram" class="col-sm-3 col-form-label">RAM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_ram" name="bs_ram"
                                                    value="<?php echo $row['bs_ram']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_post_backup" class="col-sm-3 col-form-label">POSTGRESS
                                                BACKUP</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_post_backup"
                                                    name="bs_post_backup" value="<?php echo $row['bs_post_backup']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bs_backup_pc" class="col-sm-3 col-form-label">BACKUP PC</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bs_backup_pc"
                                                    name="bs_backup_pc" value="<?php echo $row['bs_backup_pc']; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                </td>
                <td>
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal<?php echo $row['id']; ?>"><i
                            class="fa-solid fa-trash-can"></i></button>
                </td>
                <!-- Modal untuk konfirmasi -->
                <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data tersebut?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="hapus_data_luar_jabodetabek.php" method="POST">
                                    <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php
            $nomorUrut++;
        }
      } else {
        echo "Error: " . $conn->error;
      }
      $conn->close();
      ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>