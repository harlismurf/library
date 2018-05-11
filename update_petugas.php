<?php
	include "koneksi.php";

	$id = $_GET['id'];

	$query 	= mysqli_query($connect,"SELECT * FROM petugas WHERE id_petugas='$id'") or die (mysqli_error());
	$data 	= mysqli_fetch_array($query);
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_petugas").click(function(){
			var id_petugas 	= $('#id_petugas2').val();
			var nama 				= $('#nama2').val();
			var no_telp 		= $('#no_telp2').val();
			var alamat 			= $('#alamat2').val();
			var shift 			= $('#shift2').val();
			var user_level 	= $('#user_level2').val();
			$.ajax({
				url 	: 'proses.php?aksi=update_petugas',
				data 	: {id_petugas:id_petugas, nama:nama, no_telp:no_telp, alamat:alamat, shift:shift, user_level:user_level},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Diupdate");
					$('modalUpdate').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#petugas').click();
				}
    	});
		});
	});
</script>


    <form class="form_anggota">
			<div class="form-group">
				<label for="id_petugas">ID Petugas :</label>
				<input value="<?= $data[0] ?>" type="text" class="form-control" name="id_petugas" id="id_petugas2" readonly>
			</div>
			<div class="form-group">
				<label for="nama">Nama :</label>
				<input value="<?= $data[1] ?>" type="text" class="form-control" name="nama" id="nama2">
			</div>
			<div class="form-group">
				<label for="no_telp">No Telp :</label>
				<input value="<?= $data[2] ?>" type="text" class="form-control" name="no_telp" id="no_telp2">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat :</label>
				<input value="<?= $data[3] ?>" type="text" class="form-control" name="alamat" id="alamat2">
			</div>
			<div class="form-group">
					<label for="shift">Shift</label>
					<select class="form-control" name="shift" id="shift2">
								<option disabled>--Pilih Shift--</option>
								<option value="pagi"  <?php if($data[4]=='pagi'){echo "selected";}?> > Pagi </option>
								<option value="siang" <?php if($data[4]=='siang'){echo "selected";}?> > Siang </option>
					</select>
			</div>
			<div class="form-group">
				<label for="user_level">User Level :</label>
				<select class="form-control" name="user_level" id="user_level2">
					<option disabled>--Pilih level--</option>
					<option value="1" <?php if($data[5]==1){echo "selected";}?> >1 - ADMIN </option>
					<option value="2" <?php if($data[5]==2){echo "selected";}?> >2 - Petugas </option>
				</select>
			</div>
		</form>
