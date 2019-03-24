<?php 
	$host = "localhost";
	$name = "db_techgraph";
	$user = "root";
	$pass = "";
	$koneksi = mysqli_connect($host,$user,$pass,$name);
	if (!$koneksi) {
		echo "Tidak Dapat Terhubung Ke Database !";
	}
?>
