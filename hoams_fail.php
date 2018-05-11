<?php
  require "koneksi.php";
?>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Custom Select / <a>Join Tabel</a></h4> </div>
</div>

<form class="form_transaksi">
<div class="row">
  <div class="col-md-12">
  <div class="white-box">
    <select name="table1" id="table1" class="form-control input-lg">
      <option value="">SELECT TABLE 1</option>
    </select>
    <select name="table2" id="table2" class="form-control input-lg">
      <option value="">SELECT TABLE 2</option>
    </select>
    <select name="table3" id="table3" class="form-control input-lg">
      <option value="">SELECT TABLE 3</option>
    </select>
    <select name="table4" id="table4" class="form-control input-lg">
      <option value="">SELECT TABLE 4</option>
    </select>
    <select name="table5" id="table5" class="form-control input-lg">
      <option value="">SELECT TABLE 5</option>
    </select>
    <select name="table6" id="table6" class="form-control input-lg">
      <option value="">SELECT TABLE 6</option>
    </select>
  </div>
  </div>
</div>
</form>

<script>
$(document).ready(function(){

 load_json_data('table1');

 function load_json_data(id, parent_id)
 {
  var html_code = '';
  $.getJSON('tables_join.json', function(data){

   html_code += '<option value="">Select '+id+'</option>';
   $.each(data, function(key, value){
    if(id == 'table1')
    {
     if(value.parent_id == '0')
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
    else
    {
     if(value.parent_id == parent_id)
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
   });
   $('#'+id).html(html_code);
  });

 }

 $(document).on('change', '#table1', function(){
  var table1_id = $(this).val();
  if(table1_id != '')
  {
   load_json_data('table2', table1_id);
  }
  else
  {
   $('#table2').html('<option value="">Select table2</option>');
   $('#table3').html('<option value="">Select table3</option>');
  }
 });
 $(document).on('change', '#table2', function(){
  var table2_id = $(this).val();
  if(table2_id != '')
  {
   load_json_data('table3', table2_id);
  }
  else
  {
   $('#table3').html('<option value="">Select table3</option>');
  }
 });
 $(document).on('change', '#table3', function(){
  var table3_id = $(this).val();
  if(table3_id != '')
  {
   load_json_data('table4', table3_id);
  }
  else
  {
   $('#table4').html('<option value="">Select table4</option>');
  }
 });
 $(document).on('change', '#table4', function(){
  var table4_id = $(this).val();
  if(table4_id != '')
  {
   load_json_data('table5', table4_id);
  }
  else
  {
   $('#table5').html('<option value="">Select table5</option>');
  }
 });
 $(document).on('change', '#table5', function(){
  var table5_id = $(this).val();
  if(table5_id != '')
  {
   load_json_data('table6', table5_id);
  }
  else
  {
   $('#table6').html('<option value="">Select table6</option>');
  }
 });
});
</script>
