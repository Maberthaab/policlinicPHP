<?php 
    include "koneksi.php";

    $query = "SELECT max(id_pasien) as maxKode FROM tb_pasien";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);
    $idBel = $data['maxKode'];

    $noUrut = (int) substr($idBel, 4, 4);

    $noUrut++;

    $char = "PAS-";
    $idBel = $char.sprintf("%03s", $noUrut);
?>
<?php 
session_start();
if ($_SESSION['level']=="") {
  header("location:index.php?pesan=gagal");
} elseif ($_SESSION['level']=="pemeriksaan") {
  header("location:index_periksa.php?pesan=gagal");
} elseif ($_SESSION['level']=="apotek") {
    header("location:index_apotek.php?pesan=gagal");
} elseif ($_SESSION['level']=="kasir") {
    header("location:index_kasir.php?pesan=gagal");
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>POLIKLINIK</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
          <script src="aset/js/jquery.min.js"></script>
        <script src="aset/js/ie-emulation-modes-warning.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand static-top"style="background-color: #47D0D6;">

    <a class="navbar-brand mr-1" style="color: white"href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav" style="background-color: #000A4D;">
      <li class="nav-item active">
        <a class="nav-link" href="index_daftar.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pendaftaran</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Pendaftaran:</h6>
          <a class="dropdown-item" href="index_daftar.php">Form Pendaftaran</a>
          <a class="dropdown-item" href="data_pasien.php">Data Pasien</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index_admin.php">SISTEM INFORMASI POLIKLINIK</a>
          </li>
          <li class="breadcrumb-item active">PENDAFTARAN PASIEN</li>
        </ol>

        <!-- Icon Cards-->
      <div class="card-body">
        <form method="POST" action="" role="form">
                            <h5 class="card-inside-title">ID Pasien</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_pasien" class="form-control" value="<?php echo $idBel; ?>" readonly />
                                        </div>
                                    </div>
          <h5 class="card-inside-title">Nama Pasien</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="nm_pasien" class="form-control" />
          </div>
          </div>
          <h5 class="card-inside-title">Jenis Kelamin</h5>
          <div class="form-group">
          <div class="form-line">
          <div class="demo-radio-button">
          <input name="jenis_kelamin" value="Laki-Laki" type="radio" id="radio_30" class="with-gap radio-col-lime" checked />
          <label for="radio_30">Laki-Laki</label>
          <input name="jenis_kelamin" value="Perempuan" type="radio" id="radio_31" class="with-gap radio-col-lime" />
          <label for="radio_31">Perempuan</label>
          </div>
          </div>
          </div>
          <h5 class="card-inside-title">Alamat</h5>
          <div class="form-group">
          <div class="form-line">
          <textarea rows="1" name="alamat" class="form-control no-resize auto-growth"></textarea>
          </div>
          </div>
          <h5 class="card-inside-title">Umur</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="umur" class="form-control" />
          </div>
          </div>

                            <h5 class="card-inside-title">Poli</h5>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="nm_poli" id="nm_poli" 
                                            onchange='changeValue(this.value)' required>
                                                <option value="">-Pilih-</option>
                                                <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM tb_poli ORDER BY nm_poli");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option value="<?php echo $row['kd_poli']; ?>">
                                                        <?php echo $row['nm_poli']; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div><br>
                            <h5 class="card-inside-title">Nama Dokter</h5>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="nm_dokter" id="nm_dokter" 
                                            onchange='changeValue(this.value)' required>
                                                <option value="">-Pilih-</option>
                                                
                                                  <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM tb_dokter INNER JOIN tb_poli ON tb_dokter.kd_poli = tb_poli.kd_poli ORDER BY nm_dokter");
                                                    $jsArray    = "var prdName = new Array();\n";
                                                    while ($row = mysqli_fetch_array($query)) { 
                                                      ?>
 
                                                    <option id="nm_dokter" class="<?php echo $row['kd_poli']; ?>">
                                                        <?php echo $row['nm_dokter']; ?>
                                                    </option>

 
                                                <?php 
                                                $jsArray .= "prdName['" . $row['nm_dokter'] . "'] = {id_dokter:'". addslashes($row['id_dokter'])."'};\n";
                                              } ?>
                         
                         
                                            </select>
                                        </div>
                                    </div><br>
                            <h5 class="card-inside-title">Id Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_dokter" class="form-control" id="id_dokter" readonly />
                                        </div>
                                    </div>

                            <h5 class="card-inside-title">Tanggal Pendaftaran</h5>
                            <div class="demo-masked-input">
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="date" name="terdaftar" class="form-control date">
                                            </div>
                                        </div>
                            </div><br><br>
  <div class="form-group pull-right">
    <a href="index_daftar.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
  </div>
        </form>
      </div>
    </div>
  </div>
        
        <!-- Input Database-->
<?php 
if (isset($_POST['submit'])) {
  $id_pasien    =$_POST['id_pasien'];
  $nm_pasien    =$_POST['nm_pasien'];
  $jenis_kelamin  =$_POST['jenis_kelamin'];
  $alamat     =$_POST['alamat'];
  $umur     =$_POST['umur'];
  $id_dokter    =$_POST['id_dokter'];
  $nm_dokter    =$_POST['nm_dokter'];
  $kd_poli    =$_POST['nm_poli'];
  $terdaftar    =$_POST['terdaftar'];

$query = "INSERT INTO tb_pasien VALUES ('$id_pasien','$nm_pasien','$jenis_kelamin','$alamat','$umur','$nm_dokter','$kd_poli','$id_dokter','$terdaftar')";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    
    echo "<script>
            alert('Pasien Berhasil Didaftarkan');
            document.location.href='cetak_pasien.php?id_pasien=$idBel'
              </script>
          ";
  }else{
    echo "<script>
            alert('Pasien Gagal Didaftarkan');
            document.location.href='index_daftar.php'
              </script>
          ";
  }
}
 ?>
        <!-- DataTables Example -->
        
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

          <script src="aset/js/bootstrap.min.js"></script>
        <script src="aset/js/jquery-chained.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="aset/js/ie10-viewport-bug-workaround.js"></script>
        <script>
            $(document).ready(function() {
                $("#nm_dokter").chained("#nm_poli");
            });
        </script>

</body>

</html>

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('id_dokter').value = prdName[id].id_dokter;
};
</script>