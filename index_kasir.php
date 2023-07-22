<?php 
    include "koneksi.php";

    $cari="";
    if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
}

    $query = "SELECT * FROM tb_resep WHERE id_resep LIKE '%".$cari."%'";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);
    $id_pemeriksaan=$data['id_pemeriksaan'];
    $nm_dokter=$data['nm_dokter'];

    $query3 = "SELECT * FROM tb_dokter WHERE nm_dokter='$nm_dokter'";
    $hasil3 = mysqli_query($conn,$query3);
    $data3 = mysqli_fetch_array($hasil3);

    $query2 = "SELECT max(id_transaksi) as maxKode FROM tb_transaksi";
    $hasil2 = mysqli_query($conn,$query2);
    $data2 = mysqli_fetch_array($hasil2);
    $idBel = $data2['maxKode'];

    $noUrut = (int) substr($idBel, 4, 4);

    $noUrut++;

    $char = "TRN-";
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

  <nav class="navbar navbar-expand  static-top"style="background-color: #47D0D6;">

    <a class="navbar-brand mr-1" style="color: white" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
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
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav"style="background-color: #000A4D;">
      <li class="nav-item active">
        <a class="nav-link" href="index_kasir.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kasir</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Kasir:</h6>
          <a class="dropdown-item" href="index_kasir.php">Form Kasir</a>
          <a class="dropdown-item" href="data_kasir.php">Data Kasir</a>
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
          <li class="breadcrumb-item active">KASIR</li>
        </ol>
                <div class="card-body">                
                <form action="" method="POST">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="cari" class="form-control" autocomplete="off" placeholder="Masukkan ID Resep" autofocus />
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
<form  role="form" action="" class="hitung" method="POST">


                            <h5 class="card-inside-title">ID Transaksi</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $idBel; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Pasien</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_pasien" class="form-control" value="<?php echo $data['nm_pasien']; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Poli</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_poli" class="form-control" value="<?php echo $data['nm_poli']; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_dokter" class="form-control" value="<?php echo $data['nm_dokter']; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Tarif Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tarif" id="tarif_dok" class="form-control" value="<?php echo $data3['tarif']; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Tarif Obat</h5>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="total" id="tarif_obat" class="form-control" value="<?php echo $data['total']; ?>" >
                                            </div>
                            </div>
                            <h5 class="card-inside-title">Total Bayar</h5>
                                        <div class="form-group">
                                            <div class="form-line">
                                            	<input type="text" name="total_bayar" id="total" class="form-control" readonly >
                                                
                                            </div>
                            </div>
                            <h5 class="card-inside-title">Cash</h5>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" >
                                            </div>
                            </div>
                            <h5 class="card-inside-title">Kembalian</h5>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kembalian" id="kembalian" class="form-control" readonly >
                                            </div>

                            </div>
                             <h5 class="card-inside-title">Tanggal Pembayaran</h5>
                            <div class="demo-masked-input">
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="date" name="tgl_periksa" class="form-control date">
                                            </div>
                                        </div>
                                            
                            </div><br>
  <div class="form-group pull-right">
    <a href="index_apotek.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
  </div>
        </form>
      </div>
    </div>
  </div>
        <!-- Area Chart Example-->
        <?php 
if (isset($_POST['submit'])) {
  $id_transaksi    =$_POST['id_transaksi'];
  $nm_pasien    =$_POST['nm_pasien'];
  $nm_poli    =$_POST['nm_poli'];
  $total_bayar  =$_POST['total_bayar'];
  $jumlah_bayar  =$_POST['jumlah_bayar'];
  $kembalian  =$_POST['kembalian'];
  $nm_dokter  =$_POST['nm_dokter'];
  $tgl_periksa  =$_POST['tgl_periksa'];

$query = "INSERT INTO tb_transaksi VALUES ('$id_transaksi','$nm_pasien','$nm_poli','$nm_dokter','$total_bayar','$jumlah_bayar','$kembalian','$tgl_periksa')";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {

    echo "<script>
            alert('Data Transaksi Sukses');
            document.location.href='cetak_trn.php?id_transaksi=$idBel'
              </script>
          ";
  }else{
    echo "<script>
            alert('Data Pemeriksaan Gagal');
            document.location.href='index_apotek.php'
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
  <script type ="text/javascript">
        $(".hitung").ready(function(){
            var tarif_dok = parseInt($("#tarif_dok").val())
            var tarif_obat = parseInt($("#tarif_obat").val())
            
            var total = tarif_dok + tarif_obat;
            $("#total").attr("value",total)
            
            });
    </script>
    <script type ="text/javascript">
        $(".hitung").keyup(function(){
            var tarif_dok = parseInt($("#tarif_dok").val())
            var tarif_obat = parseInt($("#tarif_obat").val())
            var jumlah_bayar = parseInt($("#jumlah_bayar").val())
            
            var total = tarif_dok + tarif_obat;
            var kembalian = jumlah_bayar - total;
            $("#kembalian").attr("value",kembalian)
            
            });
    </script>
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