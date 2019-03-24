<?php 

	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel='$id'");
	
	if(mysqli_num_rows($show)==0){
		echo "<script>window.history.back()</script>";
	}else{
		$data=mysqli_fetch_assoc($show);
	}
	
	if(isset($_POST['picture'])){
		$gambar=$_FILES['img']['name'];
		$data = mysqli_query($koneksi, "UPDATE tb_artikel SET gambar='$gambar' WHERE id_artikel='$id'")or die(mysqli_error());
		$sql = $data;
		move_uploaded_file($_FILES['img']['tmp_name'],"../img/post/".$_FILES['img']['name']);
		echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		 
	}
?>
<div id="button"><a href="#popup">Changed</a></div>
    
    <div id="popup">
    	<div class="window">
        	<a href="#" class="close-button" title="Close">X</a>
			<br>
            <input type="file" name="img"/><br><br>
			<center><input type="submit" name="picture" value="Kirim"></center>
        </div>
    </div>