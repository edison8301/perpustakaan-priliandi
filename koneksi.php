<?php 
$koneksi=mysqli_connect("localhost","root","","dbpus") or die("koneksi Database gagal");
//mysqli_select_db("malasngoding_kios");

function login($username, $password){
		global $link;

		$query = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		if (!$result) {
			header('location: index.php?s=query-error');
			exit();
		}else{
			session_start();
			$username = $row['username'];
			$_SESSION['nama_petugas'] = $row['nama_petugas'];
			$_SESSION['username'] = $username;

			header("location: petugas/dashboard.php?page=data-buku&u=$username&s=berhasil-login");
			exit();
		}
	}

	//logout
	function logout(){
		session_start();
		session_unset();
		session_destroy();
		header('location: ../index.php?s=berhasil-logout');
		exit();
	}
?>