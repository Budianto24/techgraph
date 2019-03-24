<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysqli_query($koneksi, "SELECT * FROM tb_slideshow WHERE id='$id'");
	
	if(mysqli_num_rows($show)==0){
		echo "<script>window.history.back()</script>";
	}else{
		$data=mysqli_fetch_assoc($show);
	}
	
	if(isset($_POST['input'])){
		$author = $_POST['author'];
		$gambar=$_FILES['img']['name'];
		$tgl = $_POST['tgl'];
		if(empty($author && $gambar)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
		$data = mysqli_query($koneksi, "UPDATE tb_slideshow SET author='$author', gambar='$gambar', tgl='$tgl' WHERE id='$id'")or die(mysqli_error());
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
	<link href="../css/plugins/morris.css" rel="stylesheet">
	
	<link href="../css/sb-admin.css" rel="stylesheet">
	
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin-style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
      <?php include ("cek-session.php");?> 
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			<h2><span class="fa fa-pencil"></span>&nbsp;Update Slideshow</h2><hr>
				<form  action="" method="POST" enctype="multipart/form-data">
				<table width="500" border="0" cellpadding="8">
					<tr>
						<td align="right" rowspan="3"><b>Picture</b></td>
					</tr>
					<tr>
						<td><img src="../img/banner/<?php echo $data['gambar'];?>" height="250px"></td>
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
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>