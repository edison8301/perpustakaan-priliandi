<?php

$kd_pinjam = $_GET['kd_pinjam'];

$sql = $koneksi->query("select * from tb_peminjaman where kd_pinjam = '$kd_pinjam'");

$tampil = $sql->fetch_assoc();



?>




<div class="panel panel-default">
<div class="panel-heading">
     
        
 </div>   
<div class="col-lg-12">
<div class="panel-default">

<div class="card-header"><strong>DET</strong><a href="?page=transaksi" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
<form method="POST">
<div class="form-group">
<label>Kode Pinjam</label>
<input class="form-control" name="kd_pinjam" value="<?php echo $tampil['kd_pinjam']?>" readonly/>
</div>

<div class="form-group">
<label>Judul Buku</label>
<input class="form-control" name="judul" value="<?php echo $tampil['judul']?>" readonly />
</div>

<div>
<label>Tanggal Pinjam</label>
<input class="form-control" name="tgl_pinjam" type="text" kd="tgl" value="<?php echo $tampil['tgl_pinjam']?>" readonly />
</div>

<div>
<label>Tanggal Kembali</label>
<input class="form-control" name="tgl_kembali" type="text" kd="tgl" value="<?php echo $tampil['tgl_kembali']?>" readonly/>
</div>
</div>
<div></div>
<div class="form-group">
<label>Keterangan Buku</label>
                        <td>:</td>
                        <td>
                            <select name="ket">
                                <option value="Tidak ada">Tidak ada</option>
                                <option value="Hilang">Hilang</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </td>
</div>

<div class="form-group">
<label>Denda</label>
<input class="form-control" name="lambat"  value="<?php echo $tampil['denda1']?>"/>
</div>


<div>


<input type="submit" name="ubah" value="ubah" class="btn btn-primary"></input>
 <input type="reset"  value="Reset" class="btn btn-danger"></input>

</div>

</div>

</form>
	
</div>
</div>
</div>

</div>