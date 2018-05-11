<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){


	});
</script>



<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Peminjam Maksimal</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th>Max</th>
					<th>ID Anggota</th>
					<th>Nama</th>
				</tr>
			<?php
				$query 	= "SELECT count(p.id_buku) as Max, p.id_anggota, a.nm_ang_depan
                   FROM pinjaman p JOIN anggota a ON p.id_anggota = a.id_anggota
                   GROUP BY p.id_anggota
                   HAVING count(p.id_buku) >= 2
                   ";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?= $baris['Max'] ?></td>
				<td><?= $baris[1] ?></td>
				<td><?= $baris[2] ?></td>
			</tr>
      <?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>
