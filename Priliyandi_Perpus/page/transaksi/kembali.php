<?php


$kd_pinjam = $_GET['kd_pinjam'];
$judul = $_GET['judul'];


$sql = $koneksi->query("update tb_peminjaman set status='kembali' where kd_pinjam='$kd_pinjam'");

$sql = $koneksi->query("update tb_buku set jumlah_buku =(jumlah_buku+1) where judul = '$judul'");

	?>

	<script type="text/javascript">
		

		alert("Buku Berhasil Dikembalikan");
		window.location.href="?page=transaksi";

	</script>


	<?php

?>