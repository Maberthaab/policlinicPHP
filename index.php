<?php 
include 'koneksi.php';
session_start();
if (isset($_SESSION['level'])) {
  header("location:index_admin.php?pesan=gagal");
} elseif (isset($_SESSION['level'])) {
  header("location:index_apotek.php?pesan=gagal");
} elseif (isset($_SESSION['level'])) {
    header("location:index_daftar.php?pesan=gagal");
} elseif (isset($_SESSION['level'])) {
    header("location:index_kasir.php?pesan=gagal");
} elseif (isset($_SESSION['level'])) {
    header("location:index_periksa.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
	body{
		background-image: url('gambar/logo3.jpg');
		background-size: cover;
	}
</style>
<body>

	<div class="login-box">
	<h1>Login</h1>

<?php if (isset($error)) : ?>
<script>
  alert('username / password salah!')</script>
<?php endif; ?>

	<form action="login.php" method="POST">
		<div class="textbox">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" name="user" placeholder="username" autocomplete="off"><br>
		</div>

		<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" name="pass" placeholder="password"><br>
		</div>

		<input class="btn" type="submit" name="submit" value="Sign in">

</form>
</div>
</body>
</html>