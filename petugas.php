<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$("#btn_tambah_petugas").click(function(){
			var id_petugas 	= $('#id_petugas').val();
			var nama 				= $('#nama').val();
			var no_telp 		= $('#no_telp').val();
			var alamat 			= $('#alamat').val();
			var shift 			= $('#shift').val();
			var user_level 	= $('#user_level').val();
			$.ajax({
				url 	: 'proses.php?aksi=tambah_petugas',
				data 	: {id_petugas:id_petugas, nama:nama, no_telp:no_telp, alamat:alamat, shift:shift, user_level:user_level},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#petugas').click();
				}
			});
		});

		$(".hapus").click(function(){
			var id = $(this).attr('id');
			if (confirm("Anda yakin ingin menghapus ?")){
				$.ajax({
					type : 'POST',
					url  : 'proses.php?aksi=hapus_petugas',
					data : {id:id},
					success : function(){
						alert("Data Berhasil Dihapus");
							$('#modalTambah').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#petugas').click();
					}
				});
			}
		});

		$(".ubah").click(function(){
			var id = $(this).attr('id');
			$("#isiModalUpdate").load("update_petugas.php?id="+id);
		});

		$(".viewApply").click(function(){
			var id = $(this).attr('id');
			$("#isiModalViewApply").load("petugas_view_apply.php?id="+id);
		});

	});
</script>



<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Petugas</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#modalTambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Petugas</button><br><br>
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th>ID</th>
					<th>Nama</th>
					<th>No Telp</th>
					<th>Alamat</th>
					<th width=80>Shift</th>
					<th width=80>Apply</th>
					<th width=90>User Level</th>
					<th width=66>Aksi</th>
				</tr>
			<?php
				$query 	= "SELECT pet.id_petugas, pet.nm_petugas, pet.alamat_petugas, pet.no_telp_petugas, pet.shift, count(pin.id_petugas) AS count_petugas, pet.user_level
									 FROM petugas pet LEFT JOIN pinjaman pin
									 ON pet.id_petugas = pin.id_petugas
									 GROUP BY pet.id_petugas";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?= $baris[0] ?></td>
				<td><?= $baris[1] ?></td>
				<td><?= $baris[2] ?></td>
				<td><?= $baris[3] ?></td>
				<td><?= $baris[4] ?></td>
				<td>
					<?= $count = $baris[5]; if($count >= 1){ ?>
						<a href="#" class="viewApply" id="<?= $baris[0] ?>" data-toggle="modal" data-target="#modalViewApply"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
					<?php } ?>
				</td>
				<td><?= $baris[6] ?></td>
				<td>
					<a  href="#" class="ubah" id="<?= $baris[0] ?>" data-toggle="modal" data-target="#modalUpdate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
					<a href="#" class="hapus" id="<?= $baris[0] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				</td>
			</tr>
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
        <h4 class="modal-title">Tambah Data Petugas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
        <form class="form_petugas">
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="id_petugas">ID Petugas :</label>
						<?php
						$query	  = $connect->query("SELECT id_petugas FROM petugas ORDER BY id_petugas DESC LIMIT 1");
						$result   = mysqli_fetch_array($query);
						$order		= $result[0]+1;
						?>
				    <input type="text" class="form-control" name="id_petugas" id="id_petugas" value="<?= $order ?>" disabled>
				  </div>
				  <div class="form-group">
				    <label for="nama">Nama :</label>
				    <input type="text" class="form-control" name="nama" id="nama">
				  </div>
				  <div class="form-group">
				    <label for="no_telp">No Telp :</label>
				    <input type="text" class="form-control" name="no_telp" id="no_telp">
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="alamat">Alamat :</label>
				    <input type="text" class="form-control" name="alamat" id="alamat">
				  </div>
				  <div class="form-group">
					  <label for="shift">Shift :</label>
					  <select class="form-control" name="shift" id="shift">
					    <option disabled selected>--Pilih Shift--</option>
					    <option value="pagi">Pagi</option>
					    <option value="siang">Siang</option>
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="user_level">User Level :</label>
					  <select class="form-control" id="user_level" name="user_level">
					    <option disabled selected>--Pilih level--</option>
					    <option value="1">1 - Admin</option>
					    <option value="2">2 - Petugas</option>
					  </select>
				  </div>
				</div>
				</div>
		  	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_petugas" class="btn btn-info">Tambah</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalUpdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Petugas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalUpdate">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_update_petugas" class="btn btn-info">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalViewApply">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Histori Apply</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalViewApply">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
