<?php
	include "database/koneksi.php";
	
	if(isset($_POST['input'])){
		$id_post = $_POST['id_post'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$komentar = $_POST['komentar'];
		$website = $_POST['website'];
		$author = $_POST['author'];
		$judul_post = $_POST['judul_post'];
		$tgl_comment = $_POST['tgl_comment'];
		if(empty($nama && $email && $komentar)){
			echo "<script>alert('Tidak boleh kosong !!')</script>";
			echo "<meta http-equiv='refresh' content='1' url='login.php'>";
		}else{
			$sql = mysqli_query($koneksi, "INSERT INTO tb_komentar VALUES(NULL,'$id_post','$nama','$email','$komentar','$website','$author','$judul_post','$tgl_comment')")or die(mysqli_error());
			if($sql){
				echo "<meta http-equiv='refresh' content='0' url='read-artikel'>";
			}else{
				echo "<meta http-equiv='refresh' content='1' url='login.php'>";
			}
		}
		

	}

	$com_query=mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_post='$id_post' ORDER BY id_comment ASC");
	$com=mysqli_fetch_array($com_query);

	$today=date('d M Y');
?>
	
	<br>
	Ada <b><?php  $com_num=mysqli_num_rows($com_query); echo $com_num;?></b> Komentar di  "<b><?php echo $show_filter['judul'];?></b>"<br><br>
				
	<?php if($com_num == "0"){
		echo "<b>Tidak Ada Komentar !!</b>";
		}else
		do{?>			
			<div class="media border-top">
				<div class="media-left">
    				<span class="fa fa-user fa-4x"></span>
  				</div>
  				<div class="media-body">
   					<h4 class="media-heading"><a href="<?php echo $com['website'];?>"><font color="red"><?php echo $com['nama'];?></font></a>&nbsp; <font color="#666" size="2px"><?php echo $com['tgl_comment'];?></font></h4>
    				<p><?php echo $com['komentar'];?></p>
				</div>
			</div>
		<?php } while($com=mysqli_fetch_array($com_query));?>

	<hr>
	<form action="" method="POST">
          <div class="col-xs-6">
            <label for="recipient-name" class="control-label">Nama *</label>
            <input type="text" class="form-control" id="recipient-name" name="nama">
          </div>
          <div class="col-xs-6">
            <label for="recipient-name" class="control-label">Email *</label>
            <input type="text" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="col-xs-12">
          	<br>
          	<label for="recipient-name" class="control-label">Website</label>
            <input type="text" class="form-control" id="recipient-name" name="website" value="http://">
            <br>
            <textarea class="form-control" id="message-text" name="komentar" placeholder="Masukan Komentar Anda..."></textarea>
            <input type="hidden" class="form-control" id="recipient-name" name="id_post" value="<?php echo $show_filter['id_artikel'];?>">
            <input type="hidden" class="form-control" id="recipient-name" name="judul_post" value="<?php echo $show_filter['judul'];?>">
            <input type="hidden" class="form-control" id="recipient-name" name="author" value="<?php echo $show_filter['author'];?>">
            <input type="hidden" class="form-control" id="recipient-name" name="tgl_comment" value="<?php echo $today;?>"><br>
			<button type="submit" class="btn btn-default btn-md" name="input">Kirim</button>
		</div>
    </form>
    <div id="clear"></div>
    <hr><br>