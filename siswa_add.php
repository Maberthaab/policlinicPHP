
<?php 
    include "koneksi.php";

    $cari="";
    if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
}

    $query = "SELECT * FROM siswa WHERE nisn LIKE '%".$cari."%' OR nama LIKE '%".$cari."%'";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Fashiop</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: 012 44 5698 7456 896</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="login.html">
								Login/Register
							</a>
						</li>
						<li>
							<a href="#">
								My Account
							</a>
						</li>
						<li>
							<a href="contact.html">
								Contact Us
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="#">
						<img src="img/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="home.php.php">Home</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="pembayaran.php.php">Pembayaran</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="histori.php">Lihat History</a>
												<li class="nav-item">
													<a class="nav-link" href="laporan.php">Generate Laporan</a>
													
													
										</ul>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Master</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="siswa.php">Siswa</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="kelas.php">Kelas</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="spp.php">Spp</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="petugas.php">Petugas</a>
											</li>
										</ul>
									</li>
									
									
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	
		<h1> Daftar Siswa</h1>
	
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->
	<div class="body">
                          <form  role="form" action="" method="POST">
                            <h2 class="card-inside-title" style="color: black;" >Tambah Dokter</h2><br>
                            <h5 class="card-inside-title">Id Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_dokter" class="form-control" value="<?php echo $idBel; ?>" readonly />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Nama Dokter</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nm_dokter" class="form-control" />
                                        </div>
                                    </div>
                            <h5 class="card-inside-title">Spesialis</h5>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="spesialis" class="form-control" />
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
                                            <input type="text" name="tarif" class="form-control" />
                                        </div>
                                    </div>
  <div class="form-group pull-right">
    <a href="index_daftar.php" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Input</button>
  </div>
                  </div>
	<!--================End Hot Deals Area =================-->

	<!--================Clients Logo Area =================-->
	

				
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/flipclock/timer.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>