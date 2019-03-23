<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include "../database/koneksi.php";
	
	if(isset($_POST['input'])){
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$isi = $_POST['isi'];
		$gambar=$_FILES['img']['name'];
		$author = $_POST['author'];
		$tgl = $_POST['tgl'];
		if(empty($judul && $isi && $gambar)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			$sql = mysql_query("INSERT INTO tb_artikel VALUES(NULL,'$judul','$kategori','$isi','$gambar','$author','$tgl')")or die(mysql_error());
			move_uploaded_file($_FILES['img']['tmp_name'],"../img/post/".$_FILES['img']['name']);
			if($sql){
				echo "<script>alert('Berhasil Input')</script>";
				header("location:../dashboard");
			}else{
				echo "<script>alert('Gagal Input')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}
		}
	}
	$today=date('d M Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>
	<link href="../css/plugins/morris.css" rel="stylesheet">
	
	<link href="../css/sb-admin.css" rel="stylesheet">
	
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
	<script src="../ckeditor/ckeditor.js"></script>
	<link href="../css/admin-style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
      <?php include ("cek-session.php");?> 
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			<h2><span class="fa fa-pencil"></span>&nbsp;Create Post</h2><hr>
                <form  action="" method="POST" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td align="right" width="100"><b>Title</b></td>
							<td><input type="textarea" name="judul" size="32" placeholder="Ketik Disini.." id="input-text">
						</tr>
						<tr>
							<td align="right"><b>Category</b></td>
							<td> 
								<Select id="input-text" name="kategori">
									<option>-- Category --</option>
									<option value="Pengetahuan">Pengetahuan</option>
									<option value="Kuliner">Kuliner</option>
									<option value="Politik">Politik</option>
								</Select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><textarea class="ckeditor" name="isi" height="900"></textarea></td>
						</tr>
						<tr>
							<td align="right"><b>Picture</b></td>
							<td><img src="../img/post/nopic.png"/><br><input name="img" type="file"><br>Type file : JPEG or PNG</td>
						</tr>
						<tr>
							<td colspan="2" align="center" valign="bottom"><input type="submit" name="input" class="btn btn-primary" value="Kirim"></td>
						</tr>
							<input type="hidden" name="tgl" value="<?php echo $today;?>">
							<input type="hidden" name="author" value="<?php echo $_SESSION['name'];?>">
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