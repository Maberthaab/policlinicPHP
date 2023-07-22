<?php 

$server="localhost";
$user="root";
$pass="";
$db="policlinic";

$conn=mysqli_connect($server,$user,$pass,$db);

function query($query){
	global $conn;
	mysqli_query($conn, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc(mysql_query(query))) {
		$rows[] = $row;
	}
	return $rows;
}
 ?>