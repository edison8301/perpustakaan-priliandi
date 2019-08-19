<?php 

$nis_nip = $_GET['nis_nip'];

$koneksi ->query("delete from tb_anggota where nis_nip='$nis_nip'");


?>

<script type="text/javascript">
		
	window.location.href="?page=anggota";


</script>

	