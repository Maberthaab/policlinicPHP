<?php
		function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
@ini_set('display_errors', 0);
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kasir</title>
   <style>
            .content img{width: 70px; height: 70px; float: left; margin-left: 20px;}
            .content p{text-align: center; margin-left: 20px;}
            .content h2{text-align: left; margin-left: 5px;}
            .content h4{text-align: left; margin-left: 5px;}
        </style>
</head>
<body>
<div class="content">

    <table border="0" width="1000">
        <tr>
            <td>
                <a href="data_kasir.php"><img src="gambar/logo.jpg"></a>
                <p><span style="font-size: 25px;">POLIKLINIK CEPAT SEHAT</span><br>
                    <span style="font-size: 20px;">JL Seoul Korea</span><br>
                    <span style="font-size: 15px;">E-mail:Poliklinik_Cepat_Sehat@gmail.com Tlp/Fax : +6286875</span></p><hr>
            </td>
        </tr>
      </table></div>
<?php
include "koneksi.php";
?>
<table colspan="11" border="1" style="width:800px">
	<tr>
    <th>No</th>
    <th>Nama Pasien</th>
 	  <th>Poli</th>
      <th>Dokter</th>
      <th>Tagihan</th>
    </tr>
	<?php
		$no = 1;
		$tgl1 = $_POST['tgl1'];
		$tgl2 = $_POST['tgl2'];
		$tampil = "SELECT * FROM tb_transaksi WHERE (tgl_periksa BETWEEN '$tgl1' AND '$tgl2');";
		$sql  = mysqli_query($conn, $tampil);
		while($data=mysqli_fetch_array($sql)){
			?>
			<tr>
				 <td><?php echo $no++;?></td>
                 <td><?php echo $data['nm_pasien'];?></td>
                 <td><?php echo $data['nm_poli'];?></td> 
                 <td><?php echo $data['nm_dokter'];?></td>
                 <td><?php echo $data['total_bayar'];?></td>
			</tr>
			<?php
				}
			?>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>