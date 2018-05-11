<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){


	});
</script>



<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Union Buku & Donasi</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th>ID</th>
				</tr>
			<?php
				$query 	= "SELECT judul FROM buku
                   UNION
                   SELECT judul_donasi FROM donasi
                   ";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?= $baris[0] ?></td>
			</tr>
      <?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>
