<?php

	$conn = new PDO("mysql:host=localhost; dbname=library", 'root', '');
	$stmt = $conn->prepare("SELECT * FROM pinjaman p JOIN anggota a on a.id_anggota = p.id_anggota
													JOIN buku b on b.id_buku = p.id_buku
													JOIN petugas pet on pet.id_petugas = p.id_petugas
													WHERE status = 'kembali'
													ORDER BY p.kd_pinjam DESC");
	$stmt->execute();
?>
<script type="text/javascript">
	$(document).ready(function(){

		$(".hapus").click(function(){
					var id = $(this).attr('id');
					if (confirm("Anda yakin ingin menghapus ?")){
						$.ajax({
							type : 'POST',
							url  : 'proses.php?aksi=hapus_transaksi',
							data : {id:id},
							success : function(){
								alert("Status = Kembali");
									$('#modalTambah').modal('hide');
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();
									$('#transaksi_kembali').click();
							}
						});
					}
			});

	});
</script>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Transaksi / <a>Kembali</a></h4> </div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
			    <thead>
			      <tr>
			          <th>#</th>
			          <th class="info">Nama</th>
			          <th width=90 class="info">No Telp</th>
			          <th width=150 class="info">Alamat</th>
			          <th width=180 class="success">Judul</th>
			          <th class="success">Pinjam</th>
			          <th width=90 class="success">Due Date</th>
			          <th width=90 class="success">Kembali</th>
			          <th class="success">Status</th>
			          <th class="success">Denda</th>
			          <th width=60>Penerima</th>
			          <th width=80>Aksi</th>
			      </tr>
			    </thead>
			    <tbody>
			  <?php

			    while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
			  ?>

			  <tr>
			    <td> <?= $data->kd_pinjam; ?> </td>
			    <td> <?= $data->nm_ang_depan; ?> </td>
			    <td> <?= $data->no_telp_anggota;?> </td>
			    <td> <?= $data->alamat_anggota;?> </td>
			    <td> <?= $data->judul;?> </td>
			    <td> <?= $data->tgl_pinjam;?> </td>
			    <td> <?= $data->due_date;?> </td>
			    <td> <?= $data->tgl_kembali;?> </td>
			    <td> <?= $data->status;?> </td>
			    <td> <?= $data->denda;?> </td>
			    <td> <?= $data->nm_petugas; ?> </td>
			    <td>
							&nbsp;&nbsp;&nbsp;
							<a href="#" class="hapus" id="<?= $data->kd_pinjam; ?>"?><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    </td>
			  </tr>

			  <tbody>
			  <?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>
