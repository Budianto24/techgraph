<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysql_query("SELECT * FROM tb_artikel WHERE id_artikel='$id'");
	
	if(mysql_num_rows($show)==0){
		echo "<script>window.history.back()</script>";
	}else{
		$data=mysql_fetch_assoc($show);
	}
	
	if(isset($_POST['input'])){
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$isi = $_POST['isi'];
		$author = $_POST['author'];
		$tgl = $_POST['tgl'];
		if(empty($judul && $kategori && $isi)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
		$data = mysql_query("UPDATE tb_artikel SET judul='$judul', kategori='$kategori', isi='$isi', tgl='$tgl', author='$author' WHERE id_artikel='$id'")or die(mysql_error());
		$sql = $data;
		if($sql){
			echo "<script>alert('Berhasil Update')</script>";
				header("location:../dashboard");
		}else{
			echo "<script>alert('Gagal Input')</script>";		
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
                <div class="row">
                    <div class="col-lg-12">
                         <h2><span class="fa fa-edit"></span>&nbsp;Edit Post</h2><hr>
							<form  action="" method="POST" enctype="multipart/form-data">
								<table class="table">
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
                </div>
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