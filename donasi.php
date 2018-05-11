<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$("#btn_tambah_donasi").click(function(){
			var kd_donasi 	 = $('#kd_donasi').val();
			var id_anggota 	 = $('#id_anggota').val();
			var judul_donasi = $('#judul_donasi').val();
			var jml_donasi   = $('#jml_donasi').val();
			var kategori     = $('#kategori').val();
			$.ajax({
				url : 'proses.php?aksi=tambah_donasi',
				data: {kd_donasi:kd_donasi, id_anggota:id_anggota, judul_donasi:judul_donasi, jml_donasi:jml_donasi, kategori:kategori},
				type: 'POST',
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#donasi').click();
				}
			});
		});

		$(".ubah").click(function(){
			var id = $(this).attr('id');
			$("#isiModalUpdate").load("update_donasi.php?id="+id);
		});

	});
</script>


<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    	<h4 class="page-title">
				Data Buku / <a href="#">Donasi</a>
			</h4>
		</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#modalTambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Donasi</button><br><br>
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th width=100>Kode Donasi</th>
					<th>ID Anggota</th>
					<th>Nama</th>
					<th width=350>Judul</th>
					<th>Jumlah</th>
					<th>Tanggal Donasi</th>
					<th width=66>Aksi</th>
				</tr>
			<?php
				$query 	= "SELECT * FROM donasi d JOIN anggota a ON d.id_anggota = a.id_anggota";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td> <?php echo $baris[0];?> </td>
				<td> <?php echo $baris[1];?> </td>
				<td> <?php echo $baris['nm_ang_depan'];?> </td>
				<td <?php if($baris[2] == NULL){echo "class=danger";} ?>> <?php echo $baris[2];?> </td>
				<td <?php if($baris[3] == 0){echo "class=danger";} ?>> <?php echo $baris[3];?> </td>
				<td <?php if($baris[4] == '0000-00-00'){echo "class=danger";} ?>> <?php echo $baris[4];?> </td>
				<td>
					<a  href="#" class="ubah" id="<?= $baris[0] ?>" data-toggle="modal" data-target="#modalUpdate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
        <h4 class="modal-title">Tambah Data Donasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
        <form role="form" method="post">
          <div class="row">
    			<div class="col-md-6">
    							<div class="form-group">
    									<label>KD Donasi</label>
    									<a href="#"> <span class="glyphicon glyphicon-question-sign"></span> </a>
                      <?php
                        $donasi = $connect->query("SELECT * FROM donasi");
                        $result = mysqli_num_rows($donasi);
                        $value  = "d".($result+1);
                      ?>
    									<input class="form-control" name="kd_donasi" id="kd_donasi" value="<?= $value ?>" readonly/>
    							</div>
                  <div class="form-group">
                      <label>ID Anggota</label>
                      <select class="form-control" name="id_anggota" id="id_anggota">
                                    <option disabled selected>--Pilih Anggota--</option>
                                    <?php
                                      $sql_a = $connect->query("select * from anggota ORDER BY id_anggota ASC");

                                      while ($anggota = $sql_a-> fetch_assoc()){
                                      $anggota1 = $anggota['id_anggota'];
                                    ?>
                                      <option value="<?= $anggota1; ?>">
                                        <?php echo $anggota['nm_ang_depan']." - ".$anggota['id_anggota']; ?>
                                      </option>
                                    <?php } ?>
                      </select>
                  </div>
    			</div>
    			<div class="col-md-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                                  <option disabled selected>--Pilih Kategori--</option>
                            <?php
                                  $sql1 	= $connect->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
                                  while($kategori = $sql1->fetch_assoc()){
                                  $output = $kategori['kategori']." - ".$kategori['lokasi'];
                                  $val		= $kategori['id_kategori'];
                            ?>
                                  <option value="<?= $val; ?>"> <?= $output; ?> </option>
                            <?php } ?>
                    </select>
                  </div>
    							<div class="form-group">
    									<label>Judul Donasi</label>
    									<input class="form-control" name="judul_donasi" id="judul_donasi"/>
    							</div>
    							<div class="form-group">
    									<label>Jumlah Donasi</label>
    									<input class="form-control" name="jml_donasi" id="jml_donasi"/>
    							</div>
    			</div>
          </div>
  			</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_donasi" class="btn btn-info">Tambah</button>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="modalUpdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Donasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalUpdate">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_update_donasi" class="btn btn-info">Update</button>
      </div>

    </div>
  </div>
</div>
