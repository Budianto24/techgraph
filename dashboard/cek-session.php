<?php 
	if($_SESSION['status']=="user"){
		include ('menu1.php');
	}else if($_SESSION['status']="admin"){
		include ('menu2.php');
	}
?>