

 <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: cyan;" >
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?page=anggota"><h5>ANGGOTA</div></a></h5>

                                            <?php                                            
                                            $sql = "SELECT COUNT(nis_nip) AS total FROM tb_anggota";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: lightgreen;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?page=buku"><h5>BUKU</div></a></h5>
                                            <?php                                            
                                            $sql = "SELECT COUNT(kd_buku) AS total FROM tb_buku";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body"  style="background-color: orange;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?page=kategori"><h5>KATEGORI</div></a></h5>
                                            <?php                                            
                                            $sql = "SELECT COUNT(id_kategori) AS total FROM tb_kategori";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body"  style="background-color: teal;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-7">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?page=transaksi"><h5>BUKU PINJAM</div></a></h5>
                                             <?php                                            
                                            $sql = "SELECT COUNT(kd_pinjam) AS total FROM tb_peminjaman where status='pinjam'";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body"  style="background-color: green;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?page=kembali"><h5>BUKU KEMBALI</div></a></h5>
                                             <?php                                            
                                            $sql = "SELECT COUNT(kd_pinjam) AS total FROM tb_peminjaman where status='kembali'";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>