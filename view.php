<?php
	include ('database/koneksi.php');
	
	$judul=$_GET['title'];
	$data = mysql_query("SELECT * FROM tb_artikel WHERE judul='$judul'");
	$show_filter=mysql_fetch_assoc($data);
	$id_post=$show_filter['id_artikel'];
    

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />	
	
	<title> Developers | <?php echo $show_filter['judul'];?> </title>
	
	<!--Custom CSS-->
	<link href="img/logo/favicon.png" rel="icon"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	
	<!--Bootstrap CSS-->
	<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">		
	
	<!--Font CSS-->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<?php include ('menu.php');?>
</header>

<div class="clear-content"></div>

<content>
<div class="container"><br>
		<!--Content-->
		<div class="col-sm-8">
			<div id="line-box"><span class="glyphicon glyphicon-th-list"></span> <a href="gallery">Gallery</a> » <a href=""><?php echo $show_filter['kategori'];?></a> » <?php echo $show_filter['judul'];?> </div>				
			<div id="line-box">
				<div class="title-post"><?php echo $show_filter['judul'];?></div>
					<font color="#666"><p><span class="glyphicon glyphicon-calendar"></span> <?php echo $show_filter['tgl'];?> &nbsp; <span class="glyphicon glyphicon-tag"></span> <?php echo $show_filter['kategori'];?> &nbsp; <span class="glyphicon glyphicon-user"></span>  <?php echo $show_filter['author'];?>  <div id="stars-herats"><input type="hidden" name="rating"/></div></p></font>
					<br><center><img src="img/post/<?php echo $show_filter['gambar'];?>" height="auto" width="100%" class="image-responsive"></center><br>
					<font size="4"><?php echo $show_filter['isi'];?></font>
				</div>
				<?php include "comment.php";?>
		</div>

		<!--Sidebar-->
		<div class="col-sm-4">
			<?php include "popular-post.php";?>
			<?php include "other-post.php";?>
		</div>
			<div id="clear"></div>
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
	<script src="js/bootstrap-star-rating.js"></script>
</body>
</html>