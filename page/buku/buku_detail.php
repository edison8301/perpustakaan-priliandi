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

function fungsiisbn() {
    var x = document.getElementById("isbn").value;
    document.getElementById("hasilisbn").innerHTML = x;
}


</script>




<div class="row">
       <div class="col-lg-6">
          <div class="card-header">
            <strong>Buku Detail</strong> <a href="?page=buku" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                <label>KD Buku</label>
                <input class="form-control" name="kd_buku" id="kd_buku" disabled placeholder="KODE BUKU" oninput="fungsikd()" value="<?php echo $tampil['kd_buku'];?>" required/>
            </div>

                <div class="form-group">
               <div class="form-group">
                    <label>ID Kategori</label>
                    <select class="form-control" name="kategori" disabled value="<?php echo $tampil['id_kategori']?>"  required>
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
          <input class="form-control" name="judul" id="judul" disabled placeholder="JUDUL" oninput="fungsijudul()" value="<?php echo $tampil['judul'];?>" required/> 
      </div>

       <div class="form-group">
          <label>Pengarang</label>
          <input class="form-control" name="pengarang" placeholder="PENGARANG" disabled oninput="fungsipengarang()" value="<?php echo $tampil['pengarang'];?>" required/>
      </div>

       <div class="form-group">
          <label>Penerbit</label>
          <input class="form-control" name="penerbit" placeholder="PENERBIT" disabled oninput="fungsipenerbit()" value="<?php echo $tampil['penerbit'];?>" required/> 
      </div>

      <div class="form-group">
          <label>Tahun Terbit</label>
          <select class="form-control" name="thn_terbit" disabled value="<?php echo $tampil['thn_terbit']?>" required>
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
          <label>Isbn</label>
          <input class="form-control" name="isbn" id="isbn" placeholder="KODE BUKU" disabled oninput="fungsikd()" value="<?php echo $tampil['isbn'];?>" required/>
      </div>

      <div class="form-group">
          <label>Jumlah Buku</label>
          <input class="form-control" type="number" disabled value="<?php echo $tampil['jumlah_buku']?>" name="jumlah" required />
      </div>

     <div class="form-group">
      <label>Lokasi</label>
      <select class="form-control" disabled name="lokasi">
          <option value="rak 1" <?php if ($lokasi =='rak 1')  {echo "selected";} ?>>Rak 1</option>
          <option value="rak 2" <?php if ($lokasi =='rak 2')  {echo "selected";} ?>>Rak 2</option>
          <option value="rak 3" <?php if ($lokasi =='rak 3')  {echo "selected";} ?>>Rak 3</option>
      </select>
  </div>

      <div class="form-group">
          <label>Tanggal Input</label>
          <input class="form-control"disabled name="tanggal" value="<?php echo $tampil['tgl_input']?>" type="date" required />
      </div>

          </form>
          </div>
  </div>
</div>

</div>
<div class="col-lg-6">
    <div class="card-header">
        <div class="header">
            <h4 align="center">Desain Kartu Anggota</h4>
            <hr>
            <div class="body" style="padding: 0px;">
                <!-- kartu member tampak dari depan -->
                <div class="card" style="border-radius: 10px;" >
                    <div class="card" align="center">
                        <table align="center" class="atas">
                            <th>
                                <img src="images/logosmk.png" class="img-circle" alt="Logo STIE" width="50" height="45"></th> 
                            </th>
                            <th>
                              <h4 align="center">Kartu Anggota Perpustakaan<br><small align="center">STIE Satya Dharma Singaraja</small></h4>
                          </th>                        
                      </table>
                      <ul class="header-dropdown m-r--5"></ul>
                  </div>
                  <div class="body responsive" style="padding: 30px;">
                    <table width="100%" " class="tengah responsive" >
                      <tr valign="top">
                        <th  rowspan="5" valign="top" width="150px;">
                            <img src="images/no-photo.jpg" id="viewfoto" class="img-thumbnail fview" alt="Cover Buku">
                        </th>
                        <td valign="top">KD BUKU</td>
                        <td>:</th>
                            <td align="left" id="hasilkd"><?php echo $tampil['kd_buku']?></td>
                        </tr>
                        <tr>
                            <th>JUDUL</th>
                            <th>:</th>
                            <td align="left" id="hasiljudul"><?php echo $tampil['judul']?></td>
                        </tr>

                        
                        <tr>
                            <th>PENGARANG</th>
                            <th>:</th>
                            <td align="left" id="hasilpengarang"><?php echo $tampil['pengarang']?></td>
                        </tr>
                        <tr valign="top">
                            <th>PENERBIT</th>
                            <th>:</th>
                            <td align="left" id="hasilpenerbit"><?php echo $tampil['penerbit']?></td>
                        </tr>
                         <tr valign="top">
                            <th>ISBN</th>
                            <th>:</th>
                            <td align="left" id="hasilisbn"><?php echo $tampil['isbn']?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <td></td>
                            <td>
                                <div class="ttd responsive pull-right">
                                    <?php echo "Singaraja, ". date("d-m-Y")."<br><small>Kepala Perpustakaan</small><br>"?>
                                    <img src="" width="40" height="40" ><br>

                                    <small><u>Ni Komang Hermawati</u></small>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>



            </div>
            
            <!-- kartu member tampak dari belakang -->
            <div class="card" style="background-color: white; border-radius: 10px">
                <div class="card-header" style="background-color: white; border-radius: 10px">
                    
                    <div class="body" style="padding: 30px;">
                        
                       
                        <table align="center" class="atas">
                            <center><h2><u>CATATAN</u></h2></center>
                        </th>                        
                    </table>
                    <ul class="header-dropdown m-r--5"></ul>

                    <br>
                    <div class="isicatatan">
                        <ol>
                            <li>Kartu Anggota ini harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.</li>
                            <li>Tanpa kartu anggota, kunjungan, pinjaman, pengembalian tidak dilayani.</li>
                            <li>Pengembalian lewat dari batas waktunya akan dikenakan denda.</li>
                            <li>Waktu pinjaman lamanya 7 hari dan dapat diperpanjang 7 hari lagi bila tidak ada yang memesannya.</li>
                        </ol>
                    </div>
                    <br>
                    <table width="100%">
                        <th><div class="pull-right" id="valbar" ></div></th>
                         <script type="text/javascript">
                                        fungsikd();
                                    </script>

                    </table>
                </div>
            </div>


