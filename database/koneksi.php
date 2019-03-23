<?php 
	$host = "localhost";
	$name = "db_developers";
	$user = "root";
	$pass = "";
	$koneksi = mysql_connect($host, $user, $pass) or die("Gagal");
	mysql_select_db($name, $koneksi) or die("Tidak ada");
?>