<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/jabodetabek.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Arimo&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="bootstrap-5.3.2-dist/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jabodetabek.css">
  <link rel="icon" href="assets/icon/favicon-list.ico" type="image/x-icon">
  <title>Data Center | List Airforcemart</title>
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
    }</script>
  <ul class="nav nav-underline justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="jabodetabek.php">List Jabodetabek</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="luar_jabodetabek.php">List Luar Jabodetabek</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="airforcemart.php">List Airforcemart</a>
    </li>
    <li class="nav-item">
      <button id="logoutButton" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i></button>
    </li>
  </ul>
  <table class="table" id="example">
    <thead class="table-warning">
      <tr>
        <th scope="col">NO</th>
        <th scope="col">INISIAL TOKO</th>
        <th scope="col">STORE CODE</th>
        <th scope="col">STORE NAME</th>
        <th scope="col">SERVER PRIMARY</th>
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
      $sql = "SELECT * FROM airforcemart";
      $result = $conn->query($sql);
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $serverPrimaryId = 'modalServerPrimary_' . $row['id'];
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
              <!-- Modal Back Office Server --->
          <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#<?php echo $serverPrimaryId; ?>">Back Office</button>
          <div class="modal fade" id="<?php echo $serverPrimaryId; ?>" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo $serverPrimaryId; ?>Label"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalServerPrimaryLabel">Back Office Server</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table class="table">
                    <tr>
                      <th>IP Primary</th>
                      <td>
                        <?php echo $row['ip_primary']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>IP IDRAC</th>
                      <td>
                        <?php echo $row['idrac']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>OS Ver</th>
                      <td>
                        <?php echo $row['osver']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Server</th>
                      <td>
                        <?php echo $row['server']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Type Server</th>
                      <td>
                        <?php echo $row['type_server']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Serial Number</th>
                      <td>
                        <?php echo $row['sn']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>HDD</th>
                      <td>
                        <?php echo $row['hdd']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>RAM</th>
                      <td>
                        <?php echo $row['ram']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Postgress</th>
                      <td>
                        <?php echo $row['postgree']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>TransHello</th>
                      <td>
                        <?php echo $row['transhello']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Scale</th>
                      <td>
                        <?php echo $row['scale']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Bart/Lapor</th>
                      <td>
                        <?php echo $row['lapor']; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Note</th>
                      <td>
                        <?php echo $row['note']; ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#editModalAirforce_<?php echo $row['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
          <div class="modal fade" id="editModalAirforce_<?php echo $row['id']; ?>" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalAirforceLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="editModalBOLabel">Edit Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" action="update_airforcemart.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="row mb-3">
                      <label for="ip_primary" class="col-sm-3 col-form-label">PRIMARY</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ip_primary" name="ip_primary"
                          value="<?php echo $row['ip_primary']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="idrac" class="col-sm-3 col-form-label">IDRAC</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="idrac" name="idrac"
                          value="<?php echo $row['idrac']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="osver" class="col-sm-3 col-form-label">OS VER</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="osver" name="osver"
                          value="<?php echo $row['osver']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="server" class="col-sm-3 col-form-label">SERVER</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="server" name="server"
                          value="<?php echo $row['server']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="type_server" class="col-sm-3 col-form-label">TYPE SERVER</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="type_server" name="type_server"
                          value="<?php echo $row['type_server']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="sn" class="col-sm-3 col-form-label">SN</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="sn" name="sn" value="<?php echo $row['sn']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="hdd" class="col-sm-3 col-form-label">HDD</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="hdd" name="hdd" value="<?php echo $row['hdd']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="ram" class="col-sm-3 col-form-label">RAM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ram" name="ram" value="<?php echo $row['ram']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="postgree" class="col-sm-3 col-form-label">POSTGRE</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="postgree" name="postgree"
                          value="<?php echo $row['postgree']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="transhello" class="col-sm-3 col-form-label">TRANSHELLO</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="transhello" name="transhello"
                          value="<?php echo $row['transhello']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="scale" class="col-sm-3 col-form-label">SCALE</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="scale" name="scale"
                          value="<?php echo $row['scale']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="lapor" class="col-sm-3 col-form-label">LAPOR</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="lapor" name="lapor"
                          value="<?php echo $row['lapor']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="note" class="col-sm-3 col-form-label">NOTE</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="note" name="note"
                          value="<?php echo $row['note']; ?>">
                      </div>
                    </div>
        </td>
        <td>
          <button class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#deleteModal<?php echo $row['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
        </td>
        <!-- Modal untuk konfirmasi -->
            <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1"
              aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data tersebut?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="hapus_data_airforcemart.php" method="POST">
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
  <script src="assets/js/script.js"></script>
</body>

</html>