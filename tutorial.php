<?php 

    include 'koneksi.php';
    include 'login.php';

    if(isset($_SESSION['username'])){

?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <style>
        body{
            background-color: #f5f5f5;
        }
        </style>
        <title>Rekapitulasi Asisten Labamen</title>
    </head>
    <body>
        
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="" width="70" height="60" class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Halaman Utama</a>
                </li>
                <?php
                if(isset($_SESSION['username'])){
                    if($_SESSION['status'] == 'admin'){
                    echo '
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="admin.php">Admin</a>
                    </li>';
                    }
                }?>
            </ul>
            <span class="navbar-text text-center">
                Laboratorium Akuntansi Menengah <br>
                Universitas Gunadarma
            </span>
            </div>
        </div>
        </nav>
        <!-- -->

        <!-- main -->
        <div class="container-fluid">
            <div class=" p-5 rounded">
                    <div class="container-fluid">
                    <div class="bg-dark p-3 rounded text-center text-light">
                        <b><h1>Tutorial Menggunakan Aplikasi</h1></b>
                    </div>
                    </div>

                    <div class="container-fluid">
                    </div>
                    <div class="container-fluid">
                    <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            #1. Login
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <ul><strong>1. Buka Website *Link.</strong></ul> <br>
                                <img src="img\tutor\login.png" class="rounded mx-auto d-block w-75"><br>
                            <ul><strong>2. Login Menggunakan Akun Yang Sudah Disediakan Oleh Admin.</strong></ul> <br>
                                <img src="img\tutor\idpw.png" class="rounded mx-auto d-block w-75"><br>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            #2. Absen
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <ul><strong>1. Klik Tombol Tambah Absen.</strong></ul> <br>
                                <img src="img\tutor\tambah-klik.png" class="rounded mx-auto d-block w-75"><br>
                            <ul><strong>2. Pilih Jenis Mata Kuliah Yang Ingin Ditambah Absensinya.</strong></ul> <br>
                                <img src="img\tutor\tambah-pilih-jenis.png" class="rounded mx-auto d-block w-75"><br>
                            <ul><strong>3. Pilih Pertemuan.</strong></ul> <br>
                                <img src="img\tutor\tambah-pilih-pertemuan.png" class="rounded mx-auto d-block w-75"><br>
                            <ul><strong>4. Pilih Shift.</strong></ul> <br>
                                <img src="img\tutor\tambah-pilih-shift.png" class="rounded mx-auto d-block w-75"><br>
                            <ul><strong>5. Klik Tambah Untuk Menambahkan Absensi, Selesai.</strong></ul> <br>
                                <img src="img\tutor\tambah-pilih-selesai.png" class="rounded mx-auto d-block w-75"><br>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            #3. Selesai
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body text-center">
                        <ul><strong>Pastikan Sudah Muncul Notifikasi Berhasil!</strong></ul> <br>
                                <img src="img\tutor\selesai.png" class="rounded mx-auto d-block w-75"><br>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>

            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        -->
    </body>
    <footer>
    <div class="container-fluid text-center">
    </div>    
    </footer>
    </html>
<?php 

    }elseif(!isset($_SESSION['username'])){
        header("location:index.php?notif=belum login");
    }

?>