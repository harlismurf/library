<?php
	include "koneksi.php";

	$id = $_GET['id'];

	$query 	= mysqli_query($connect,"SELECT * FROM buku WHERE id_buku='$id'") or die (mysqli_error());
	$data 	= mysqli_fetch_array($query);
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_buku").click(function(){
      var id        = $('#id2').val();
      var isbn      = $('#isbn2').val();
      var id_kat    = $('#id_kat2').val();
      var judul     = $('#judul2').val();
      var bahasa    = $('#bahasa2').val();
      var tahun     = $('#tahun_terbit2').val();
      var pengarang = $('#pengarang2').val();
      var penerbit  = $('#penerbit2').val();
      var stok      = $('#stok2').val();
      $.ajax({
				url 	: 'proses.php?aksi=update_buku',
				data 	: {id:id, isbn:isbn, id_kat:id_kat, judul:judul, bahasa:bahasa, tahun:tahun, pengarang:pengarang, penerbit:penerbit, stok:stok},
				type 	: 'POST',
				success : function(data){
					alert("Data Berhasil Diupdate");
					$('modalUpdate').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#buku').click();
				}
    	});
		});
	});
</script>


  <form class="form_buku" role="form" method="post">
    <div class="form-group">
      <label>ID Buku</label>
      <a href="#"></a>
      <input name="id" id="id2" class="form-control" value="<?= $data['id_buku']; ?>" readonly/>
    </div>
    <div class="form-group">
      <label>ISBN</label>
      <a href="#">
        <span class="glyphicon glyphicon-question-sign"></span>
      </a>
      <input name="isbn" id="isbn2" class="form-control" value="<?= $data['isbn']; ?>" />
    </div>
    <div class="form-group">
      <?php
        $sql_kat 	= $connect->query("SELECT * FROM kategori k JOIN buku b ON k.id_kategori = b.id_kategori WHERE b.id_buku = $id");
        $kat_val	= $sql_kat->fetch_assoc();
        $output2	= $kat_val['kategori']." - ".$kat_val['lokasi'];
      ?>
      <label>Kategori</label>
      <select name="id_kat" id="id_kat2" class="form-control" value="<?= $data['kategori']; ?>" >
        <option disabled selected>--Pilih Kategori--</option>
            <?php
                  $sql1 	= $connect->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
                  while($kategori = $sql1->fetch_assoc()){
                  $output = $kategori['kategori']." - ".$kategori['lokasi'];
            ?>
                  <option value="<?= $kategori['id_kategori']; ?>"> <?= $output; ?> </option>
                  <option value="<?= $kat_val['id_kategori'];?>" style=display:none; selected> <?= $output2; ?> </option>

            <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Judul Buku</label>
      <input class="form-control" name="judul" id="judul2" value="<?= $data['judul']; ?>"/>
    </div>
    <div class="form-group">
      <label>Bahasa</label>
      <input class="form-control" name="bahasa" id="bahasa2" value="<?= $data['bahasa']; ?>"/>
    </div>
    <div class="form-group">
      <label>Tahun Terbit</label>
      <select class="form-control" name="tahun_terbit" id="tahun_terbit2">
        <option disabled>--Tahun Terbit--</option>
        <option value="" <?php if($data['tahun_terbit']=='$i'){echo "selected";}?> > ---- </option>
        <?php

          $tahun = date("Y");
        	$tahun2	=	$data['tahun_terbit'];
          for ($i=$tahun-29; $i<=$tahun; $i++){
            if($i==$tahun2){
              echo '<option value="'.$i.'" selected>'.$i.'</option>';
            }else{
              echo ' <option value="'.$i.'">'.$i.'</option> ';
            }
          }

        ?>
      </select>
    </div>
    <div class="form-group">
      <label>Pengarang</label>
      <input class="form-control" name="pengarang" id="pengarang2" value="<?= $data['pengarang']; ?>"/>
    </div>
    <div class="form-group">
      <label>Penerbit</label>
      <input class="form-control" name="penerbit" id="penerbit2" value="<?= $data['penerbit']; ?>"/>
    </div>
    <div class="form-group">
      <label>Jumlah</label>
      <input class="form-control" name="stok" id="stok2" value="<?= $data['stok']; ?>"/>
    </div>
    <div class="form-group">
      <label>Tanggal Input</label>
      <input class="form-control" name="tgl_input" id="tgl_input2" type="date" value="<?= $data['tgl_input']; ?>" readonly/>
    </div>
  </form>
