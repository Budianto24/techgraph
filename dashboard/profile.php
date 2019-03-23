<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include "../database/koneksi.php";
	
	if(isset($_POST['input'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		if(empty($username && $password && $email)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			$sql = mysql_query("INSERT INTO tb_login VALUES(NULL,'$username','$password','$email','$status')")or die(mysql_error());
			if($sql){
				echo "<script>alert('Berhasil Input')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}else{
				echo "<script>alert('Gagal Input')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}
		}
	}

	$query="SELECT * FROM tb_login ORDER BY id ASC";
	$query_sql=mysql_query($query);
	$show=mysql_fetch_array($query_sql);
	$no=0;

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
<div id="title-content">Profile</div>
<hr>
<br>
<center>
<form action="" method="POST">
	<b>Tambah User : </b>
	<input type="text" name="username" placeholder="username"/>
	<input type="text" name="password" placeholder="password"/>
	<input type="text" name="email" placeholder="email"/>
	<select name="status">
		<option>--Status--</option>
		<option value="admin">Admin</option>
		<option value="super-admin">Super Admin</option>
	</select>
	<input type="submit" value="Kirim" name="input"/>
</form>
</center>
<br><br>
<table border="1" width="800" cellpadding="5" cellspacing="0">
	<tr bgcolor="#ddd">
		<th>NO</th>
		<th width="450">USERNAME</th>
		<th>PASSWORD</th>
		<th>EMAIL</th>
		<th>STATUS</th>
		<th width="350"></th>
	</tr>
	<?php do{ $no++?>
	<tr>
		<td align="center"><?php echo $no;?></td>
		<td><?php echo $show['username'];?></td>
		<td><?php echo $show['password'];?></td>
		<td><?php echo $show['email'];?></td>
		<td><?php echo $show['status'];?></td>
		<td align="center"><div id="button"><a href="update-user.php?id=<?php echo $show['id'];?>">Update</a> <a href="delete-user.php?id=<?php echo $show['id'];?>">Delete</a></div></td>
	</tr>
	<?php } while($show=mysql_fetch_array($query_sql));?>
</table>
</div>

</body>
</html>