
<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    session_start();

    include "page/fungsi/function.php";

    $koneksi = new mysqli("localhost","root","","dbsiput");

    if ($_SESSION['admin']) {

?>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Perpustakaan</title>
    <meta name="description" content="Perpustakaan">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/scss/style.scss">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<style type="text/css">
    #lol{
        display: block;
    }
</style>
<script type="text/javascript">
  function sembunyiAtas(){
  var lol = document.getElementsByClassName("LOL");
  for (var i = 0; i <= 5; i++) {
    lol[i].style.display = "none";    
  }
  
}
</script>
</head>

<body>
   
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="?page=anggota">Anggota</a></li>
                            <li><i class="fa fa-book"></i><a href="?page=buku">Buku</a></li>
                            <li><i class="fa fa-users"></i><a href="?page=petugas">Petugas</a>
                            </li>
                            <li><i class="fa fa-tasks"></i><a href="?page=kategori">Kategori</a></li>

                        </ul>
                    </li>
                   
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Transaksi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="?page=transaksi">Peminjaman</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="?page=kembali">Pengembalian</a></li>

                        </ul>
                    </li>

            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
      
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand"><img src="images/logo-perpustakaan.png" alt="Logo"></a>
      
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>


           
                      <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                       
                        <div class="form-inline">
                            
                        </div>  

                        
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin1.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
      
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                    
                
                    
                    
      <?php
                 
                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];
                        $aksianggota = $_GET['aksianggota'];

                        if ($page == "buku") {
                            if($aksi == ""){

                            include "page/buku/buku.php";
                            }elseif ($aksi == "tambah") {
                               include "page/buku/tambah.php";
                            
                            }elseif ($aksi == "ubah") {
                               include "page/buku/ubah.php";

                            }elseif ($aksi == "hapus") {
                               include "page/buku/hapus.php";

                             }elseif ($aksi == "detail") {
                               include "page/buku/buku_detail.php";
                            }

                        }elseif ($page == "anggota") {
                            if ($aksi == ""){     
                            include "page/anggota/anggota.php";

                            }elseif ($aksi == "tambah"){      
                            include "page/anggota/tambah.php";

                            }elseif ($aksi == "ubah"){      
                            include "page/anggota/ubah.php";

                            }elseif ($aksi == "hapus") {
                               include "page/anggota/hapus.php";
                         

                             }elseif ($aksi == "detail") {
                               include "page/anggota/anggota_detail.php";
                            }

                        }elseif ($page == "petugas") {
                            if ($aksi == ""){     
                            include "page/petugas/petugas.php";

                            }elseif ($aksi == "tambah"){      
                            include "page/petugas/tambah.php";

                            }elseif ($aksi == "ubah"){      
                            include "page/petugas/ubah.php";

                            }elseif ($aksi == "hapus") {
                               include "page/petugas/hapus.php";
                            }

                          }elseif ($page == "kategori") {
                            if ($aksi == ""){     
                            include "page/kategori/kategori.php";

                            }elseif ($aksi == "tambah"){      
                            include "page/kategori/tambah.php";

                            }elseif ($aksi == "ubah"){      
                            include "page/kategori/ubah.php";

                            }elseif ($aksi == "hapus") {
                               include "page/kategori/hapus.php";
                            }
                           

                        }elseif ($page == "transaksi") {
                            if ($aksi == "") {
                                
                            include "page/transaksi/transaksi.php";
                            }elseif ($aksi == "tambah") {
                               include "page/transaksi/tambah2.php";

                         }elseif ($aksi == "kembali") {
                               include "page/transaksi/kembali.php";

                                }elseif ($aksi == "kembali1") {
                               include "page/transaksi/kembali1.php";

                         }elseif ($aksi == "perpanjang") {
                               include "page/transaksi/perpanjang.php";
                         }

                     }elseif ($page == "kembali") {
                            if ($aksi == ""){     
                            include "page/kembali/kembalikan.php";  

                            }

                        }elseif($page==""){
                            include "dashboard.php";                            
                        }

                        ?>
    <!-- /#right-panel -->

   <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script src="assets/js/init/jq.js"></script>

      <!-- Jquery Barcode -->
  <script type="text/javascript" src="assets/js/jquery-barcode.js"></script>




    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
<?php

}else{
    header("location:login.php");
}

?>
</body>
</html>
