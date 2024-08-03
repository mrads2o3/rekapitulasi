<?php

	session_start();
	include "koneksi.php";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$login = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username' and password = '$password'");
		$a_login = mysqli_num_rows($login);
		if($a_login > 0){
			$ls = mysqli_fetch_array($login);
			$_SESSION['id'] = $ls["id"];
			$_SESSION['nama'] = $ls["nama"];
			$_SESSION['status'] = $ls["status"];
			$_SESSION['username'] = $ls["username"];
			$_SESSION['password'] = $ls["password"];
			header("location:home.php");

		}else{
			header("location:index.php?notif=gagal");
		}
	}

?>