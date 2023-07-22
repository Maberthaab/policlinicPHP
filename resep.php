<?php 
    include "koneksi.php";

    $cari="";
    if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
}

    $query = "SELECT * FROM tb_pasien WHERE id_pasien LIKE '%".$cari."%' OR nm_pasien LIKE '%".$cari."%'";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);


    $id_pasien      =$data['id_pasien'];
    $id_dokter      =$data['id_dokter'];
    $nm_pasien      =$data['nm_pasien'];
    $nm_dokter      =$data['nm_dokter'];
    $kd_poli        =$data['kd_poli'];

    $query2 = "SELECT max(id_resep) as maxKode FROM tb_resep";
    $hasil2 = mysqli_query($conn,$query2);
    $data2 = mysqli_fetch_array($hasil2);
    $idBel = $data2['maxKode'];

    $noUrut = (int) substr($idBel, 4, 4);

    $noUrut++;

    $char = "RSP-";
    $idBel = $char.sprintf("%03s", $noUrut);

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

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

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
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index_periksa.php">
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
          <li class="breadcrumb-item active">PEMERIKSAAN PASIEN</li>
        </ol>
                <div class="card-body">                
                <form action="" method="POST">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="cari" class="form-control" autocomplete="off" placeholder="Masukkan Nama / ID Pasien" autofocus />
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
      <div class="card-body">
<form  role="form" action="" method="POST">


                            <h5 class="card-inside-title">ID Resep</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_resep" class="form-control" value="<?php echo $idBel; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Pasien</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nm_pasien" value="<?php echo $nm_pasien; ?>"  readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Poli</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_poli" class="form-control" id="nm_poli" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_dokter" class="form-control" id="nm_dokter" value="<?php echo $nm_dokter; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Obat</h5>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="obat" id="nm_obat" 
                                            onchange='changeValue(this.value)' required>
                                                <option value="">-Pilih-</option>
                                                <?php 
                        $query      =mysqli_query($conn, "select * from tb_obat order by nm_obat asc"); 
                        $result     = mysqli_query($conn, "select * from tb_obat");  
                        $jsArray    = "var prdName = new Array();\n";
                        while ($row = mysqli_fetch_array($result)) {  
                        echo '<option name="nm_obat"  value="' . $row['nm_obat'] . '">' . $row['nm_obat'] . '</option>';  
                        $jsArray .= "prdName['" . $row['nm_obat'] . "'] = {kd_obat:'" . addslashes($row['kd_obat']) . "'};\n";
                         }
                         ?>
                                            </select>
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Kode Obat</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kd_obat" class="form-control" id="kd_obat" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Jumlah Obat</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jml_obat" class="form-control" />
                                        </div>
                                    </div><br>
  <div class="form-group pull-right">
    <a href="index_periksa.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
  </div>
        </form>
      </div>
    </div>
  </div>
        
        <!-- Input Database-->
<?php 
if (isset($_POST['submit'])) {
	$id_resep		=$_POST['id_resep'];
	$nm_pasien 		=$_POST['nm_pasien'];
	$nm_poli 		=$_POST['nm_poli'];
	$nm_dokter 		=$_POST['nm_dokter'];
	$keluhan 		=$_POST['keluhan'];
	$diagnosa		=$_POST['diagnosa'];
	$kd_obat 		=$_POST['kd_obat'];
	$obat			=$_POST['obat'];
	$jml_obat		=$_POST['jml_obat'];
	$tgl_periksa	=$_POST['tgl_periksa'];

$query =" INSERT INTO tb_resep VALUES ('$id_resep','$id_pasien','$id_dokter','$kd_poli','$kd_obat') ";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {

    echo "<script>
            alert('Data Pemeriksaan Sukses');
            document.location.href='cetak_resep.php'
              </script>
          ";
  }else{
    echo "<script>
            alert('Data Pemeriksaan Gagal');
            document.location.href='index_periksa.php'
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

</body>

</html>

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kd_obat').value = prdName[id].kd_obat;
};
</script>