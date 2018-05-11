<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$("#btn_tambah_transaksi").click(function(){
			var kd_pinjam 	= $('#kd_pinjam').val();
			var id_anggota 	= $('#id_anggota').val();
			var id_buku 		= $('#id_buku').val();
			var id_petugas 	= $('#id_petugas').val();
			var tgl_pinjam 	= $('#tgl_pinjam').val();
			var due_date 		= $('#due_date').val();
			$.ajax({
				url : 'proses.php?aksi=tambah_transaksi',
				data: {kd_pinjam:kd_pinjam, id_anggota:id_anggota, id_buku:id_buku, id_petugas:id_petugas, tgl_pinjam:tgl_pinjam, due_date:due_date},
				type: 'POST',
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#transaksi').click();
				}
			});
		});

		$(".checked").click(function(){
			var id 		= $(this).attr('id');
			var buku 	= $(this).attr('id2');
			if (confirm("Buku sudah kembali ?")){
				$.ajax({
					type : 'POST',
					url  : 'proses.php?aksi=checked_transaksi',
					data : {id:id, buku:buku},
					success : function(){
						alert("Data Berhasil Dihapus");
							$('#modalTambah').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#transaksi').click();
					}
				});
			}
		});

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
									$('#transaksi').click();
							}
						});
					}
				});

		$(".ubah").click(function(){
			var id = $(this).attr('id');
			$("#isiModalUpdate").load("update_transaksi.php?id="+id);
		});
	});
</script>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Transaksi</h4> </div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#modalTambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Peminjaman</button><br><br>
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
			    <thead>
			      <tr>
			          <th >#</th>
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
			    $sql = 	"SELECT * FROM
			             pinjaman p JOIN anggota a on a.id_anggota = p.id_anggota
			                        JOIN buku b on b.id_buku = p.id_buku
			                        JOIN petugas pet on pet.id_petugas = p.id_petugas
															ORDER BY p.kd_pinjam AND status='kembali' ASC;
			            ";

			    $result = mysqli_query($connect,$sql) or die ("Error : ". mysqli_error($connect));

			    while ($data = mysqli_fetch_array($result)){
			  ?>

			  <tr>
			    <td> <?= $data[0]; ?> </td>
			    <td> <?= $data['nm_ang_depan'];?> </td>
			    <td> <?= $data['no_telp_anggota'];?> </td>
			    <td> <?= $data['alamat_anggota'];?> </td>
			    <td> <?= $data['judul'];?> </td>
			    <td> <?= $data['tgl_pinjam'];?> </td>
			    <td> <?= $data['due_date'];?> </td>
			    <td> <?= $data['tgl_kembali'];?> </td>
			    <td> <?= $data['status'];?> </td>
			    <td> <?= $data['denda'];?> </td>
			    <td> <?= $data['nm_petugas']; ?> </td>
			    <td>
						<?php
							if($data['status'] == "pinjam"){
						?>
							<a  href="#" class="ubah" id="<?= $data[0] ?>" data-toggle="modal" data-target="#modalUpdate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
							<a href="#" class="checked" id="<?= $data['kd_pinjam'] ?>" id2="<?= $data['id_buku']?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
						<?php
							}else{
						?>
							&nbsp;&nbsp;&nbsp;
							<a href="#" class="hapus" id="<?= $data['kd_pinjam'] ?>"?><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						<?php
							}
						?>
			    </td>
			  </tr>

			  <tbody>
			  <?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Peminjaman</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
				<form class="form_transaksi">
				<div class="row">
        <div class="col-md-6">
	          <div class="form-group">
								<div class="form-group" style="display:none;">
									<label>Kode Pinjam</label>
									<?php
										$query	  = $connect->query("SELECT kd_pinjam FROM pinjaman ORDER BY kd_pinjam DESC LIMIT 1");
										$result   = mysqli_fetch_array($query);
										$order		= $result[0]+1;
									?>
									<input class="form-control" name="kd_pinjam" id="kd_pinjam" value="<?= $order ?>" readonly/>
								</div>
		  					<label>Nama Peminjam</label>
		  					<select class="form-control" name="id_anggota" id="id_anggota">
		                          <option disabled selected>--Pilih Nama--</option>
															<?php
																$sql_a = $connect->query("SELECT * FROM anggota ORDER BY id_anggota ASC");

																while ($anggota = $sql_a-> fetch_assoc()){
															?>
																<option value="<?= $anggota['id_anggota']; ?>">
																	<?= $anggota['nm_ang_depan']." - ".$anggota['id_anggota']; ?>
																</option>
															<?php } ?>
		  					</select>
	          </div>
	          <div class="form-group">
	  					<label>Judul Buku</label>
	  					<select class="form-control" name="id_buku" id="id_buku">
	                          <option disabled selected>--Pilih Judul Buku--</option>
														<?php
															$sql_b = $connect->query("SELECT * FROM buku WHERE stok >= 1 ORDER BY id_buku ASC");
															while ($buku = $sql_b-> fetch_assoc()){
														?>
															<option value="<?= $buku['id_buku']; ?>"><?= $buku['judul']; ?></option>
														<?php } ?>
	  					</select>
	          </div>
						<div class="form-group">
							<label>Petugas</label>
							<select class="form-control" name="id_petugas" id="id_petugas">
														<option disabled selected>--Pilih Petugas--</option>
														<?php
															$sql_p = $connect->query("select * from petugas ORDER BY id_petugas ASC");
															while ($petugas = $sql_p-> fetch_assoc()){
														?>
															<option value="<?= $petugas['id_petugas']; ?>"><?= $petugas['nm_petugas']; ?></option>
														<?php } ?>
							</select>
						</div>
				</div>

        <div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Pinjam</label>
							<input class="form-control" name="tgl_pinjam" id="tgl_pinjam" type="date" value="<?= date('Y-m-d'); ?>" readonly/>
						</div>
						<div class="form-group">
							<label>Due Date</label>
							<?php
								$date=strtotime(date('Y-m-d'));  // if today :2013-05-23
								$newDate = date('Y-m-d',strtotime('+14 days',$date));
							?>
							<input class="form-control" name="due_date" id="due_date" type="date" value="<?= $newDate; ?>"/>
						</div>
				</div>
				</div>
				</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_transaksi" class="btn btn-info">Tambah</button>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="modalUpdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalUpdate">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_update_transaksi" class="btn btn-info">Update</button>
      </div>

    </div>
  </div>
</div>
