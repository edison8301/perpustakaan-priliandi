


 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Transaksi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Pinjam</th>
                                            <th>Judul</th>
                                            <th>NIS_NIP</th>
                                            <th>Nama Anggota</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                                                
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_peminjaman where status='kembali'");

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
                                        <td><?php echo $data['status'];?></td>    
                                            
                                       
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>

                                