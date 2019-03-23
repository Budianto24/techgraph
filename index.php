<?php 
	include('database/koneksi.php');
	
	$query_sql=mysql_query("SELECT * FROM tb_artikel ORDER BY judul DESC LIMIT 3") or die (mysql_error());
	$show=mysql_fetch_array($query_sql);
	
	$query_sql2=mysql_query("SELECT * FROM tb_slideshow ORDER BY id ASC LIMIT 0,3");
	$show2=mysql_fetch_array($query_sql2);

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	
	<title> Techgraph </title>

	<!--Custom CSS-->
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="img/logo/favicon.png" rel="icon"/>
	
	<!--Bootstrap CSS-->
	<link href="css/bootstrap1.css" rel="stylesheet"> 
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<?php include ('menu.php');?>
</header>

<content>
<div class="clear-content"></div>

<div class="jumbotron">
<div class="container">
	<div class="col-md-8">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="img/banner/home-slider2.png" alt="test" height="auto" width="100%">
			</div>
			<div class="item">
				<img src="img/banner/home-slider1.png" alt="test" height="auto" width="100%">
			</div>
			<div class="item">
				<img src="img/banner/home-slider3.png" alt="test" height="auto" width="100%">
			</div>
		</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

<!--Greeting-->
		<div class="col-md-4"><br>
			<h3> Selamat Datang di </h3>
			<h4> Website Kami </h4>
			Website ini masih dalam tahap pengembangan dan masih banyak yang harus diperbaiki, kirimkan kritik dan saran kalian agar kami bisa membangun website ini jauh lebih baik lagi.. <u><a href="contact">Klik Disini</a></u>
		</div>
	</div>
</div>	

		<!--Panel Info-->
	<div class="container">
		<div class="alert alert-info" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  				<span aria-hidden="true">&times;</span>
			</button>
				<b><span class="glyphicon glyphicon-info-sign"></span>&nbsp;INFO!</b>
				<p></p>
		</div>
		
	<center><h3><b>Artikel Terbaru</b></h3></center><br>
  		<?php do{?>
  			<div class="col-sm-4 col-md-4">
    			<div class="thumbnail">
      				<img src="img/post/<?php echo $show['gambar'];?>" class="img-responsive" alt="Responsive image" width="100%" height="auto"/>
      					<div class="caption">
        					<h3><div id="title_content"><a href="view?title=<?php echo $show['judul'];?>"><div class="title-post"><?php echo $show['judul'];?></div></a></h3>
        						<font color="#666"><p><span class="glyphicon glyphicon-calendar"></span> <?php echo $show['tgl'];?> &nbsp; <span class="glyphicon glyphicon-tag"></span> <?php echo $show['kategori'];?> &nbsp; <span class="glyphicon glyphicon-user"></span>  <?php echo $show['author'];?></p></font>        
      					</div>
    			</div>
  			</div>
  		<?php } while ($show=mysql_fetch_assoc($query_sql));?>
</div>	

	
<center><a class="btn btn-primary btn-xl" href="blog" role="button"> <b>Baca Artikel Lainnya</b> &nbsp;<span class="glyphicon glyphicon-arrow-right"></span></a></center>
	
</div>
</content>

<footer>
	<div class="footer">
		<div class="container">			
				<ul class="list-inline social-footer">
  					<li><a href="http://facebook.com/budianto.24" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
  					<li><a href="http://twitter.com/budianto_24" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></li>
 					<li><a href="http://instagram.com/budianto24" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li>
 				</ul>
  				<font color="#fff"><p> &copy; 2016 All rights reserved. </p></font>
		</div>
	</div>
</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>