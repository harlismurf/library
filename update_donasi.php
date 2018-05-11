<?php
	require "koneksi.php";

  $id = $_GET['id'];

  $sql    = $connect->query("SELECT * FROM donasi d JOIN anggota a ON d.id_anggota = a.id_anggota WHERE kd_donasi='$id'");
  $result = mysqli_fetch_array($sql);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_donasi").click(function(){
      var kd                = $('#kd_donasi2').val();
      var id_anggota        = $('#id_anggota2').val();
      var judul_donasi      = $('#judul_donasi2').val();
      var jml_donasi        = $('#jml_donasi2').val();
      var tgl_donasi        = $('#tgl_donasi2').val();
      $.ajax({
				url 	: 'proses.php?aksi=update_donasi',
				data 	: {kd:kd, id_anggota:id_anggota, judul_donasi:judul_donasi, jml_donasi:jml_donasi, tgl_donasi:tgl_donasi},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Diupdate");
					$('modalUpdate').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#donasi').click();
				}
    	});
		});
	});
</script>

<form role="form" method="post">
  <div class="row">
  <div class="col-md-6">
          <div class="form-group">
              <label>KD Donasi</label>
              <a href="#"> <span class="glyphicon glyphicon-question-sign"></span> </a>
              <input class="form-control" name="kd_donasi" id="kd_donasi2" value="<?= $result[0] ?>" readonly/>
          </div>
          <div class="form-group">
              <label>ID Anggota</label>
              <select class="form-control" name="id_anggota" id="id_anggota2">
                            <option disabled selected>--Pilih Anggota--</option>
                            <?php
                              $sql_a = $connect->query("select * from anggota ORDER BY id_anggota ASC");
                              while ($anggota = $sql_a-> fetch_assoc()){
                            ?>
                              <option value="<?= $anggota['id_anggota'] ?>"><?= $anggota['nm_ang_depan']." - ".$anggota['id_anggota']; ?></option>
                              <option value="<?= $result['id_anggota'] ?>" style="display:none" selected><?= $result['nm_ang_depan']." - ".$result['id_anggota']; ?></option>
                            <?php } ?>
              </select>
          </div>
  </div>
  <div class="col-md-6">
          <div class="form-group">
              <label>Judul Donasi</label>
              <input class="form-control" name="judul_donasi" id="judul_donasi2" value="<?= $result[2] ?>"/>
          </div>
          <div class="form-group">
              <label>Jumlah Donasi</label>
              <input class="form-control" name="jml_donasi" id="jml_donasi2" value="<?= $result[3] ?>"/>
          </div>
          <div class="form-group">
              <label>Tanggal Donasi</label>
              <input class="form-control" type="date" name="tgl_donasi" id="tgl_donasi2" value="<?= $result[4] ?>"/>
          </div>
  </div>
  </div>
</form>
