
 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-book "> Data Buku </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Buku</th>
                                            <th>ID Kategori</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Thn Terbit</th>
                                            <th>Jumlah</th>
                                            <th>Tgl Input</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_buku");

                                        while ($data = $sql->fetch_assoc()) {


                                        ?>

                                        <tr>
                                        <td><?php echo $no++?></td>    
                                        <td><?php echo $data['kd_buku'];?></td>
                                        <td><?php echo $data['id_kategori'];?></td>
                                        <td><?php echo $data['judul']; ?></a></td>
                                        <td><?php echo $data['pengarang'];?></td>
                                        <td><?php echo $data['penerbit'];?></td>
                                        <td><?php echo $data['thn_terbit'];?></td>
                                        <td><?php echo $data['jumlah_buku'];?></td>    
                                       <td><?=date('d F Y',strtotime($data['tgl_input']))?></td>
                                        <td>
                                            <a href="?page=buku&aksi=ubah&kd_buku=<?php echo $data['kd_buku'];?>" class="btn btn-info"><i class="fa fa-pencil"></a></i>
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini ...???')"   href="?page=buku&aksi=hapus&kd_buku=<?php echo $data['kd_buku'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></a></i>


                                            
                                        </td>
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                <div>
                                    <a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-top: 10px;">
                                 <i class="fa fa-plus"></i>Tambah Data</a>
                            </div>