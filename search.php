<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<title> Developers | Gallery </title>
		<link href="img/logo/favicon.png" rel="icon"/>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		
		<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<?php include ('menu.php');?>
</header>

<div class="clear-content"></div>

<div class="container"><br>
		<div class="col-sm-8">
		<div id="line-box"><span class="glyphicon glyphicon-th-list"></span> <a href="blog">Blog</a> » Search </div>				
		<?php
		if(isset($_GET['data'])){
		include ('database/koneksi.php');
	$data = $_GET['data'];
	$sql = "select * from tb_artikel where judul like '%$data%' ";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		?>
			<?php
			while($show = mysql_fetch_array($result)){?>
	<div id="line-box">
		<div class="col-md-4">
			<div class="img_content"><center><img src="img/post/<?php echo $show['gambar'];?>" height="150"/></center></div>
		</div>
			<div class="col-md-8">
				<div id="title_content"><a href="view?title=<?php echo $show['judul'];?>"><div class="title-post"><?php echo $show['judul'];?></div></a></div>
					<font color="#666"><p><span class="glyphicon glyphicon-calendar"></span> <?php echo $show['tgl'];?> &nbsp; <span class="glyphicon glyphicon-tag"></span> <?php echo $show['kategori'];?> &nbsp; <span class="glyphicon glyphicon-user"></span>  <?php echo $show['author'];?></p></font>
					<p><?php echo substr($show['isi'],0,100);?>...</p>
					<a class="btn btn-default btn-xs" href="view?title=<?php echo $show['judul'];?>" role="button"><span class="glyphicon glyphicon-hand-right"></span>&nbsp; Selengkapnya</a>
				</div>
					<div id="clear"></div>
	</div>
			<?php }?>
		<?php
	}else{
		echo '<div id="line-box"><center><img src="img/not-found.jpg"/><br>Data not found!</center></div>';
	}
}?>
			
		</div>

				<!--Side Bar-->
		<div class="col-sm-4">
			<?php include "popular-post.php";?>
			<?php include "other-post.php";?>
		</div>
	</div>	
</div>

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