<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['status'])) {
    //Input Absen
    if ($_GET['type'] == 'td') {
        $query = mysqli_query($conn, "INSERT INTO log (id_pengguna, shift, status) values ('$_SESSION[id]', '$_POST[shift]', '$_SESSION[status]')");
        if ($query) {
            header('location:home.php?p=berhasil');
        } else {
            header('location:home.php?p=gagal');
        }
    }

    //Force Change Password
    if ($_GET['type'] == 'cp') {
        if ($_POST['password'] == $_SESSION['username']) {
            header('location:home.php?cp=tidakbolehsama');
        } elseif ($_POST['password'] != '') {
            $query = mysqli_query($conn, "UPDATE pengguna set password='$_POST[password]' where username = '$_SESSION[username]'");
            if ($query) {
                header('location:logout.php?p=cp');
            } else {
                header('location:home.php?cp=gagal');
            }
        } else {
            header('location:home.php?cp=passwordkosong');
        }
    }
    if ($_SESSION['status'] == 'admin') {
        //Input akun
        if ($_GET['type'] == 'tdu') {
            $query = mysqli_query($conn, "INSERT INTO pengguna (username, nama, password, status ) values ('$_POST[username]', '$_POST[nama]', '$_POST[username]', '$_POST[status]')");
            if ($query) {
                header('location:admin.php?p=berhasil');
            } else {
                header('location:admin.php?p=gagal');
            }
        }

        //Update akun
        if ($_GET['type'] == 'update') {
            if ($_POST['pw'] != '') {
                $query = mysqli_query($conn, "UPDATE pengguna set username='$_POST[username]',nama='$_POST[nama]',status='$_POST[status]',password='$_POST[pw]' where id = '$_POST[id]'");
            } else {
                $query = mysqli_query($conn, "UPDATE pengguna set username='$_POST[username]',nama='$_POST[nama]',status='$_POST[status]' where id = '$_POST[id]'");
            }
            if ($query) {
                header('location:admin.php?p=berhasil');
            } else {
                header('location:admin.php?p=gagal');
            }
        }

        //Hapus Akun
        if ($_GET['type'] == 'd_user') {
            $query = mysqli_query($conn, "DELETE FROM pengguna where id = '$_POST[id]'");
            if ($query) {
                header('location:admin.php?p=berhasil');
            } else {
                header('location:admin.php?p=gagal');
            }
        }

        //Hapus Absen
        if ($_GET['type'] == 'd_log') {
            $query = mysqli_query($conn, "DELETE FROM log where id='$_POST[id]'");
            if ($query) {
                header('location:admin.php?p=berhasil');
            } else {
                header('location:admin.php?p=gagal');
            }
        }
    }
}
?>
