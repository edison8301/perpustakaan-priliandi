

 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-tasks "> Data Kategori </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kategori</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_kategori");

                                        while ($data = $sql->fetch_assoc()) {


                                       
                                        ?>

                                        <!--memanggil dari tabel kategori-->
                                        <tr>
                                        <td><?php echo $no++?></td>    
                                        <td><?php echo $data['id_kategori'];?></td>
                                        <td><?php echo $data['kategori'];?></td>
                                       
                                        <td>
                                            <a href="?page=kategori&aksi=ubah&id_kategori=<?php echo $data['id_kategori'];?>" class="btn btn-info"><i class="fa fa-pencil"></a></i>
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini ...???')"   href="?page=kategori&aksi=hapus&id_kategori=<?php echo $data['id_kategori'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></a></i>
                                            
                                        </td>
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                    
                                </table>
                                <td>
                                        <a href="?page=kategori&aksi=tambah" class="btn btn-success" style="margin-top: 8px;">
                                 <i class="fa fa-plus"></i>Tambah Data</a>
                                    </td>
                                </div>


                        </div>
                </div>
        </div>
</div>