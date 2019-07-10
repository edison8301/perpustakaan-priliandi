<?php
include'../koneksi.php';
$id_user=$_POST['id_user'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
	
if(isset($_POST['simpan'])){
	mysqli_query($koneksi,
		"UPDATE tbuser
		SET nama='$nama',alamat='$alamat'
		WHERE id_user='$id_user'"
	);
	header("location:../index.php?p=user");
}
?>