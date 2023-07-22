<?php 
include "koneksi.php";

 ?>
 <?php 
session_start();
if ($_SESSION['level']=="") {
  header("location:index.php?pesan=gagal");
} elseif ($_SESSION['level']=="apotek") {
  header("location:index_apotek.php?pesan=gagal");
} elseif ($_SESSION['level']=="tpprj") {
    header("location:index_daftar.php?pesan=gagal");
} elseif ($_SESSION['level']=="kasir") {
    header("location:index_kasir.php?pesan=gagal");
} elseif ($_SESSION['level']=="periksa") {
    header("location:index_periksa.php?pesan=gagal");
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

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand  static-top"style="background-color: #47D0D6;">

    <a class="navbar-brand mr-1"style="color: white" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav"style="background-color: #000A4D;">
      <li class="nav-item active">
        <a class="nav-link" href="ubah_poli.php">
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pemeriksaan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Pemeriksaan:</h6>
          <a class="dropdown-item" href="index_periksa.php">Form Pemeriksaan</a>
          <a class="dropdown-item" href="data_periksa.php">Data Pasien</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Apotek</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Apotek:</h6>
          <a class="dropdown-item" href="index_apotek.php">Form Apotek</a>
          <a class="dropdown-item" href="data_apotek.php">Data Apotek</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Data Master:</h6>
          <a class="dropdown-item" href="#">Data Pasien</a>
          <a class="dropdown-item" href="#">Data Periksa</a>
          <a class="dropdown-item" href="#">Data Apotek</a>
          <a class="dropdown-item" href="#">Data Obat</a>
          <a class="dropdown-item" href="#">Data Poli</a>
          <a class="dropdown-item" href="#">Data Dokter</a>
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
          <li class="breadcrumb-item active">UBAH POLI</li>
        </ol>

        <!-- Icon Cards-->
<?php 
             $id_dokter=$_GET["id_dokter"];
             $query="SELECT * FROM tb_dokter WHERE id_dokter='$id_dokter'";
             $run=mysqli_query($conn, $query);
             $pecah=mysqli_fetch_assoc($run);
 ?>
        <!-- Area Chart Example-->
                        <div class="body">
                          <form  role="form" action="" method="POST">
                            <h5 class="card-inside-title">Id Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_dokter" class="form-control" value="<?php echo $pecah['id_dokter']; ?>"  readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_dokter" class="form-control" value="<?php echo $pecah['nm_dokter']; ?>" />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Spesialis</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="spesialis" class="form-control" value="<?php echo $pecah['spesialis']; ?>" />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Poli</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="nm_poli" id="nm_poli" 
                                            onchange='changeValue(this.value)' required>
                                                <option value="">-Pilih-</option>
                                                <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM tb_poli ORDER BY nm_poli");
                                                    $jsArray    = "var prdName = new Array();\n";
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                <?php
                                                echo '<option name="nm_poli"  value="' . $row['nm_poli'] . '">' . $row['nm_poli'] . '</option>';
                                                $jsArray .= "prdName['" . $row['nm_poli'] . "'] = {kd_poli:'". addslashes($row['kd_poli'])."'};\n"; 
                                              } ?>
                                            </select>
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Kd Poli</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kd_poli" id="kd_poli" class="form-control" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Tarif</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tarif" class="form-control" value="<?php echo $pecah['tarif']; ?>" />
                                        </div>
                                    </div>
  <div class="form-group pull-right">
    <a href="data_dokter.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Ubah</button>
  </div>
                  </div>
        <!-- DataTables Example -->
<?php 
if (isset($_POST['submit'])) {
  $id_dokter    =$_POST['id_dokter'];
  $nm_dokter    =$_POST['nm_dokter'];
  $spesialis    =$_POST['spesialis'];
  $nm_poli      =$_POST['nm_poli'];
  $kd_poli      =$_POST['kd_poli'];
  $tarif        =$_POST['tarif'];

  $query="UPDATE tb_dokter SET id_dokter='$id_dokter',nm_dokter='$nm_dokter',spesialis='$spesialis',tarif='$tarif',kd_poli='$kd_poli',nm_poli='$nm_poli' WHERE id_dokter='$id_dokter'";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    
    echo "<script>
            alert('Sukses Mengubah');
            document.location.href='data_dokter.php'
              </script>
          ";
  }else{
    echo "<script>
            alert('Gagal Mengubah');
            document.location.href='ubah_dokter.php'
              </script>
          ";
  }
}
?>        
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
          <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kd_poli').value = prdName[id].kd_poli;
};
</script>