<?php
include "koneksi.php";
include "login.php";
if(isset($_SESSION['status'])){
        //Input Absen
        if($_GET['type'] == 'td'){
            $date = date('Y-m-d');
            $query = mysqli_query($conn, "SELECT * FROM log where id_kategori = '$_POST[kategori]' and npm = '$_SESSION[npm]' and shift = '$_POST[shift]' and pertemuan = '$_POST[pertemuan]'");
            $j_query = mysqli_num_rows($query);
            if($j_query == 0){
                $query = mysqli_query($conn, "INSERT INTO log (id_kategori, shift, npm, pertemuan, sebagai) values ('$_POST[kategori]', '$_POST[shift]', '$_SESSION[npm]', '$_POST[pertemuan]','$_SESSION[status]')");
                if($query){
                    header("location:home.php?p=berhasil");
                }else{
                    header("location:home.php?p=gagal");
                }
            }else{
                header("location:home.php?p=already");
            }
    
        }

        //Force Change Password
        if($_GET['type'] == 'cp'){
            if($_POST['password'] == $_SESSION['npm']){
                header("location:home.php?cp=tidakbolehsama");
            }elseif($_POST['password'] != ''){
            $query = mysqli_query($conn,"UPDATE pengguna set password='$_POST[password]' where npm = '$_SESSION[npm]'");
                if($query){
                    header("location:logout.php?p=cp");
                }else{
                    header("location:home.php?cp=gagal");
                }
            }else{
                header("location:home.php?cp=passwordkosong");
            }
        }
	if($_SESSION['status'] == 'admin')
	{		
        //Hapus Kategori
        if($_GET['type'] == 'd_kategori'){

            $query = mysqli_query($conn, "DELETE FROM kategori where id_kategori = '$_POST[id]'");
            if($query){
                header("location:admin.php?p=berhasil");
            }else{
                header("location:admin.php?p=gagal");
            }

        }	
        //Input Kategori sekaligus jadwal
        if($_GET['type'] == 'kategori'){
            //Query untuk memasukan data
            $query = mysqli_query($conn, "INSERT INTO kategori (kategori) values ('$_POST[kategori]')");
            if($query){
                $query = mysqli_query($conn, "SELECT * from kategori order by id_kategori DESC");
                $row = mysqli_fetch_array($query);
                $query = mysqli_query($conn, "INSERT INTO jadwal (id_kategori, kategori) values ('$row[id_kategori]', '$row[kategori]')");
                if($query){
                    header("location:admin.php?p=berhasil");
                }else{
                    header("location:admin.php?p=gagal");
                }
            }else{
                header("location:admin.php?p=gagal");
            }
        }
        
        //Input akun
        if($_GET['type'] == 'tdu'){

            $query = mysqli_query($conn, "INSERT INTO pengguna (npm, nama, kelas, password, status, norek ) values ('$_POST[npm]', '$_POST[nama]', '$_POST[kelas]', '$_POST[npm]','$_POST[status]', '$_POST[norek]')");
            if($query){
                header("location:admin.php?p=berhasil");
            }else{
                header("location:admin.php?p=gagal");
            }

        }

        //Update akun
        if($_GET['type'] == 'update'){
            if($_POST['pw'] != ''){
            $query = mysqli_query($conn,"UPDATE pengguna set npm='$_POST[npm]',nama='$_POST[nama]',kelas='$_POST[kelas]',norek='$_POST[norek]',status='$_POST[status]',password='$_POST[pw]' where npm = '$_POST[id]'");
            }else{
            $query = mysqli_query($conn,"UPDATE pengguna set npm='$_POST[npm]',nama='$_POST[nama]',kelas='$_POST[kelas]',norek='$_POST[norek]',status='$_POST[status]' where npm = '$_POST[id]'");
            }
            if($query){
                header("location:admin.php?p=berhasil");
            }else{
                header("location:admin.php?p=gagal");
            }
        }

        //Hapus Akun
        if($_GET['type'] == 'd_user'){

            $query = mysqli_query($conn, "DELETE FROM pengguna where npm = '$_POST[id]'");
            if($query){
                header("location:admin.php?p=berhasil");
            }else{
                header("location:admin.php?p=gagal");
            }

        }

        //Hapus Absen
        if($_GET['type'] == 'd_log'){

            $query = mysqli_query($conn, "DELETE FROM log where id='$_POST[id]'");
            if($query){
                header("location:admin.php?p=berhasil");
            }else{
                header("location:admin.php?p=gagal");
            }
        }

        //upload jadwal
        if($_GET['type'] == 'tj'){
            //pengujian jika tombol upload diklik
            if(isset($_POST['bupload']))
            {
                //ekstensi file yang boleh di upload
                $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
                $nama = $_FILES['file']['name']; // untuk mendapatkan nama file yang diupload
                //nama_file.jpg
                $nama_files = $_POST['id'].'-'.date('Y-m-d-s').$nama;
                $x = explode('.', $nama);
                $ekstensi = strtolower(end($x));
                $ukuran = $_FILES['file']['size']; //untuk mendapatkan ukuran file yang akan di upload
                $file_tmp = $_FILES['file']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)

                //uji jika ekstensi file yang diupload sesuai
                if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
                    //boleh upload file
                    //uji jika ukuran file dibawah 5MB
                    if($ukuran < 40000000){
                        //jika ukuran sesuai
                        //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
                        move_uploaded_file($file_tmp, 'file/'.$nama_files);

                        //simpan data ke dalam database
                        $simpan = mysqli_query($conn, "UPDATE jadwal SET namafile='$nama_files' WHERE id = '$_POST[id]'");
                        if($simpan){
                            header("location:home.php?p=berhasil");
                        }else{
                            header("location:home.php?p=gagal");
                        }

                    }else{
                        //ukuran tidak sesuai
                        header("location:home.php?p=terlalubesar");
                    }
                }else{
                    //ektensi file yang di upload tidak sesuai
                    header("location:home.php?p=ekstensitidaksesuai");
                }


            }
        }
        //hapus jadwal
        if($_GET['type'] == 'd_jad'){
            $query = mysqli_query($conn, "SELECT * from jadwal where id='$_POST[id]'");
            $row = mysqli_fetch_array($query);
            $file = $row['namafile'];
            $query = mysqli_query($conn, "UPDATE jadwal SET namafile='' WHERE id = '$_POST[id]'");
            if($query){
                unlink("foto/".$file); // hapus gambar
                header("location:home.php?p=berhasil");
            }else{
                header("location:home.php?p=gagal");
            }
        }
    }  
}
?>