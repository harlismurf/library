<?php
	include "koneksi.php";

	$id = $_GET['id'];

	$query 	= mysqli_query($connect,"SELECT * FROM anggota WHERE id_anggota='$id'") or die (mysqli_error());
	$data 	= mysqli_fetch_array($query);
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_anggota").click(function(){
      var id 					= $('#id2').val();
			var nm_depan 		= $('#nm_depan2').val();
			var nm_blakang 	= $('#nm_blakang2').val();
			var no_telp 		= $('#no_telp2').val();
			var alamat 			= $('#alamat2').val();
			var ttl 				= $('#ttl2').val();
			var tgl_daftar 	= $('#tgl_daftar2').val();
			$.ajax({
				url 	: 'proses.php?aksi=update_anggota',
				data  : {id:id, nm_depan:nm_depan, nm_blakang:nm_blakang, no_telp:no_telp, alamat:alamat, ttl:ttl, tgl_daftar:tgl_daftar},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Diupdate");
					$('modalUpdate').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#anggota').click();
				}
    	});
		});
	});
</script>

<form class="form_anggota">
  <div class="form-group">
      <label>ID Anggota</label>
      <a href="#" id="id_anggota">
         <span class="glyphicon glyphicon-question-sign"></span>
       </a>
      <input value="<?= $data[0] ?>" class="form-control" name="id" id="id2" readonly/>
  </div>
  <div class="form-group">
      <label>Nama Depan</label>
      <input value="<?= $data[1] ?>" class="form-control" name="nm_depan" id="nm_depan2"/>
  </div>
  <div class="form-group">
      <label>Nama Belakang</label>
      <input value="<?= $data[2] ?>" class="form-control" name="nm_blakang" id="nm_blakang2"/>
  </div>
  <div class="form-group">
      <label>Tempat & Tanggal Lahir</label>
      <input value="<?= $data[3] ?>" class="form-control" name="ttl" id="ttl2"/>
  </div>
  <div class="form-group">
      <label>No Telp</label>
      <input value="<?= $data[4] ?>" class="form-control" name="no_telp" id="no_telp2"/>
  </div>
  <div class="form-group">
      <label>Alamat</label>
      <textarea class="form-control" name="alamat" id="alamat2"><?= $data[5] ?></textarea>
  </div>

  <div class="form-group">
      <label>Tanggal Daftar</label>
      <input value="<?= $data[6] ?>" class="form-control" name="tgl_daftar"  id="tgl_daftar2" type="date"/>
  </div>
</form>
