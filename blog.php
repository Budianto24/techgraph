<?php
	include ('database/koneksi.php');
	
	$artikel_query="SELECT * FROM tb_artikel ORDER BY id_artikel DESC";
	$artikel_sql=mysqli_query($koneksi, $artikel_query);
	$artikel=mysqli_fetch_array($artikel_sql);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	
	<title> Developers | Gallery </title>

	<!--Custom CSS-->
	<link href="img/logo/favicon.png" rel="icon"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	
	<!--Bootstrap CSS-->	
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
		<div class="col-sm-8">
			<div id="line-box"><span class="glyphicon glyphicon-th-list"></span> <a href="blog">Blog</a></div>	
	<?php 
	// includekan fungsi paginasi
    	include 'pagination1.php';
	// koneksi ke database
		include 'database/koneksi.php';
        
	// query
    	$sql =  "SELECT * FROM tb_artikel ORDER BY id_artikel DESC";
    	$result = mysqli_query($koneksi, $sql);
        
	// pagination config start
    	$rpp = 5; // jumlah record per halaman
    	$reload = "blog?";
    	$page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
    	$tcount = mysqli_num_rows($result);
    	$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
    	$count = 0;
    	$i = ($page-1)*$rpp;
    	$no_urut = ($page-1)*$rpp;
//pagination config end
	?>
	<?php
		while(($count<$rpp) && ($i<$tcount)) {
		mysqli_data_seek($result,$i);
		$show = mysqli_fetch_array($result);
	?>
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
	<?php $i++; $count++;}?>
	
	<center><div><?php echo paginate_one($reload, $page, $tpages); ?></div></center>
    
		</div>

		<!--Side Bar-->
		<div class="col-sm-4">
			<?php include "popular-post.php";?>
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