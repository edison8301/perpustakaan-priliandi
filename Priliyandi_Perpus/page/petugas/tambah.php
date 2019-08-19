
<?php

// membuat query max
 
      $carikode = mysqli_query($koneksi, "SELECT max(kd_petugas) from tb_petugas") or die (mysqli_error());
      
      // menjadikannya array
      
      $datakode = mysqli_fetch_array($carikode);
      
      // jika $datakode
      
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       
       // menjadikan $nilaikode ( int )
       
       $kode = (int) $nilaikode;
       
       // setiap $kode di tambah 1
       
       $kode = $kode + 1;
       $kode_otomatis = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
      
      } else {
      
       $kode_otomatis = "P001";
      
      }

?>


<div class="col-lg-6">
                        <div class="panel-body">


                            <div class="card-header">
                              <strong>Tambah Data</strong> <a href="?page=petugas" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
                                <form method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>KD Petugas</label>
                                            <input class="form-control" name="kd_petugas" value="<?php echo $kode_otomatis?>" readonly />
                                        </div>

                                         <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" type="number" placeholder="NIP" name="nip" required />
                                        </div>

                                         <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="USERNAME" name="username" required />
                                        </div>

                                         <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="PASSWORD" name="password" type="password" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input class="form-control" placeholder="NAMA PETUGAS" name="nama_petugas" required />
                                        </div>

                                  
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input class="form-control" type="file" name="foto">
                                        </div>

                                         <div class="form-group">
                                            <label>NO Tlpn</label>
                                            <input class="form-control" placeholder="NO TLPN" type="number" name="no_tlpn" required />
                                        </div                 

                                        <div>
                                            

                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
                                             <input type="reset"  value="Reset" class="btn btn-danger"></input>

                                        </div>

                                    </div>

                                </form>

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
    
        $name = $_FILES['foto']['name'];
        $file = $_FILES['foto']['tmp_name'];
        $no_tlpn = $_POST['no_tlpn'];

        $simpan = $_POST['simpan'];

        if ($simpan) {
            move_uploaded_file($file,"images/".$name);
        $sql = $koneksi->query("insert into tb_petugas(kd_petugas,nip,username,password,nama_petugas,foto,no_tlpn)values('$kd_petugas','$nip','$username','$password','$nama_petugas','$name',$no_tlpn)");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=petugas";

                </script>

                <?php

            }
        }
        

        ?>

