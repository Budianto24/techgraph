<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysql_query("SELECT * FROM tb_slideshow WHERE id='$id'");
	
	if(mysql_num_rows($show)==0){
		echo "<script>window.history.back()</script>";
	}else{
		$data=mysql_fetch_assoc($show);
	}
	
	if(isset($_POST['input'])){
		$author = $_POST['author'];
		$gambar=$_FILES['img']['name'];
		$tgl = $_POST['tgl'];
		if(empty($author && $gambar)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
		$data = mysql_query("UPDATE tb_slideshow SET author='$author', gambar='$gambar', tgl='$tgl' WHERE id='$id'")or die(mysql_error());
		$sql = $data;
		if($sql){
			echo "<script>alert('Berhasil Update')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			echo "<script>alert('Gagal Input')</script>";		
			}
		 }
	}
	
	$today=date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Developers | <?php echo $_SESSION['status'];?></title>
	<link href="../css/admin-style.css" rel="stylesheet" type="text/css" >
</head>
<body>
<?php include ("cek-session.php");?>

<div class="content">
<div id="title-content">Create Artikel</div>
<hr><br>
<form  action="" method="POST" enctype="multipart/form-data">
<table width="500" border="0" cellpadding="8">
	<tr>
		<td align="right" rowspan="3"><b>Picture</b></td>
	</tr>
	<tr>
		<td><img src="../img/banner/<?php echo $data['gambar'];?>"></td>
	</tr>
	<tr>
		<td ><input name="img" type="file"><br>Note : Max Size 960 x 300</td>
	</tr>
	<tr>
		<td colspan="2"><input name="author" value="<?php echo $_SESSION['name'];?>" type="hidden"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="input" value="Kirim" id="submit"></td>
	</tr>
	<input type="hidden" name="tgl" value="<?php echo $today;?>">
</table>
</form>
</div>

</body>
</html>