  
 <div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <strong class="card-title"><i class="fa fa-users "> Data Petugas </strong></i>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>KD Petugas</th>
                <th>NIP</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>No Tlpn</th>
                <th>Aksi</th>
            </tr>
        </thead>
            <tbody>

                <?php

                $no=1;

                $sql = $koneksi ->query("select * from tb_petugas");

                while ($data = $sql->fetch_assoc()) {


                ?>

                <!--memanggil dari tabel anggota-->
            <tr>
                <td><?php echo $no++?></td>    
                <td><?php echo $data['kd_petugas'];?></td>
                <td><?php echo $data['nip'];?></td>
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['nama_petugas'];?></td>
                <td><img src="images/<?php echo $data['foto'] ;?>" width="100" height="100"></td>
                <td><?php echo $data['no_tlpn'];?></td>
                                        
                                         
            <td>
                <a href="?page=petugas&aksi=ubah&kd_petugas=<?php echo $data['kd_petugas'];?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></a></i>
                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini ...???')"   href="?page=petugas&aksi=hapus&kd_petugas=<?php echo $data['kd_petugas'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></a></i>
                                            
            </td>
                                            
                </tr>

                    <?php } ?>

            </tbody>
        </table>
    <div>
<a href="?page=petugas&aksi=tambah" class="btn btn-success" style="margin-top: 10px;">
        <i class="fa fa-plus"></i>Tambah Data</a>
    </div>
        </div>
    </div>
    </div>
        </div>
</div>