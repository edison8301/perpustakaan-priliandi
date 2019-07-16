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
function fungsinama() {
    var x = document.getElementById("nama").value;
    document.getElementById("hasilnama").innerHTML = x;
}



function fungsinis() {
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
var barr = $("#nis").val() ;
document.getElementById("hasilnis").innerHTML = barr;
$("#valbar").html("").show().barcode( barr, "code128", settings);
};



function fungsijurusan() {
    var x = document.getElementById("jurusan").value;
    document.getElementById("hasiljurusan").innerHTML = x;
}

function fungsijk() {
    var x = document.getElementById("jk").value;
    document.getElementById("hasiljk").innerHTML = x;
}

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
            <strong>Tambah Data</strong> <a href="?page=anggota" class="col-cyan waves-effect pull-right">Lihat Data</a></div>

          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>ID Anggota</label>
                        <input type="number" id="nis" class="form-control" placeholder="ID Anggota" name="nis_nip" oninput="fungsinis()" readonly />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="NAMA" name="nama_anggota" oninput="fungsinama()" required   />
                    </div>


                    <div class="form-group">
                        <label>No Tlpn</label>
                        <input type="text"  class="form-control" maxlength="12" placeholder="NO TLPN"  name="no_tlpn" required onkeypress="return Angkasaja(event)"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" class="form-control" placeholder="Alamat" name="alamat" oninput=" " required />
                    </div>



                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" placeholder="JK" name="jk" id="jk" oninput="fungsijk()" >
                            <option value="">--Pilih Satu-- </option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>  
                        </select>
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

$nis_nip = $_POST['nis_nip'];
$nama_anggota = $_POST['nama_anggota'];

$name = $_FILES['foto']['name'];
$file = $_FILES['foto']['tmp_name'];

$username = $_POST['username'];
$password = $_POST['password'];
$password_hashing = md5(sha1(crc32($_POST['password'])));
$no_tlpn = $_POST['no_tlpn'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$jurusan = $_POST['jurusan'];

$simpan = $_POST['simpan'];

if ($simpan) {
     move_uploaded_file($file,"images/".$name);
    $sql = $koneksi->query("insert into tb_anggota(nis_nip,nama_anggota,foto,username,password,no_tlpn,alamat,tgl_lahir,jk,jurusan)values('$nis_nip','$nama_anggota','$name','$username','$password_hashing','$no_tlpn','$alamat','$tanggal','$jk','$jurusan')");

   

    if ($sql) {
        
        ?>

        <script type="text/javascript">
            

            alert ("Data Berhasil Disimpan");
            window.location.href="?page=anggota";

        </script>

        <?php

         $ceknisnip = mysqli_query($koneksi, "SELECT nis_nip FROM tb_anggota WHERE nis_nip = '$nis_nip'");
    if (mysqli_num_rows($ceknisnip) > 0) 
    {
        echo "<script>alert('Gagal Menambahkan  Nomor Identitas Sudah Terdaftar!!');</script>";
        return false;
    }

    }
}


?>

