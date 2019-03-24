<?php 
	include "database/koneksi.php";
	
	if(isset($_POST['input'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$pesan = $_POST['pesan'];
		$tgl = $_POST['tgl'];
		if(empty($nama && $email && $pesan)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			$sql = mysqli_query($koneksi, "INSERT INTO tb_contact VALUES(NULL,'$nama','$email','$pesan','$tgl')")or die(mysqli_error());
			if($sql){
				echo "<script>alert('Terima Kasih Atas Kritik dan Saran Anda.. <br> :)')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}else{
				echo "<script>alert('Gagal Input')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}
		}

	}

	$query="SELECT * FROM tb_artikel ORDER BY id_artikel DESC";
	$query_sql=mysqli_query($koneksi, $query);
	$show=mysqli_fetch_array($query_sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<title> Developers | Contact </title>
	<link href="img/logo/favicon.png" rel="icon"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="css/menu.css" rel="stylesheet" type="text/css">
	
	<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<?php include ('menu.php');?>
</header>

<div class="clear-content"></div>

<content>
<div class="container"><br>
	<div class="content">

	<!--Content-->
		<div class="col-sm-8">
			<div id="line-box">
				<center><img src="img/contactUs.png" class="image-responsive" height="150"/></center>
				<p align="center">
						Website ini masih dalam tahap pengembangan dan masih banyak yang harus diperbaiki, kirimkan kritik dan saran kalian agar kami bisa membangun website ini jauh lebih baik lagi..
						<br>Terimakasih telah berkunjung di website kami.
						<br><br>- Budianto -

					</p>
				<br>
				<form action="" method="POST">
          			<div class="col-xs-6">
            			<label for="recipient-name" class="control-label">Nama:</label>
            			<input type="text" class="form-control" id="recipient-name" name="nama">
          			</div>
          			<div class="col-xs-6">
            			<label for="recipient-name" class="control-label">Email:</label>
            			<input type="text" class="form-control" id="recipient-name" name="email">
          			</div>
          			<div class="col-xs-12"><br>
            			<textarea class="form-control" id="message-text" name="pesan" placeholder="Masukan Kritik dan Saran Anda..."></textarea>
            			<input type="hidden" class="form-control" id="recipient-name" name="tgl" value="<?php echo $today;?>">
		
          			</div>
          			<div class="col-xs-5"><br>
						<button type="submit" class="btn btn-default btn-md" name="input">Kirim</button>
          			</div>
    			</form>
    			<div id="clear"></div>
			</div><br>
		</div>

		<!--Side Bar-->
		<div class="col-sm-4">
			<?php include "popular-post.php";?>
			<?php include "other-post.php";?>
		</div>
			<div id="clear"></div>
	</div>
</div>
</content>
	
<footer>
	<div class="footer">
		<div class="container">
			<div class="col-md-12">
				<ul class="list-inline social-footer">
  					<li><a href="http://facebook.com/budianto.24" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
  					<li><a href="http://twitter.com/budianto_24" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></li>
 					<li><a href="http://instagram.com/budianto24" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li>
 				</ul>
  				<font color="#fff"><p> &copy; 2016 All rights reserved. </p></font>
  			</div>
		</div>
	</div>
</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>