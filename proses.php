<?php
	require "koneksi.php";
	$aksi = $_GET['aksi'];

// Buku
	if ($aksi == "tambah_buku"){
		$kategori 	= $_POST['kategori'];
		$isbn 	    = $_POST['isbn'];
		$judul 		  = $_POST['judul'];
		$bahasa 	  = $_POST['bahasa'];
		$tahun 		  = $_POST['tahun_terbit'];
		$pengarang 	= $_POST['pengarang'];
		$penerbit 	= $_POST['penerbit'];
		$stok 	    = $_POST['stok'];
		$tgl_input 	= $_POST['tgl_input'];

		$buku2 		= $connect->query("SELECT * FROM buku WHERE judul='$judul' AND id_kategori='$kategori'");
		$hitung 	= mysqli_num_rows($buku2);
		$total		= mysqli_fetch_array($buku2);

		if ($hitung >= 1 AND $stok != 0) {
			$stok1	= $total['stok']+$stok;
			$connect->query("UPDATE buku SET stok='$stok1' WHERE judul='$judul'");
		} else if($hitung < 1){
			$query 	 = $connect->query("SELECT id_buku FROM buku ORDER BY id_buku DESC LIMIT 1");
			$result  = mysqli_fetch_array($query);
			$id_buku = $result['id_buku']+1;

			$connect->query("INSERT INTO buku VALUES('$id_buku', '$kategori', '$isbn', '$judul', '$bahasa', '$tahun', '$pengarang', '$penerbit', '$stok', '$tgl_input')") or die (mysqli_error($connect));
		}

	}

	if ($aksi == "hapus_buku"){
		$id = $_POST['id'];

		$connect->query("DELETE FROM buku WHERE id_buku=$id") or die("Error: ".mysqli_error($connect));
	}

	if ($aksi == "update_buku"){
		$id 				= $_POST['id'];
		$isbn 	    = $_POST['isbn'];
		$id_kat			= $_POST['id_kat'];
		$judul 		  = $_POST['judul'];
		$bahasa 	  = $_POST['bahasa'];
		$tahun 		  = $_POST['tahun'];
		$pengarang 	= $_POST['pengarang'];
		$penerbit 	= $_POST['penerbit'];
		$stok 	    = $_POST['stok'];

		$connect->query("UPDATE buku SET isbn='$isbn', id_kategori='$id_kat', judul='$judul', bahasa='$bahasa', tahun_terbit='$tahun', pengarang='$pengarang', penerbit='$penerbit', stok='$stok' WHERE id_buku='$id'") or die("Error: ".mysqli_error($connect));
	}


// Donasi
	if ($aksi == "tambah_donasi"){
		$kd_donasi    = $_POST['kd_donasi'];
		$id_anggota   = $_POST['id_anggota'];
		$judul_donasi = $_POST['judul_donasi'];
		$jml_donasi   = $_POST['jml_donasi'];
		$kategori			= $_POST['kategori'];
		$tgl_donasi   = date("Y-m-d");

		$connect->query("INSERT INTO donasi VALUES('$kd_donasi', '$id_anggota', '$judul_donasi', '$jml_donasi' ,'$tgl_donasi')") or die("Error :". mysqli_error($connect));


		$buku2 		= $connect->query("SELECT * FROM buku WHERE judul='$judul_donasi'");
		$hitung 	= mysqli_num_rows($buku2);
		$stok			= mysqli_fetch_array($buku2);

		if ($hitung >= 1){
			$stok1	= $stok['stok']+$jml_donasi;
			$connect->query("UPDATE buku SET stok='$stok1' WHERE judul='$judul_donasi'");

		}elseif ($hitung < 1) {
			$query 	 = $connect->query("SELECT id_buku FROM buku ORDER BY id_buku DESC LIMIT 1");
			$result  = mysqli_fetch_array($query);
			$id_buku = $result['id_buku']+1;

			$connect->query("INSERT INTO buku VALUES('$id_buku', '$kategori', '', '$judul_donasi', '', '', '', '', '$jml_donasi', '$tgl_donasi')") or die (mysqli_error($connect));
		}

	}

	if ($aksi == "update_donasi") {
		$kd           = $_POST['kd'];
		$id_anggota 	= $_POST['id_anggota'];
		$judul_donasi = $_POST['judul_donasi'];
		$jml_donasi 	= $_POST['jml_donasi'];
		$tgl_donasi 	= $_POST['tgl_donasi'];

		$sql_buku				= $connect->query("SELECT * FROM buku WHERE judul='$judul_donasi'");
		$sql_donasi			= $connect->query("SELECT * FROM donasi WHERE judul_donasi='$judul_donasi'");
		$result_buku		= mysqli_fetch_array($sql_buku);
		$result_donasi	= mysqli_fetch_array($sql_donasi);
		$stok1					= $result_buku['stok']-$result_donasi['jml_donasi']+$jml_donasi;

		$connect->query("UPDATE donasi SET id_anggota='$id_anggota', judul_donasi='$judul_donasi', jml_donasi='$jml_donasi', tgl_donasi='$tgl_donasi' WHERE kd_donasi='$kd'");
		$connect->query("UPDATE buku SET stok='$stok1' WHERE judul='$judul_donasi'");
	}


// Anggota
	if ($aksi == "tambah_anggota") {
		$id 				= $_POST['id'];
		$nm_depan 	= $_POST['nm_depan'];
		$nm_blakang = $_POST['nm_blakang'];
		$ttl 				= $_POST['ttl'];
		$no_telp 		= $_POST['no_telp'];
		$alamat 		= $_POST['alamat'];
		$tgl_daftar = $_POST['tgl_daftar'];

		$connect->query("INSERT INTO anggota VALUES('$id', '$nm_depan', '$nm_blakang', '$ttl' ,'$no_telp', '$alamat', '$tgl_daftar')") or die (mysqli_error($connect));
	}

	if ($aksi == "hapus_anggota") {
		$id = $_POST['id'];

		$connect->query("DELETE FROM anggota WHERE id_anggota=$id") or die("Error: ".mysqli_error($connect));
		$connect->query("DELETE FROM donasi WHERE id_anggota=$id") or die("Error: ".mysqli_error($connect));

	}

	if ($aksi == "update_anggota"){
		$id 					= $_POST['id'];
		$nm_depan 		= $_POST['nm_depan'];
		$nm_blakang 	= $_POST['nm_blakang'];
		$ttl 					= $_POST['ttl'];
		$no_telp 			= $_POST['no_telp'];
		$alamat 			= $_POST['alamat'];
		$tgl_daftar 	= $_POST['tgl_daftar'];

		$connect->query("UPDATE anggota SET id_anggota='$id', nm_ang_depan='$nm_depan', nm_ang_blakang='$nm_blakang', ttl='$ttl', no_telp_anggota='$no_telp', alamat_anggota='$alamat', tgl_daftar='$tgl_daftar' WHERE id_anggota='$id'") or die (mysqli_error($connect));
	}


// PETUGAS
	if ($aksi == "tambah_petugas"){
		$id_petugas 	= $_POST['id_petugas'];
		$nama 				= $_POST['nama'];
		$no_telp 			= $_POST['no_telp'];
		$alamat 			= $_POST['alamat'];
		$shift 				= $_POST['shift'];
		$user_level   = $_POST['user_level'];

		$query	=  mysqli_query($connect,"INSERT INTO petugas VALUES('$id_petugas', '$nama', '$no_telp', '$alamat', '$shift', '$user_level')") or die (mysqli_error($connect));
	}

	if ($aksi == "hapus_petugas") {
		$id_petugas = $_POST['id'];

		$connect->query("DELETE FROM petugas WHERE id_petugas='$id_petugas'") or die (mysqli_error($connect));
	}

	if ($aksi == "update_petugas") {
		$id_petugas 	= $_POST['id_petugas'];
		$nama 				= $_POST['nama'];
		$no_telp 			= $_POST['no_telp'];
		$alamat 			= $_POST['alamat'];
		$shift 				= $_POST['shift'];
		$user_level   = $_POST['user_level'];

		$connect->query("UPDATE petugas SET nm_petugas='$nama', no_telp_petugas='$no_telp', alamat_petugas='$alamat', user_level='$user_level' WHERE id_petugas='$id_petugas'") or die (mysqli_error($connect));
	}


// Transaksi
	if ($aksi == "tambah_transaksi") {
		$kd_pinjam		= $_POST['kd_pinjam'];
		$id_anggota		= $_POST['id_anggota'];
		$id_buku 			= $_POST['id_buku'];
		$id_petugas 	= $_POST['id_petugas'];
		$tgl_pinjam 	= $_POST['tgl_pinjam'];
		$due_date			= $_POST['due_date'];

		$query_add			= $connect->query("INSERT INTO pinjaman VALUES('$kd_pinjam', '$id_anggota', '$id_buku', '$id_petugas', '$tgl_pinjam', '$due_date', '', '0', 'pinjam')") or die("Error: ".mysqli_error($connect));

		$query_select 	= $connect->query("SELECT * FROM buku WHERE id_buku=$id_buku");
		$tampil					= $query_select->fetch_assoc();
		$buku1					= $tampil['stok']-1;
		$query_update 	= $connect->query("UPDATE buku SET stok='$buku1' WHERE id_buku=$id_buku") or die("Error: ".mysqli_error($connect));
	}

	if ($aksi == "hapus_transaksi") {
		$id 			= $_POST['id'];

		$connect->query("DELETE FROM pinjaman WHERE kd_pinjam=$id AND status='kembali'") or die (mysqli_error($connect));
	}

	if ($aksi == "update_transaksi") {
		$kd_pinjam 		= $_POST['kd_pinjam'];
		$id_anggota 	= $_POST['id_anggota'];
		$id_buku 			= $_POST['id_buku'];
		$id_petugas 	= $_POST['id_petugas'];
		$due_date 		= $_POST['due_date'];

		$connect->query("UPDATE pinjaman set id_anggota='$id_anggota', id_buku='$id_buku', id_petugas='$id_petugas', due_date='$due_date' WHERE kd_pinjam = $kd_pinjam");

	}


	if ($aksi == "checked_transaksi") {
		$id 			= $_POST['id'];
		$buku 		= $_POST['buku'];

		$query = $connect->query("SELECT * FROM pinjaman WHERE kd_pinjam='$id'");
		$result = mysqli_fetch_array($query);

		$totalBayar = 0;
		$denda = 500;
		$tgl = $result['due_date'];

		$tanggal_kembali  = strtotime($tgl);
		$sekarang    			= time(); // Waktu sekarang
		$tgl_sekarang			= date("Y-m-d");

		$diff  					 	= $sekarang - $tanggal_kembali;
		$hari 						= floor($diff / (60 * 60 * 24));
		$bayar						= $totalBayar+($denda * $hari);

		if($bayar > 0){
			$connect->query("UPDATE pinjaman set status='kembali', tgl_kembali='$tgl_sekarang', denda='$bayar' where kd_pinjam=$id") or die("Error: ".mysqli_error($connect));
		}else {
			$null = 0;
			$connect->query("UPDATE pinjaman set status='kembali', tgl_kembali='$tgl_sekarang', denda='$null' where kd_pinjam=$id") or die("Error: ".mysqli_error($connect));
		}

		$query2 	= $connect->query("SELECT * from buku where id_buku=$buku");
		$tampil		= $query2->fetch_assoc();
		$buku1		= $tampil['stok']+1;
		$query2 	= $connect->query("UPDATE buku set stok='$buku1' where id_buku=$buku") or die("Error: ".mysqli_error($connect));


	}

// Inner Join
	if ($aksi == "inner_join") {
		$table1 = $_POST['table1'];
		$table2 = $_POST['table2'];
		$table3 = $_POST['table3'];
		$table4 = $_POST['table4'];
		$table5 = $_POST['table5'];
		$table6 = $_POST['table6'];
	}

?>
