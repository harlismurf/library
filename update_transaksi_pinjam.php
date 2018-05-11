<?php
	include "koneksi.php";

	$id = $_GET['id'];

  $join = $connect->query("SELECT * FROM
                           pinjaman p JOIN anggota a on a.id_anggota = p.id_anggota
                                      JOIN buku b on b.id_buku = p.id_buku
                                      JOIN petugas pet on pet.id_petugas = p.id_petugas
                                      WHERE p.kd_pinjam = $id;
                          ");
  $tampil = $join->fetch_assoc();
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_transaksi").click(function(){
			var kd_pinjam 	= $('#kd_pinjam2').val();
			var id_anggota 	= $('#id_anggota2').val();
			var id_buku 		= $('#id_buku2').val();
			var id_petugas 	= $('#id_petugas2').val();
			var due_date 		= $('#due_date2').val();
			$.ajax({
				url 	: 'proses.php?aksi=update_transaksi',
				data 	: {kd_pinjam:kd_pinjam, id_anggota:id_anggota, id_buku:id_buku, id_petugas:id_petugas, due_date:due_date},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Diupdate");
					$('modalUpdate').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#transaksi_pinjam').click();
				}
    	});
		});
	});
</script>

<form class="form_transaksi">
<div class="row">
<div class="col-md-6">
		<div class="form-group" style="display:none;">
			<label>KD Pinjam</label>
			<input class="form-control" name="kd_pinjam" id="kd_pinjam2" value="<?= $tampil['kd_pinjam']; ?>" readonly/>
		</div>
		<div class="form-group">
				<label>Nama Peminjam</label>
				<select class="form-control" name="id_anggota" id="id_anggota2">
											<option value=""> ----- </option>
											<?php
												$sql_a = $connect->query("select * from anggota ORDER BY id_anggota ASC");

												while ($anggota = $sql_a-> fetch_assoc()){
												$output  = $anggota['nm_ang_depan']." - ".$anggota['id_anggota'];
												$output2  = $tampil['nm_ang_depan']." - ".$tampil['id_anggota'];
											?>
												<option value="<?= $anggota['id_anggota']; ?>"><?= $output; ?></option>
												<option value="<?= $tampil['id_anggota']; ?>" style=display:none; selected><?= $output2; ?></option>
											<?php } ?>
				</select>
		</div>
    <div class="form-group">
      <label>Judul Buku</label>
      <select class="form-control" name="id_buku" id="id_buku2">
											<option value=""> ----- </option>
											<?php
												$sql_b = $connect->query("select * from buku where stok >= 1 ORDER BY id_buku ASC");
												while ($buku = $sql_b-> fetch_assoc()){
											?>
												<option value="<?= $buku['id_buku']; ?>"><?= $buku['judul']; ?> </option>
												<option value="<?= $tampil['id_buku']; ?>" style=display:none; selected><?= $tampil['judul']; ?></option>
											<?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Petugas</label>
      <select class="form-control" name="id_petugas" id="id_petugas2">
											<option value=""> ----- </option>
											<?php
												$sql_p = $connect->query("select * from petugas ORDER BY id_petugas ASC");
												while ($petugas = $sql_p-> fetch_assoc()){
											?>
												<option value="<?= $petugas['id_petugas']; ?>"><?= $petugas['nm_petugas']; ?> </option>
												<option value="<?= $tampil['id_petugas']; ?>" style=display:none; selected><?= $tampil['nm_petugas']; ?></option>
											<?php } ?>
      </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
      <label>Tanggal Pinjam</label>
      <input class="form-control" name="tgl_pinjam" id="tgl_pinjam2" type="date" value="<?= $tampil['tgl_pinjam']; ?>" readonly/>
    </div>
    <div class="form-group">
      <label>Due Date</label>
      <input class="form-control" name="due_date" id="due_date2" type="date" value="<?= $tampil['due_date'] ?>"/>
    </div>
</div>
</div>
</form>
