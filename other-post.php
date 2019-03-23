<?php
	include "database/koneksi.php";

	$other_query="SELECT * FROM tb_artikel ORDER BY id_artikel DESC LIMIT 5";
	$other_sql=mysql_query($other_query);
	$other=mysql_fetch_array($other_sql);
?>

<!--Artikel Lainnya-->
<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
	<li class="active"><a href="#tab-1" data-toggle="tab">Artikel Lainnya</a></li>
</ul>
	<div id="my-tab-content" class="tab-content">		
		<div class="tab-pane active" id="tab-1">
			<?php do{?>				
				<div class="media">
  					<div class="media-left">
	    				<a href="view?title=<?php echo $other['judul'];?>">
	      				<img class="media-object" src="img/post/<?php echo $other['gambar'];?>" alt="..." width="70" height="60">
		    			</a>
  					</div>
  					<div class="media-body border-bottom">
    					<h5 class="media-heading"><a href="view?title=<?php echo $other['judul'];?>"><?php echo $other['judul'];?></a></h5>
    					<font color="#666" size="2"><span class="glyphicon glyphicon-calendar"></span> <?php echo $other['tgl'];?> &nbsp; <span class="glyphicon glyphicon-user"></span>  <?php echo $other['author'];?></font>
  					</div>
				</div>
			<?php } while ($other=mysql_fetch_assoc($other_sql));?>
		</div>	
	</div>
<!--End-->