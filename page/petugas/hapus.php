<?php 

$kd_petugas = $_GET['kd_petugas'];

$koneksi ->query("delete from tb_petugas where kd_petugas='$kd_petugas'");


?>

<script type="text/javascript">
		
	window.location.href="?page=petugas";


</script>

	