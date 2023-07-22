	<?php

include "koneksi.php";

$id_pasien = $_GET['id_pasien'];

$query2 = "DELETE FROM tb_pasien WHERE id_pasien='".$id_pasien."'";
$sql2 = mysqli_query($conn, $query2); 
if($sql2){ 
  echo "<script>
  		alert('Berhasil Dihapus');
  		document.location.href='data_pasien.php'
		</script>";
}else{
  echo "<script>
  		alert('Berhasil Dihapus');
  		document.location.href='data_pasien.php'
		</script>";
}
?>
