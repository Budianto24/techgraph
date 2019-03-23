<?php
	include "../database/koneksi.php";
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$show = mysql_query("SELECT * FROM tb_login WHERE id='$id'");
	
		if(mysql_num_rows($show)==0){
			echo "<script>window.history.back()</script>";
		}else{
			$data = mysql_query("DELETE FROM tb_login WHERE id='$id'")or die(mysql_error());
			$sql = $data;
			if($sql){
				header("location:user");
			}else{
				echo "<script>alert('Gagal Input')</script>";
			
			}
		}
	}
?>