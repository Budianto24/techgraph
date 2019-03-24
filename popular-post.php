<?php
	include('database/koneksi.php');

	$popular_query="SELECT * FROM tb_artikel ORDER BY id_artikel DESC LIMIT 5";
	$popular_sql=mysqli_query($koneksi, $popular_query);
	$popular=mysqli_fetch_array($popular_sql);
	$no=0;
?>			
<!--Artikel Popular & Kategori-->
<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
	<li class="active"><a href="#tab-1" data-toggle="tab">Popular Post</a></li>
	<li><a href="#tab-2" data-toggle="tab">Category</a></li>
</ul>
	<div id="my-tab-content" class="tab-content">
		<div class="tab-pane active" id="tab-1">
			<ul class="list-group">
				<?php do{ $no++?>
					<div class="title-box">
						<a class="list-group-item" href="view?title=<?php echo $popular['judul'];?>">
							<?php echo $popular['judul'];?><span class="badge"><?php echo $no?></span>
						</a> 
					</div>
				<?php } while ($popular=mysqli_fetch_assoc($popular_sql));?>
			</ul>
		</div>	
		<div class="tab-pane" id="tab-2">
			<h1>PHP Framework</h1>
			<p>Lorem Ipsum is simply dummy</p>			
		</div>
	</div>