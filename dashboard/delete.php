<?php
	include "../database/koneksi.php";
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$show = mysql_query("SELECT * FROM tb_artikel WHERE id_artikel='$id'");
	
		if(mysql_num_rows($show)==0){
			echo "<script>window.history.back()</script>";
		}else{
			$data = mysql_query("DELETE FROM tb_artikel WHERE id_artikel='$id'")or die(mysql_error());
			$sql = $data;
			if($sql){
				header("location:post");
			}else{
				echo "<script>alert('Gagal Input')</script>";
			
			}
		}
	}
?>