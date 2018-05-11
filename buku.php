<?php
	require "koneksi.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$("#btn_tambah_buku").click(function(){
			var id 						= $('#id').val();
			var kategori 			= $('#kategori').val();
			var isbn 					= $('#isbn').val();
			var judul 				= $('#judul').val();
			var bahasa 				= $('#bahasa').val();
			var tahun_terbit	= $('#tahun_terbit').val();
			var pengarang 		= $('#pengarang').val();
			var penerbit 			= $('#penerbit').val();
			var stok 					= $('#stok').val();
			var tgl_input 		= $('#tgl_input').val();
			$.ajax({
				url : 'proses.php?aksi=tambah_buku',
				data: {id:id, kategori:kategori, isbn:isbn, judul:judul, bahasa:bahasa, tahun_terbit:tahun_terbit, pengarang:pengarang, penerbit:penerbit, stok:stok, tgl_input:tgl_input},
				type: 'POST',
				success : function(data){
					alert("Data Berhasil Ditambah");
					$('modalTambah').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#buku').click();
				}
			});
		});

		$(".hapus").click(function(){
			var id = $(this).attr('id');
			if (confirm("Anda yakin ingin menghapus ?")){
				$.ajax({
					type : 'POST',
					url  : 'proses.php?aksi=hapus_buku',
					data : {id:id},
					success : function(){
						alert("Data Berhasil Dihapus");
							$('#modalTambah').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#buku').click();
					}
				});
			}
		});

		$(".ubah").click(function(){
			var id = $(this).attr('id');
			$("#isiModalUpdate").load("update_buku.php?id="+id);
		});

	});
</script>


<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    	<h4 class="page-title">
				Data <a href="#">Buku</a> / Donasi
			</h4>
		</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#modalTambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Buku</button><br><br>
			<div class="table-responsive">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<th>#</th>
					<th width=120>ISBN</th>
					<th>Judul</th>
					<th width=100>Kategori</th>
					<th>Bahasa</th>
					<th>Terbit</th>
					<th width=100>Pengarang</th>
					<th width=110>Penerbit</th>
					<th>Stok</th>
					<th>Lokasi</th>
					<th width=90>Tgl Input</th>
					<th width=70>Aksi</th>
				</tr>
			<?php
				$query 	= "SELECT * FROM buku b JOIN kategori k ON b.id_kategori = k.id_kategori ORDER BY b.id_buku DESC";
				$result = mysqli_query($connect,$query);
				while ($baris = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td> <?= $baris['id_buku'];?> </td>
				<td <?php if($baris['isbn'] == NULL){echo "class=danger";} ?>> <?= $baris['isbn'];?> </td>
				<td <?php if($baris['judul'] == NULL){echo "class=danger";} ?>> <?= $baris['judul'];?> </td>
				<td> <?= $baris['kategori'];?> </td>
				<td <?php if($baris['bahasa'] == NULL){echo "class=danger";} ?>> <?= $baris['bahasa'];?> </td>
				<td <?php if($baris['tahun_terbit'] == 0){echo "class=danger";} ?>> <?= $baris['tahun_terbit'];?> </td>
				<td <?php if($baris['pengarang'] == NULL){echo "class=danger";} ?>> <?= $baris['pengarang'];?> </td>
				<td <?php if($baris['penerbit'] == NULL){echo "class=danger";} ?>> <?= $baris['penerbit'];?> </td>
				<td <?php if($baris['stok'] == 0){echo "class=danger";} ?>> <?= $baris['stok'];?> </td>
				<td> <?= $baris['lokasi'];?> </td>
				<td> <?= $baris['tgl_input'];?> </td>
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
        <h4 class="modal-title">Tambah Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
        <form class="form_buku">
				<div class="row">
				<div class="col-md-6">
					<div class="form-group input-group">
					  <span class="input-group-addon">ISBN
							<a href="#">
	              <span class="glyphicon glyphicon-question-sign"></span>
	            </a>
						</span>
					  <input class="form-control" name="isbn" id="isbn" placeholder="ISBN"/>
					</div>
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
					  <label>Judul Buku</label>
					  <input class="form-control" name="judul" id="judul"/>
				  </div>
				  <div class="form-group">
					  <label>Bahasa</label>
					  <input class="form-control" name="bahasa" id="bahasa"/>
				  </div>
				  <div class="form-group">
					  <label>Tahun Terbit</label>
					  <select class="form-control" name="tahun_terbit" id="tahun_terbit">
						  <option disabled selected>--Pilih Tahun Terbit--</option>
  						<?php

  							$tahun = date("Y");
  							for ($i=$tahun-29; $i<=$tahun; $i++){
  								echo '

  									<option value="'.$i.'">'.$i.'</option>

  								';
  							}

  						?>
					  </select>
				  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Pengarang</label>
						<input class="form-control" name="pengarang" id="pengarang"/>
					</div>
					<div class="form-group">
						<label>Penerbit</label>
						<input class="form-control" name="penerbit" id="penerbit"/>
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input class="form-control" name="stok" id="stok"/>
					</div>
					<div class="form-group">
						<label>Tanggal Input</label>
						<input class="form-control" type="date" value="<?= date('Y-m-d'); ?>" name="tgl_input" id="tgl_input"/>
					</div>
				</div>
				</div>
		  	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_buku" class="btn btn-info">Tambah</button>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="modalUpdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiModalUpdate">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_update_buku" class="btn btn-info">Update</button>
      </div>

    </div>
  </div>
</div>
