<?php

$kd_petugas = $_GET['kd_petugas'];

$sql = $koneksi->query("select * from tb_petugas where kd_petugas = '$kd_petugas'");

$tampil = $sql->fetch_assoc();



?>

<script type="text/javascript">

 function Angkasaja(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}


</script>

        <div class="col-lg-6">
            <div class="panel-body">

                <div class="card-header">
                    <strong>Ubah Data</strong><a href="?page=petugas" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
                    <form method="POST">
                <div class="form-group">
                    <label>KD Petugas</label>
                    <input class="form-control" name="id" value="<?php echo $tampil['kd_petugas']?>" readonly/>
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input class="form-control" type="number" name="nip" value="<?php echo $tampil['nip']?>"/>
                </div>

                 <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="<?php echo $tampil['username']?>"/>
                </div>

                 <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $tampil['password']?>"/>
                  
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="nama_petugas"  value="<?php echo $tampil['nama_petugas']?>"/>
                </div>


                 <div class="form-group">
                    <label>Foto</label>
                    <input  name="foto" class="form-control" type="file"><img src="images/<?php echo $tampil ['foto'];?>" width="150" height="170" class="img-rounded">
                </div>
            <div class="form-group">
                <label>No Tlpn</label>
                <input type="text"  class="form-control" maxlength="12" placeholder="NO TLPN" value="<?php echo $tampil['no_tlpn']?>" name="no_tlpn" required onkeypress="return Angkasaja(event)"/>
            </div>

                <div>
                

                                            <input type="submit" name="simpan" value="ubah" class="btn btn-primary"></input>
                                             <input type="reset"  value="Reset" class="btn btn-danger"></input>

                                        </div>
                                    </div>
                                </form>
                             </div>
                        </div>
                    </div>
                </div>
         </div>


        <?php

        $kd_petugas = $_POST['kd_petugas'];
        $nip = $_POST['nip'];
        $username = $_POST['username'];

        $password = $_POST['password'];
    
        $password_hashing = md5(sha1(crc32($_POST['password'])));

        $nama_petugas = $_POST['nama_petugas'];
 
        $foto = $_POST['foto'];
        $no_tlpn = $_POST['no_tlpn'];
       
        $simpan = $_POST['simpan'];

        if ($simpan) {
            
        $sql = $koneksi->query("update tb_petugas set nip='$nip',username='$username',password='$password',nama_petugas='$nama_petugas',foto='$foto',no_tlpn='$no_tlpn' where nip='$nip' ");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Diubah");
                    window.location.href="?page=petugas";

                </script>

                <?php

            }
        }
        

        ?>