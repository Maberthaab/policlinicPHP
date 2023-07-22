<?php 
include "koneksi.php";
if (isset($_GET["kd_poli"])) {
$kd_poli=$_GET["kd_poli"];
mysqli_query($conn, "DELETE FROM tb_poli WHERE kd_poli = '".$kd_poli."'");
if (mysqli_affected_rows($conn)> 0) {
	echo "
	<script>
	alert('Berhasil Dihapus');
	document.location.href='data_poli.php'
	</script>
	";

}else{
	echo "
	<script>
	alert('Gagal Dihapus');
	document.location.href='data_poli.php'
	</script>
	";
}

}
 ?>