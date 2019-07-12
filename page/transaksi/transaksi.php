 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <strong class="card-title"><i class="fa fa-shopping-cart"> Data Peminjaman </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Pinjam</th>
                                            <th>Judul</th>
                                            <th>ID Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>                                      
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

$kd_pinjam = $_GET['kd_pinjam'];

$sql = $koneksi->query("select * from tb_peminjaman where kd_pinjam = '$kd_pinjam'");

$tampil = $sql->fetch_assoc();
?>


</form>
      
                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_peminjaman where status='pinjam'");

                                        while ($data = $sql->fetch_assoc()) {

                                        ?>

                                        <tr>
                                        <td><?php echo $no++?></td> 
                                        <td><?php echo $data['kd_pinjam'];?></td>
                                        <td><?php echo $data['judul'];?></td>      
                                        <td><?php echo $data['nis_nip'];?></td>
                                        <td><?php echo $data['nama_anggota'];?></td>
                                        <td><?php echo $data['tgl_pinjam'];?></td>
                                        <td><?php echo $data['tgl_kembali'];?></td>
         								<td>

         									<?php 

         										$denda = 500;

         										$tgl_dateline2 = $data['tgl_kembali'];

         										$tgl_kembali = date("Y-m-d");

         										$lambat = terlambat($tgl_dateline2, $tgl_kembali);


         										$denda1 = $lambat*$denda;

         										if ($lambat>0) {
         											echo "


         											<font color ='red'>$lambat hari<br>(Rp $denda1)</font>

         											
         											";
         										}else{

         											echo  $lambat ."hari";
         										}

         									?>
         									




         								</td>
                                        <td><?php echo $data['status'];?></td>
                                        
                                        <td>
                                            <a href="?page=transaksi&aksi=kembali&kd_pinjam=<?php echo $data['kd_pinjam'];?>&judul=<?php echo $data['judul'];?>" class="btn btn-danger"><i class="fa fa-reply"></a></i>

                                             


                                              <a href="?page=transaksi&aksi=perpanjang&kd_pinjam=<?php echo $data['kd_pinjam'];?>&judul=<?php echo $data['judul'];?>&lambat=<?php  echo $lambat?>&tgl_kembali=<?php echo $data['tgl_kembali'];?>" class="btn btn-info"><i class="fa fa-mail-forward"></a></i>

                                            
                                        </td>
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>

                                    <div>
                                         <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;">
                                 <i class="fa fa-plus"></i>Tambah Data</a>
                            </div>