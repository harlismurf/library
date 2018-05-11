<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$("#btn_tambah_anggota").click(function(){
			var id 					= $('#id').val();
			var nm_depan 		= $('#nm_depan').val();
			var nm_blakang 	= $('#nm_blakang').val();
			var no_telp 		= $('#no_telp').val();
			var alamat 			= $('#alamat').val();
			var ttl 				= $('#ttl').val();
			var tgl_daftar 	= $('#tgl_daftar').val();
			$.ajax({
				url : 'proses.php?aksi=tambah_anggota',
				type : 'POST',
				data : {id:id, nm_depan:nm_depan, nm_blakang:nm_blakang, no_telp:no_telp, alamat:alamat, ttl:ttl, tgl_daftar:tgl_daftar},
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#anggota').click();
				}
			});
		});

		$(".hapus").click(function(){
			var id = $(this).attr('id');
			if (confirm("Anda yakin ingin menghapus ?")){
				$.ajax({
					url : 'proses.php?aksi=hapus_anggota',
					type : 'POST',
					data : {id:id},
					success : function(){
						alert("Data Berhasil Dihapus");
							$('#modalTambah').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#anggota').click();
				}
			});
			}
		});

		$(".ubah").click(function(){
			var id = $(this).attr('id');
			$("#isiModalUpdate").load("update_anggota.php?id="+id);
		});

		$("#btn_tambah_donasi2").click(function(){
			var kd_donasi 	 = $('#kd_donasi3').val();
			var id_anggota 	 = $('#id_anggota3').val();
			var judul_donasi = $('#judul_donasi3').val();
			var jml_donasi   = $('#jml_donasi3').val();
			var kategori     = $('#kategori3').val();
			$.ajax({
				url : 'proses.php?aksi=tambah_donasi',
				data: {kd_donasi:kd_donasi, id_anggota:id_anggota, judul_donasi:judul_donasi, jml_donasi:jml_donasi, kategori:kategori},
				type: 'POST',
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#anggota').click();
				}
			});
		});

		$(".viewDonasi").click(function(){
			var id = $(this).attr('id');
			$("#isiModalViewDonasi").load("anggota_view_donasi.php?id="+id);
		});

	});
</script>



<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Anggota</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#modalTambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Anggota</button>
			<button data-toggle="modal" data-target="#modalTambahDonasi" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah Donasi</button><br><br>
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th>ID</th>
					<th>Nama</th>
					<th>No Telp</th>
					<th>Alamat</th>
					<th>TTL</th>
					<th width=95>Tgl Daftar</th>
					<th>Donasi</th>
					<th width=66>Aksi</th>
				</tr>
			<?php
				$query 	= "SELECT a.id_anggota, a.nm_ang_depan, a.nm_ang_blakang, a.no_telp_anggota, a.alamat_anggota, a.ttl, a.tgl_daftar, count(d.id_anggota) AS count_anggota
									 FROM anggota a LEFT JOIN donasi d
									 ON a.id_anggota = d.id_anggota
									 GROUP BY a.id_anggota";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
					$nama = $baris['nm_ang_depan'].' '.$baris['nm_ang_blakang'];
			?>
			<tr>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $baris['id_anggota'] ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $nama ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $baris['no_telp_anggota'] ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $baris['alamat_anggota'] ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $baris['ttl'] ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> ><?= $baris['tgl_daftar'] ?></td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> >
					<?= $baris['count_anggota']; $count = $baris['count_anggota']; if($count >= 1){ ?>
					<a href="#" class="viewDonasi" id="<?= $baris[0] ?>" data-toggle="modal" data-target="#modalViewDonasi"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
					<?php } ?>
				</td>
				<td <?php if($baris['count_anggota'] == 0){echo "class=danger";} ?> >
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
        <h4 class="modal-title">Tambah Data Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
        <form class="form_anggota">
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
							<label>ID Anggota</label>
							<a href="#" id="id_anggota">
								 <span class="glyphicon glyphicon-question-sign"></span>
							 </a>
							 <?php
							 $tahun = date("Y");
							 $bulan = date("m");

							 $sql2 = $connect->query("SELECT tgl_daftar from anggota where year(tgl_daftar) = '$tahun' AND month(tgl_daftar) = '$bulan'");
							 $result = mysqli_num_rows($sql2);

							 if ($result >= 1) {
								 	$date = date("Ym");
							 		$result = $result+1;
									$val = $date.$result;
									echo "<input class='form-control' name='id' id='id' value='$val' readonly/>";
							 } else {
								 	$date = date("Ym");
									$result = $result+1;
									$val = $date.$result;
								 	echo "<input class='form-control' name='id' id='id' value='$val' readonly/>";
							 }

							 ?>
					</div>
					<div class="form-group">
							<label>Nama Depan</label>
							<input class="form-control" name="nm_depan" id="nm_depan"/>
					</div>
					<div class="form-group">
							<label>Nama Belakang</label>
							<input class="form-control" name="nm_blakang" id="nm_blakang"/>
					</div>
					<div class="form-group">
							<label>Tempat & Tanggal Lahir</label>
							<input class="form-control" name="ttl" id="ttl"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
							<label>No Telp</label>
							<input class="form-control" name="no_telp" id="no_telp"/>
					</div>
					<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" id="alamat" style="margin: 0px 11px 0px 0px; height: 126px; width: 257px;"></textarea>
					</div>

					<div class="form-group">
							<label>Tanggal Daftar</label>
							<input class="form-control" name="tgl_daftar"  id="tgl_daftar" type="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
					</div>
				</div>
				</div>
		  	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_anggota" class="btn btn-info">Tambah</button>
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
        <button type="submit" id="btn_update_anggota" class="btn btn-info">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalTambahDonasi">
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
    									<input class="form-control" name="kd_donasi" id="kd_donasi3" value="<?= $value ?>" readonly/>
    							</div>
                  <div class="form-group">
                      <label>ID Anggota</label>
                      <select class="form-control" name="id_anggota" id="id_anggota3">
                                    <option disabled selected>--Pilih Anggota--</option>
                                    <?php
                                      $sql_a = $connect->query("select * from anggota ORDER BY id_anggota ASC");
                                      while ($anggota = $sql_a-> fetch_assoc()){
                                    ?>
                                      <option value="<?=$anggota['id_anggota'];?>">
                                        <?php echo $anggota['nm_ang_depan']." - ".$anggota['id_anggota']; ?>
                                      </option>
                                    <?php } ?>
                      </select>
                  </div>
    			</div>
    			<div class="col-md-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="kategori3">
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
    									<input class="form-control" name="judul_donasi" id="judul_donasi3"/>
    							</div>
    							<div class="form-group">
    									<label>Jumlah Donasi</label>
    									<input class="form-control" name="jml_donasi" id="jml_donasi3"/>
    							</div>
    			</div>
          </div>
  			</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_donasi2" class="btn btn-info">Tambah</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalViewDonasi">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Histori Donasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalViewDonasi">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>

    </div>
  </div>
</div>
