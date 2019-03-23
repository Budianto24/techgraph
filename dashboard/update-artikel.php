<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysql_query("SELECT * FROM tb_artikel WHERE id_artikel='$id'");
	
	
	if(isset($_POST['input'])){
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$isi = $_POST['isi'];
		$author = $_POST['author'];
		$tgl = $_POST['tgl'];
		
		$data = mysql_query("UPDATE tb_artikel SET judul='$judul', kategori='$kategori', isi='$isi', tgl='$tgl', author='$author' WHERE id_artikel='$id'")or die(mysql_error());
		$sql = $data;
		if($sql){
			echo "<script>alert('Berhasil Update')</script>";
				header("location:../dashboard");
		}else{
			echo "<script>alert('Gagal Input')</script>";		
			}
		 
	}
	
	$today=date('d M Y');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Developers | <?php echo $_SESSION['status'];?></title>
	<link href="../css/admin-style.css" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include ("cek-session.php");?>

<div class="content">
<div id="title-content">Update Artikel</div>
<hr><br>

<form  action="" method="POST" enctype="multipart/form-data">
<table width="1000" border="0" cellpadding="8">
	<tr>
		<td align="right"><b>Judul</b></td>
		<td><input type="text" name="judul" size="32" placeholder="Ketik Disini.." id="input-text" value="<?php echo $data['judul'];?>">
	</tr>
	<tr>
		<td align="right"><b>Kategori</b></td>
		<td><input type="text" name="kategori" size="32" placeholder="Ketik Disini.." id="input-text" value="<?php echo $data['kategori'];?>">
	</tr>
	<tr>
		<td></td>
		<td><textarea placeholder="Ketik Disini.." id="editor1" name="isi"><?php echo $data['isi'];?></textarea></td>
		<script>
                CKEDITOR.replace( 'editor1' );
        </script>
	</tr>
	<tr>
		<td align="right"><b>Picture</b></td>
		<td><img src="../img/post/<?php echo $data['gambar'];?>"> <br><?php include 'picture.php';?>Type file : JPEG or PNG</td>
	</tr>
	<tr height="75">
		<td colspan="2" align="center" valign="bottom"><input type="submit" name="input" id="submit" value="Kirim"></td>
	</tr>
	<input type="hidden" name="tgl" value="<?php echo $today;?>">
	<input type="hidden" name="author" value="<?php echo $_SESSION['name'];?>">
</table>
</form>
</div>

</body>
</html>