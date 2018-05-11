<?php
  include "koneksi.php";

  $id = $_GET['id'];

?>

<div class="table-responsive">
  <table class="table table-condensed table-hover">
    <tr class="info">
      <th>Kode Pinjam</th>
      <th>ID</th>
      <th>Nama</th>
      <th>No_Telp</th>
      <th>Judul</th>
      <th>Tgl Pinjam</th>
      <th>Tgl Kembali</th>
      <th>Status</th>
    </tr>
  <?php
    $sql = 	"
            SELECT * FROM pinjaman p
            JOIN anggota a on a.id_anggota = p.id_anggota
            JOIN buku b on b.id_buku = p.id_buku
            JOIN petugas pet on pet.id_petugas = p.id_petugas
            WHERE p.id_petugas = $id
            ";
    $result = mysqli_query($connect,$sql) or die ("Error : ". mysqli_error($connect));
    while($data = mysqli_fetch_array($result)){
  ?>
  <tr>
    <td> <?= $data['kd_pinjam']; ?> </td>
    <td> <?= $data['id_anggota']; ?> </td>
    <td> <?= $data['nm_ang_depan']; ?> </td>
    <td> <?= $data['no_telp_anggota']; ?> </td>
    <td> <?= $data['judul']; ?> </td>
    <td> <?= $data['tgl_pinjam']; ?> </td>
    <td> <?= $data['tgl_kembali']; ?> </td>
    <td> <?= $data['status']; ?> </td>
  </tr>
  <?php } ?>
  </table>
</div>
