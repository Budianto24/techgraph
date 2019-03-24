<?php
	session_start();
	include "database/koneksi.php";
	
	if(isset($_POST['login'])){
		$username= $_POST['username'];
		$password= $_POST['password'];
	
		$query_data = mysqli_query($koneksi, "SELECT * FROM tb_login where username='$username' and password='$password' ");
		$row = mysqli_num_rows($query_data);
			if(empty($username && $password)){
				echo "<script>alert('Tidak boleh kosong !!')</script>";
				echo "<script>window.history.back()</script>";
			} else {
				if($row == TRUE	){
				while($data = mysqli_fetch_array($query_data)){
					$status = $data['status'];
						if($status == "user"){
							$_SESSION['name']=$username;
							$_SESSION['status']=$status;
							header("location:dashboard");
						} else if ($status == "admin"){
							$_SESSION['name']=$username;
							$_SESSION['status']=$status;
							header("location:dashboard");
						}
				}
				} else {
				header("location:login?status=gagal");
				}
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<title>Login</title>

	<!--Custom CSS-->
	<link href="css/login.css" rel="stylesheet" type="text/css">

	<!--Bootstrap CSS-->
	<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<?php include ('menu.php');?>
</header>

<div class="container">
	<div class="warp-content">
		<center><a href="index"><img src="img/logo/logo-dev.png" height="150" title="Developers"></a></center>
			<h3>Login</h3>
				<p>Website ini masih dalam tahap pengembangan dan masih banyak yang harus diperbaiki, tinggal kritik dan saran kalian agar kami bisa membangun website ini jauh lebih baik lagi.. Klik <a href="contact">Disini</a></p>
				<hr>
<?php
	if(isset($_GET['status'])){
		if($_GET['status']=="gagal"){
			echo"<blockquote>Username atau Password salah !!</blockquote>";
		} 
		else if($_GET['status']=="forbidden") {
			echo "<script>alert('Anda Belum Melakukan Login !!')</script>";
		}
	}
?>
<form method="POST" action="" accept-charset="UTF-8">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
					<input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" name="username" placeholder="Username">
				</div>	
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
					<input type="password" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" name="password" placeholder="Password">
				</div>	
			</div>
		<center><button type="submit" class="btn btn-default" name="login">Sign In</button></center>
</form>
<br>
<center><p>Copyright © 2015 - 2016 Developers. <br>All Rights Reserved</p></center>
</div>
</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>