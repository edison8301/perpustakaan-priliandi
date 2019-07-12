<?php

		$kd_pinjam = $_GET['kd_pinjam'];
		$kd_buku = $_GET['kd_buku'];
		$tgl_kembali = $_GET['tgl_kembali'];
		$lambat = $_GET['lambat'];


		if ($lambat > 7) {
		?>


		<script type="text/javascript">
			
			alert("Pinjam buku tidak bisa diperpanjang , karena lebih dari 7hari .. kembalikan dulu kemudian pinjam kembali");
			window.location.href="?page=transaksi";

		</script>
		


		<?php

		}else{

			$pecah_tgl_kembali = explode("-", $tgl_kembali);
			$next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1],$pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2]);
			$hari_next = date("d-m-y" , $next_7_hari);

			$sql = $koneksi->query("update tb_peminjaman set tgl_kembali='$hari_next' where kd_pinjam='$kd_pinjam'");

			if ($sql) {
				?>

				<script type="text/javascript">
					
					alert(" Berhasil Diperpanjang");
					window.location.href="?page=transaksi";

				</script>
				<?php

				
			}else{

			?>

			<script type="text/javascript">
					
					alert("Perpanjangan Gagal");
					window.location.href="?page=transaksi";

				</script>
				<?php
		}


}

?>