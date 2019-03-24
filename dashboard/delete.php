<?php
	include "../database/koneksi.php";
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$show = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel='$id'");
	
		if(mysqli_num_rows($show)==0){
			echo "<script>window.history.back()</script>";
		}else{
			$data = mysqli_query($koneksi, "DELETE FROM tb_artikel WHERE id_artikel='$id'")or die(mysqli_error());
			$sql = $data;
			if($sql){
				header("location:post");
			}else{
				echo "<script>alert('Gagal Input')</script>";
			
			}
		}
	}
?>