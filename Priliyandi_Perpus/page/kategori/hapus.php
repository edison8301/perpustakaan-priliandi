<?php 

$id_kategori = $_GET['id_kategori'];

$koneksi ->query("delete from tb_kategori where id_kategori='$id_kategori'");


?>

<script type="text/javascript">
		
	window.location.href="?page=kategori";


</script>

	