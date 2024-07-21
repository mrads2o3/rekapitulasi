<?php

	session_start();
	include "koneksi.php";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$login = mysqli_query($conn, "SELECT * FROM pengguna WHERE npm = '$username' and password = '$password'");
		$a_login = mysqli_num_rows($login);
		if($a_login > 0){
			$ls = mysqli_fetch_array($login);
			$_SESSION['npm'] = $ls["npm"];
			$_SESSION['password'] = $ls["password"];
			$_SESSION['nama'] = $ls["nama"];
			$_SESSION['kelas'] = $ls["kelas"];
			$_SESSION['status'] = $ls["status"];
			$_SESSION['norek'] = $ls["norek"];
			header("location:home.php");

		}else{
			header("location:index.php?notif=gagal");
		}
	}

?>