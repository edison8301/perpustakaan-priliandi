
<?php

// membuat query max
 
      $carikode = mysqli_query($koneksi, "SELECT max(id_kategori) from tb_kategori") or die (mysqli_error());
      
      // menjadikannya array
      
      $datakode = mysqli_fetch_array($carikode);
      
      // jika $datakode
      
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       
       // menjadikan $nilaikode ( int )
       
       $kode = (int) $nilaikode;
       
       // setiap $kode di tambah 1
       
       $kode = $kode + 1;
       $kode_otomatis = "K".str_pad($kode, 3, "0", STR_PAD_LEFT);
      
      } else {
      
       $kode_otomatis = "K001";
      
      }

?>


<div class="col-lg-6">
<div class="panel-body">


<div class="card-header">
<strong>Tambah Data</strong> <a href="?page=kategori" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
<form method="POST">

<div class="form-group">
	<label>ID Kategori</label>
	<input class="form-control" name="id_kategori" value="<?php echo $kode_otomatis?>" readonly>
</div>
      <div class="form-group">
          <label>Kategori</label>
          <input class="form-control" name="kategori" required/>
      </div>
   

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
        $id_kategori = $_POST['id_kategori'];
        $kategori = $_POST['kategori'];
       
       
        $simpan = $_POST['simpan'];
 
        if ($simpan) {
            
        $sql = $koneksi->query("insert into tb_kategori(id_kategori,kategori) values ('$id_kategori','$kategori')");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=kategori";

                </script>

                <?php

            }
        }
        

        ?>