<?php

$id_kategori = $_GET['id_kategori'];

$sql = $koneksi->query("select * from tb_kategori where id_kategori = '$id_kategori'");

$tampil = $sql->fetch_assoc();





?>

  
<div class="col-lg-6">
<div class="panel-body">
          <div class="card-header">
            <strong>Ubah Data</strong> <a href="?page=kategori" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
                                <form method="POST">
                                        <div class="form-group">
                                            <label>ID Kategori</label>
                                            <input class="form-control" name="id_kategori" value="<?php echo $tampil['id_kategori']?>" readonly/>
                                        </div>

                                         <div class="form-group">
                                            <label>Kategori</label>
                                            <input class="form-control" name="kategori" value="<?php echo $tampil['kategori']?>" />
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


        <?php


        $kategori = $_POST['kategori'];
       
       
        $simpan = $_POST['simpan'];

        if ($simpan) {
            
        $sql = $koneksi->query("update tb_kategori set kategori='$kategori' where id_kategori='$id_kategori' ");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Diubah");
                    window.location.href="?page=kategori";

                </script>

                <?php

            }
        }
        

        ?>