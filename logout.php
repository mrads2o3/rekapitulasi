<?php
    include 'login.php';
	session_destroy();
	if($_GET['p'] == 'cp'){
		header("location:index.php?p=berhasilcp");
	}else{
		header("location:index.php?p=berhasil");
	}
	
?>