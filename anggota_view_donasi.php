<?php
  include "koneksi.php";

  $id = $_GET['id'];

?>

<div class="table-responsive">
  <table class="table table-condensed table-hover">
    <tr class="info">
      <th>Kode Donasi</th>
      <th>ID</th>
      <th>Nama</th>
      <th>Jumlah Donasi</th>
      <th>Judul</th>
      <th>Tgl Donasi</th>
    </tr>
  <?php
    $query 	= "SELECT * FROM donasi d
               JOIN anggota a
               ON d.id_anggota = a.id_anggota
               WHERE d.id_anggota='$id'";

    $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
    while ($baris = mysqli_fetch_array($result)) {
      $nama = $baris['nm_ang_depan'].' '.$baris['nm_ang_blakang'];
  ?>
  <tr>
    <td><?= $baris['kd_donasi'] ?></td>
    <td><?= $baris['id_anggota'] ?></td>
    <td><?= $nama ?></td>
    <td><?= $baris['jml_donasi'] ?></td>
    <td><?= $baris['judul_donasi'] ?></td>
    <td><?= $baris['tgl_donasi'] ?></td>
  </tr>
  <?php } ?>
  </table>
</div>
