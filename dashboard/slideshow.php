<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include ('../database/koneksi.php');
	
	$query="SELECT * FROM tb_slideshow ORDER BY id ASC";
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
                         <h2><span class="fa fa-pic"></span>&nbsp;Slideshow</h2><hr>				
                        <div class="col-lg-2">
							<table class="table table-bordered table-hover">
								<tr>
									<th>NO</th>
									<th width="450">PICTURE</th>
									<th></th>
								</tr>
									<?php do{ $no++?>
								<tr>
									<td><?php echo $no;?></td>
									<td><img src="../img/banner/<?php echo $show['gambar'];?>" width="550" height="150"/></td>
									<td align="center">
										<a  class="btn btn-default btn-md" href="slideshow-input.php?id=<?php echo $show['id'];?>" title="Changed" role="button"><span class="fa fa-edit"></span></a>
									</td>
								</tr>
									<?php } while($show=mysqli_fetch_array($query_sql));?>
							</table>
                		</div>
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