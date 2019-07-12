
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



       
<div class="pannel-body">
<div class="row">
       <div class="col-md-12">
          <div class="card-header">
            <strong>Tambah Data</strong> <a href="?page=buku" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
          <div class="row">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                <label>KD Buku</label>
                <input class="form-control" name="kd_buku" placeholder="KODE BUKU" id="kd_buku" oninput="fungsikd()" required/>
            </div>

                <div class="form-group">
               <div class="form-group">
                    <label>ID Kategori</label>
                    <select class="form-control" name="kategori" required>
<?php
    
    $sql = $koneksi->query("select *from tb_kategori order by id_kategori");

     while ($data=$sql->fetch_assoc()) {
        echo "<option value='$data[id_kategori].$data[kategori]'> [$data[id_kategori]]  $data[kategori]</option>";
    }

?>
  

</select>
    </div>

                
      <div class="form-group">
          <label>Judul</label>
          <input class="form-control" name="judul" placeholder="JUDUL BUKU" id="judul" oninput="fungsijudul()" required /> 
      </div>

       <div class="form-group">
          <label>Pengarang</label>
          <input class="form-control" name="pengarang" placeholder="PENGARANG" id="pengarang" oninput="fungsipengarang()" required /> 
      </div>

       <div class="form-group">
          <label>Penerbit</label>
          <input class="form-control" name="penerbit" placeholder="PENERBIT" id="penerbit" oninput="fungsipenerbit()" required /> 
      </div>

      <div class="form-group">
          <label>Tahun Terbit</label>
          <select class="form-control" name="tahun" required>
           
           <?php

           $tahun = date("Y");
           for ($i=$tahun-15; $i <=$tahun;$i++) {     
              echo' 


                  <option value="'.$i.'">'.$i.'</option>


              ';
           }

           ?>   

          </select>
      </div>

      <div class="form-group">
          <label>Jumlah Buku</label>
          <input class="form-control" type="number" placeholder="JUMLAH BUKU" name="jumlah" required />
      </div>

      

      <div class="form-group">
          <label>Tanggal Input</label>
          <input class="form-control" name="tanggal" type="date" required />
      </div>

      <div>
          

          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
           <input type="reset"  value="Reset" class="btn btn-danger"></input>


        </div>

          </form>
          </div>
  </div>
</div>








        <?php
        $kd_buku = $_POST['kd_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $isbn = $_POST['isbn'];
        $jumlah = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];
        $tanggal = $_POST['tanggal'];
        $simpan = $_POST['simpan'];

        $kategori = $_POST['kategori'];
        $pecah_kategori = explode(".", $kategori);
        $id_kategori = $pecah_kategori[0];
        $kategori = $pecah_kategori[1];

        if ($simpan) {
            
            $sql = $koneksi->query("insert into tb_buku(kd_buku,id_kategori,judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input)values('$kd_buku','$id_kategori','$judul','$pengarang','$penerbit','$tahun','$isbn',' $jumlah','$lokasi','$tanggal')");

        $cekkd_buku = mysqli_query($koneksi, "SELECT kd_buku FROM tb_buku WHERE kd_buku = '$kd_buku'");
    if (mysqli_num_rows($cekkd_buku) > 0) 
    {
        echo "<script>alert('Berhasil menambahkan!!');</script>";
        return false;
    }

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=buku";

                </script>

                <?php

            }
        }
        

        ?>