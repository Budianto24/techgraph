<?php
		session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include "../database/koneksi.php";
	
	$id=$_GET['id'];
	$show = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id='$id'");
	
	if(mysqli_num_rows($show)==0){
		echo "<script>window.history.back()</script>";
	}else{
		$data=mysqli_fetch_assoc($show);
	}

	if(isset($_POST['input'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		if(empty($username && $password && $email && $status)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			$data = mysqli_query($koneksi, "UPDATE tb_login SET username='$username', password='$password', email='$email', status='$status' WHERE id='$id'")or die(mysqli_error());
			if($data){
				echo "<script>alert('Berhasil Update')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}else{
				echo "<script>alert('Gagal Update')</script>";
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}
		}
	}

	$query="SELECT * FROM tb_login ORDER BY id ASC";
	$query_sql=mysqli_query($koneksi, $query);
	$show=mysqli_fetch_array($query_sql);
	$no=0;

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
    <link href="../css/admin-style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

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
                         <h2><span class="fa fa-users"></span>&nbsp;Update Users</h2><hr>
<center>
<form action="" method="POST">
	<b>Update User : </b>
	<input type="text" name="username" placeholder="username" value="<?php echo $data['username'];?>"/>
	<input type="text" name="password" placeholder="password" value="<?php echo $data['password'];?>"/>
	<input type="text" name="email" placeholder="email" value="<?php echo $data['email'];?>"/>
	<select name="status">
		<option>--Status--</option>
		<option value="user">User</option>
		<option value="admin">Admin</option>
	</select>
	<input type="submit" value="Kirim" name="input"/>
</form>
</center>
<br><br>
<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                            <thead>
    <tr>
        <th>NO</th>
        <th width="450">USERNAME</th>
        <th>PASSWORD</th>
        <th>EMAIL</th>
        <th>STATUS</th>
        <th style="width:100;"></th>
    </tr>
    </thead>
    <tbody>
    <?php do{ $no++?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td><?php echo $show['username'];?></td>
        <td><?php echo $show['password'];?></td>
        <td><?php echo $show['email'];?></td>
        <td><?php echo $show['status'];?></td>
        <td align="center">
            <a class="btn btn-default btn-md" href="update-user.php?id=<?php echo $show['id'];?>" title="Edit" role="button"><span class="fa fa-pencil-square-o"></span></a>                            
            <a class="btn btn-default btn-md" href="delete-user.php?id=<?php echo $show['id'];?>" title="Delete" role="button"><span class="fa fa-trash"></span></a>
        </td>
    </tr>
    <?php } while($show=mysqli_fetch_array($query_sql));?>
    </tbody>
</table>
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