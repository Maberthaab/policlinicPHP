<?php
session_start();

	include 'koneksi.php';

		$username=$_POST['user'];
		$password=$_POST['pass'];
		$query=mysqli_query($conn,"SELECT * FROM user_account WHERE username='$username' and password='$password'");

		 $masuk=mysqli_num_rows($query);

		 if($masuk > 0){

		 			$data=mysqli_fetch_assoc($query);
		
			if ($data["level"]=="tpprj"){
				$_SESSION['username']="$username";
				$_SESSION['level']="tpprj";
				echo"<script> alert('Login Sukses')
				document.location.href='index_daftar.php'</script>";	
			}else if ($data["level"]=="pemeriksaan"){
				$_SESSION['username']="$username";
				$_SESSION['level']="pemeriksaan";
				echo"<script> alert('Login Sukses')
				document.location.href='index_periksa.php'</script>";
			}else if ($data["level"]=="apotek"){
				$_SESSION['username']="$username";
				$_SESSION['level']="apotek";
				echo"<script> alert('Login Sukses')
				document.location.href='index_apotek.php'</script>";
			}else if ($data["level"]=="kasir"){
				$_SESSION['username']="$username";
				$_SESSION['level']="kasir";
				echo"<script> alert('Login Sukses')
				document.location.href='index_kasir.php'</script>";
			}else if ($data["level"]=="admin"){
				$_SESSION['username']="$username";
				$_SESSION['level']="admin";
				echo"<script> alert('Login Sukses')
				document.location.href='index_admin.php'</script>";
			}else{
				header("location:index.php?pesan=gagal");
			}
		}else{
				echo"<script> alert('Login Gagal')
				document.location.href='index.php'</script>";
			}
	 ?>