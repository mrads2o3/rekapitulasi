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
        <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dasbor</a>
            </li>
        </ul>
        <span class="navbar-text">
            Laboratorium Akuntansi Menengah
        </span>
        </div>
    </div>
    </nav>
    <!-- -->

    <!-- main -->
    <div class="container-fluid">
      <div class=" p-5 rounded">
        <div class="row">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="../img/user.png" class="card-img-top" width="100" height="250">
                <div class="card-body">
                  <h5 class="card-title">$nama_user</h5>
                </div>
                <table class="table align-middle">
                      <tr> 
                        <td>NPM</td>
                        <td>$NPM</td>
                      </tr>
                      <tr> 
                        <td>Kelas</td>
                        <td>$Kelas</td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>$Status</td>
                      <tr>
                      <tr>
                        <td>Total Absen Bulan Ini</td>
                        <td>$Status</td>
                      <tr>
                      <tr>
                        <td>Absen Terakhir</td>
                        <td>$timestamp</td>
                      <tr>
                </table>
            </div>
          </div>

          <div class="col-md-9">

            <div class="row">
              <div class="col">
                <div class="container-fluid">
                  <div class="bg-dark p-3 rounded text-center text-light">
                    <b><h1>History Absen</h1></b>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="container-fluid">
                  <div class="bg-light p-3 mt-3 rounded text-center">

                    <!-- Tabel history absen -->
                    <div class="history">
                      <table class="table">
                        <tr>
                          <th>Tanggal</th>
                          <th>Kategori</th>
                          <th>Sebagai</th>
                          <th>Keterangan</th>
                        </tr>
                      <?php
                        if($query){

                        }
                        else{
                          echo `
                        <tr>
                          <td colspan=4 >Tidak ada data</td
                        </tr>
                          `;
                        }
                      ?>
                      </table>
                    </div>

                    <!-- Button -->
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="button">Tambah Absensi</button>
                    </div>

                  </div>
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
</html>