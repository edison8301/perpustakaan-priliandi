<?php

    $kd_buku = $_GET['kd_buku'];

    $sql = $koneksi->query("select * from tb_buku where kd_buku='$kd_buku'");

    $tampil = $sql->fetch_assoc();

    $tahun2 = $tampil['thn_terbit'];

    $lokasi = $tampil['lokasi'];

?>




<!-- Style css -->
<style>
    .atas tr th
    {
        padding:4px;
    }
    .tengah tr th, td {
        padding: 5px;
        text-align: left;
        font-size: 65%;

    }
    .tengah tr th img {
        margin-top: 0px;
    }
    .tengah tr th
    {
        text-align: top;
    }
    .fview 
    {
        background-image: url('images/no-photo.jpg');
        height: 100px;
        width: 80px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 70px;
    }
    @media screen and (max-width: 520px) 
    {
        .fview 
        {
            width: 50px; height: 50px; transition: 0.5s;
            background-size: 20px;
        }

    }
    /*.fview:hover { width: 50px; height: 40px; transition: 0.5s; }*/
    .ttd 
    {
        text-align: center;
    }
    .isicatatan ol li 
    {
        font-size: 90%;
    }
    .barcode 
    {
        border: 1px solid lightgreen;
    }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 40px; }
</style>
<!-- ENd CSS -->

<script>

    function preview_foto(event) 
    { 

       var reader = new FileReader();
       reader.onload = function()
       {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
// fungsi type string dan barcode

function fungsikd() {
    var settings = {
        barWidth: 1,
        barHeight: 50,
        moduleSize: 1,
        showHRI: false,
        addQuietZone: true,
        marginHRI: 5,
        bgColor: "#FFFFFF",
        color: "#000000",
        fontSize: 10,
        output: "css",
        posX: 0,
        posY: 0
    };
// barcode generate
var barr = $("#kd_buku").val() ;
document.getElementById("hasilkd").innerHTML = barr;
$("#valbar").html("").show().barcode( barr, "code128", settings);
};



function fungsijudul() {
    var x = document.getElementById("judul").value;
    document.getElementById("hasiljudul").innerHTML = x;
}

function fungsipengarang() {
    var x = document.getElementById("pengarang").value;
    document.getElementById("hasilpengarang").innerHTML = x;
}

function fungsipenerbit() {
    var x = document.getElementById("penerbit").value;
    document.getElementById("hasilpenerbit").innerHTML = x;
}



</script>



   
    <div class="panel-body">

       <div class="col-lg-12">
          <div class="card-header">
            <strong>Ubah Data</strong> <a href="?page=buku" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                <label>KD Buku</label>
                <input class="form-control" name="kd_buku" id="kd_buku" placeholder="KODE BUKU" oninput="fungsikd()" value="<?php echo $tampil['kd_buku'];?>" required/>
            </div>

                <div class="form-group">
               <div class="form-group">
                    <label>ID Kategori</label>
                    <select class="form-control" name="kategori" value="<?php echo $tampil['id_kategori']?>"  required>
<?php
    
    $sql = $koneksi->query("select *from tb_kategori order by id_kategori");

     while ($data=$sql->fetch_assoc()) {
        echo "<option value='$data[id_kategori].$data[kategori]'> [$data[id_kategori]] $data[kategori]</option>";
    }

?>
  

</select>
    </div>

                
      <div class="form-group">
          <label>Judul</label>
          <input class="form-control" name="judul" id="judul" placeholder="JUDUL" oninput="fungsijudul()" value="<?php echo $tampil['judul'];?>" required/> 
      </div>

       <div class="form-group">
          <label>Pengarang</label>
          <input class="form-control" name="pengarang" placeholder="PENGARANG" oninput="fungsipengarang()" value="<?php echo $tampil['pengarang'];?>" required/>
      </div>

       <div class="form-group">
          <label>Penerbit</label>
          <input class="form-control" name="penerbit" placeholder="PENERBIT" oninput="fungsipenerbit()" value="<?php echo $tampil['penerbit'];?>" required/> 
      </div>

      <div class="form-group">
          <label>Tahun Terbit</label>
          <select class="form-control" name="thn_terbit" value="<?php echo $tampil['thn_terbit']?>" required>
<?php

         $tahun = date("Y");
         for ($i=$tahun-15; $i <=$tahun;$i++) {     

            if ($i ==$tahun2) {
                
            echo'<option value="'.$i.'" selected>'.$i.'</option>';
            }else{

            echo'<option value="'.$i.'">'.$i.'</option>';


            
         }
     }

         ?>   

          </select>
      </div>

      <div class="form-group">
          <label>Jumlah Buku</label>
          <input class="form-control" type="number" value="<?php echo $tampil['jumlah_buku']?>" name="jumlah" required />
      </div>


      <div class="form-group">
          <label>Tanggal Input</label>
          <input class="form-control" name="tanggal" value="<?php echo $tampil['tgl_input']?>" type="date" required />
      </div>

      <div>
          

          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
           <input type="reset"  value="Reset" class="btn btn-danger"></input>


        </div>

          </form>
          </div>
  </div>
</div>

</div>



 <?php

        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $thn_terbit = $_POST['thn_terbit'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];

        $simpan = $_POST['simpan'];

        $kategori = $_POST['kategori'];
        $pecah_kategori = explode(".", $kategori);
        $id_kategori = $pecah_kategori[0];
        $kategori = $pecah_kategori[1];

        if ($simpan) {
            
            $sql = $koneksi->query("update tb_buku set id_kategori='$id_kategori',judul='$judul',pengarang='$pengarang',penerbit='$penerbit',thn_terbit='$thn_terbit',jumlah_buku='$jumlah',tgl_input='$tanggal' where kd_buku='$kd_buku'");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil diubah");
                    window.location.href="?page=buku";

                </script>

                <?php

            }
        }
        

        ?>