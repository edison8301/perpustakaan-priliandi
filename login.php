<?php


  ob_start();
  session_start();
 $koneksi = new mysqli("localhost","root","","dbsiput");
 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 if ($_SESSION['admin']) {



  header("location:login.php");

}


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link href="assets/css/cs-skin-elastic.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
</head>
<body>

    <div class="jumbotron" align="center" style="background-image: url(images/slide5.jpg); background-size: cover; background-attachment: fixed; background-position: center; min-height: 900px;">

    <div class="col-md-4"></div>
 <div  class="col-md-4" >
<div  class="jumbotron" style="background-color: rgba(255,255,255,0.60);">
<div align="left" class="control-group">


               
    <center><img src="images/admin1.png" height="150" width="150">
    <b><div class="panel-title">Perpustakaan</div></b>
</center>
        
    </div>
    <div class="panel-body">
        <form role="form" method="POST">
               <br />
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required />
                </div>
                    <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                    <input type="password" name="password" class="form-control"  placeholder=" Password" required />
                </div>
                
                  <input type="submit" name="login" value="Login" class="btn btn-success" height="50" align="left">

            </form>
    </div>
           
        </div>
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

<?php

  if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $koneksi->query("select * from tb_petugas where username='$username' and password='$password'");
    $data = $sql->fetch_assoc();

   

    $ketemu = $sql->num_rows;
      if ($ketemu >=1) {
         session_start();
      
      $_SESSION['admin'] = $data['kd_petugas'];

         header("location:index.php");


  } else {

    ?>
    <script type="text/javascript">
      
      alert("Login Gagal Username Dan Password Anda Salah...?? Silahkan Login Lagi ^_^")

    </script>
    <?php


}
}

?>