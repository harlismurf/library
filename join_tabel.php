<?php
  require "koneksi.php";
?>
<script type="text/javascript">
  $("#btn_inner_join").click(function(){
    var table1 = $('#table1').val();
    var table2 = $('#table2').val();
    var table3 = $('#table3').val();
    var table4 = $('#table4').val();
    var table5 = $('#table5').val();
    var table6 = $('#table6').val();
      $.ajax({
        type : 'POST',
        url  : 'proses.php?aksi=inner_join',
        data : {table1:table1, table2:table2, table3:table3, table4:table4, table5:table5, table6:table6},
        success : function(){
            $('#modalTambah').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $('#join_tabel_hasil').click();
        }
      });
    }
  });
</script>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Custom Select / <a>Join Tabel</a></h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
        <a href="#" class="innerJoin" data-toggle="modal" data-target="#modalInnerJoin"><img src="img/inner_join.png"></img></a>
        <a href="#"><img src="img/left_join.png"></img></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#"><img src="img/right_join.png"></img></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#"><img src="img/full_join.png"></img></a>
    </div>
  </div>
</div>


<div class="modal fade" id="modalInnerJoin">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Inner Join</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isiInnerJoin">
        <div class="form-group">
          <select class="form-control" name="table1" id="table1">
                <option disabled selected>--Pilih table 1--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="table2" id="table2">
                <option disabled selected>--Pilih table 2--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="table3" id="table3">
                <option disabled selected>--Pilih table 3--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="table4" id="table4">
                <option disabled selected>--Pilih table 4--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="table5" id="table5">
                <option disabled selected>--Pilih table 5--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="table6" id="table6">
                <option disabled selected>--Pilih table 6--</option>
                <?php
                  $sql = $connect->query("SHOW tables");
                  while ($join = mysqli_fetch_array()){
                ?>
                  <option value="<?= $join[0] ?>"><?= $join[0]; ?></option>
                <?php } ?>
          </select>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kakiModalUpdate">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_inner_join" class="btn btn-info">Join</button>
      </div>

    </div>
  </div>
</div>
