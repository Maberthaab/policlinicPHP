<?php 
    include "koneksi.php";

    $cari="";
    if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
}

    $query = "SELECT * FROM tb_obat WHERE kd_obat LIKE '%".$cari."%' OR nm_obat LIKE '%".$cari."%'";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);

?>
<?php 
session_start();
if ($_SESSION['level']=="") {
  header("location:index.php?pesan=gagal");
} elseif ($_SESSION['level']=="pemeriksaan") {
  header("location:index_periksa.php?pesan=gagal");
} elseif ($_SESSION['level']=="tpprj") {
    header("location:index_daftar.php?pesan=gagal");
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

</head>

<body id="page-top">

  <nav class="navbar navbar-expand static-top"style="background-color: #47D0D6;" >

    <a class="navbar-brand mr-1"style="color: white" href="index.html">Start Bootstrap</a>

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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav"style="background-color: #000A4D;">
      <li class="nav-item active">
        <a class="nav-link" href="stok_obat.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
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
          <a class="dropdown-item" href="data_obat.php">Data Obat</a>
          <a class="dropdown-item" href="stok_obat.php">Tambah Stok Obat</a>
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
          <li class="breadcrumb-item active">DATA OBAT</li>
        </ol>
        <div class="card-body">                
                <form action="" method="POST">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="cari" class="form-control" autocomplete="off" placeholder="Masukkan Nama / Kode Obat" autofocus />
                                        </div>
                                    </div>
  <div class="form-group pull-right">
    <button name="carri" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Cari</button>
  </div>
                </form>
            </div>
            <?php 
$cari="";
if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
}
?>
        <!-- Icon Cards-->
<h2 class="card-inside-title" style="color: black;" >Tambah Stok Obat</h2><br>
<form  role="form" action="" method="POST">


                            <h5 class="card-inside-title">KD Obat</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kd_obat" value=" <?php echo $data['kd_obat']; ?> " class="form-control" />
                                        </div>
                                    </div>
          <h5 class="card-inside-title">Nama Obat</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="nm_obat" value=" <?php echo $data['nm_obat']; ?> " class="form-control" />
          </div>
          </div>
          <h5 class="card-inside-title">Jenis Obat</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="jenis_obat" value=" <?php echo $data['jenis_obat']; ?> " class="form-control" />
          </div>
          </div>
          <h5 class="card-inside-title">Stok</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="stok" class="form-control" />
          </div>
          </div>
          <h5 class="card-inside-title">Tarif</h5>
          <div class="form-group">
          <div class="form-line">
          <input type="text" name="tarif" value=" <?php echo $data['tarif']; ?> " class="form-control" />
          </div>
          </div>
  <div class="form-group pull-right">
    <a href="data_obat.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
  </div>
        </form>
      </div>
    </div>
        <!-- Area Chart Example-->
        <?php 
if (isset($_POST['submit'])) {
  $kd_obat    =$_POST['kd_obat'];
  $nm_obat    =$_POST['nm_obat'];
  $jenis_obat    =$_POST['jenis_obat'];
  $stok      =$_POST['stok'];
  $tarif        =$_POST['tarif'];

$query = "INSERT INTO tb_stok VALUES ('','$kd_obat','$nm_obat','$jenis_obat','$stok','$tarif')";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    
    echo "<script>
            alert('Stok Obat Berhasil Ditambahkan');
            document.location.href='data_obat.php'
              </script>
          ";
  }else{
    echo "<script>
            alert('Stok Obat Gagal Ditambahkan');
            document.location.href='data_obat.php'
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

</html>
