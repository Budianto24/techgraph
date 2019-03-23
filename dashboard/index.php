<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:../login?status=forbidden");
	}
	
	include ('../database/koneksi.php');

	if($_SESSION['status']=="user"){
		$query="SELECT * FROM tb_artikel WHERE author='{$_SESSION['name']}'";
	}else if($_SESSION['status']="admin"){
		$query="SELECT * FROM tb_artikel ORDER BY id_artikel ASC";
	}
		$query_sql=mysql_query($query);
		$show=mysql_fetch_array($query_sql);
		$jumlah=mysql_num_rows($query_sql);
        $no=0;
		
		$query="SELECT * FROM tb_contact ORDER BY id_contact ASC";
		$query_sql=mysql_query($query);
		$show=mysql_fetch_array($query_sql);
		$guestbook=mysql_num_rows($query_sql);

        $query="SELECT * FROM tb_login ORDER BY id ASC";
        $query_sql=mysql_query($query);
        $show=mysql_fetch_array($query_sql);
        $user=mysql_num_rows($query_sql);

        $query="SELECT * FROM tb_komentar WHERE author='{$_SESSION['name']}' ORDER BY id_comment ASC";
        $query_sql=mysql_query($query);
        $show=mysql_fetch_array($query_sql);
        $comment=mysql_num_rows($query_sql);
	
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

    <title>Dashboard | <?php $_SESSION['status'];?></title>
	
    <!--Font CSS-->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/admin-style.css" rel="stylesheet">
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
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
                         <h2><span class="fa fa-th-large"></span>&nbsp;Dashboard</h2><hr>
                         <!--Panel Info-->
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <b><span class="glyphicon glyphicon-info-sign"></span>&nbsp;INFO!</b>
                <p>Website ini masih dalam tahap pengembangan dan masih banyak yang harus diperbaiki, kirimkan kritik dan saran kalian agar kami bisa membangun website ini jauh lebih baik lagi.. <u><a href="contact">Klik Disini</a></u></p>
        </div>
						 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $comment?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $jumlah?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="post">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $guestbook?></div>
                                        <div>Guestbook</div>
                                    </div>
                                </div>
                            </div>
                            <a href="guestbook">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user;?></div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				<br>
				<div class="row">
					<div class="col-md-6">
					<div class="panel panel-primary">
				<div class="panel-heading"><div class="title-box"><b><span class="fa fa-envelope"></span>&nbsp; New Massage</b></div></div>
					<div class="panel-body">
					       <p>Tidak Ada Pesan..</p>
					</div>				
			</div>
					</div>
					
					<div class="col-md-6">
					<div class="panel panel-primary">
				<div class="panel-heading"><div class="title-box"><b><span class="glyphicon glyphicon-pushpin"></span>&nbsp; Last Post</b></div></div>
					<div class="panel-body">
						<?php
	include('../database/koneksi.php');
	
	$query="SELECT * FROM tb_artikel WHERE author='{$_SESSION['name']}' ORDER BY id_artikel DESC";
	$query_sql=mysql_query($query);
	$other=mysql_fetch_array($query_sql);
	$no=0;
?>			
<div class="media">
  <div class="media-left">
    <a href="read-artikel?judul=<?php echo $other['judul'];?>">
      <img class="media-object" src="../img/post/<?php echo $other['gambar'];?>" alt="..." width="100" height="90">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href="../read-artikel?judul=<?php echo $other['judul'];?>"><?php echo $other['judul'];?></a></h4>
    <font color="#666" size="2"><span class="glyphicon glyphicon-calendar"></span> <?php echo $other['tgl'];?> &nbsp; <span class="glyphicon glyphicon-tag"></span>  <?php echo $other['kategori'];?> &nbsp; <span class="glyphicon glyphicon-user"></span>  <?php echo $other['author'];?> </font>
	<p><?php echo substr($other['isi'],0,100);?>...</p>
  </div>
</div>
					</div>
					</div>
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