<?php 
include "koneksi.php";
if (isset($_GET["id_dokter"])) {
$id_dokter=$_GET["id_dokter"];
mysqli_query($conn, "DELETE FROM tb_dokter WHERE id_dokter = '".$id_dokter."'");
if (mysqli_affected_rows($conn)> 0) {
	echo "
	<script>
	alert('Berhasil Dihapus');
	document.location.href='data_dokter.php'
	</script>
	";

}else{
	echo "
	<script>
	alert('Gagal Dihapus');
	document.location.href='data_dokter.php'
	</script>
	";
}

}
 ?>