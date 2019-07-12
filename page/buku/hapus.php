<?php 

$kd_buku = $_GET['kd_buku'];

$koneksi ->query("delete from tb_buku where kd_buku='$kd_buku'");


?>

<script type="text/javascript">
	
	window.location.href="?page=buku";


</script>

	