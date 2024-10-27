<?php 

    include 'koneksi.php';
    include 'login.php';
    include 'modal-cp.php';

    if($_SESSION['status'] == 'admin'){

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background-color: 255-255-255;
        }
    </style>
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js">
    </script>

    <title>Rekapitulasi Klinik dr Sudirman</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="" width="100" height="60"
                    class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">Halaman Utama</a>
                    </li>
                    <?php if ($_SESSION['status'] == 'admin') {
                        echo '
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Admin</a>
                                        </li>';
                    } ?>
                </ul>
                <span class="navbar-text text-center">
                    Klinik dr Sudirman
                </span>
            </div>
        </div>
    </nav>
    <!-- -->

    <!-- main -->
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="bg-light p-4 rounded text-center text-dark">
                <b>
                    <h3>Jumlah Pengguna</h3>
                </b>
                <hr>
                <center>
                    <div class="table">
                        <div class="row">
                            <div class="col">
                                <div class="card text-center mt-4" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Admin</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?php
                                            $admin = mysqli_query($conn, "SELECT * FROM pengguna WHERE status = 'admin'");
                                            $j_admin = mysqli_num_rows($admin);
                                            echo $j_admin;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center mt-4" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Dokter</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?php
                                            $asisten = mysqli_query($conn, "SELECT * FROM pengguna WHERE status = 'dokter'");
                                            $j_asisten = mysqli_num_rows($asisten);
                                            echo $j_asisten;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center mt-4" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Perawat</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?php
                                            $programmer = mysqli_query($conn, "SELECT * FROM pengguna WHERE status = 'perawat'");
                                            $j_programmer = mysqli_num_rows($programmer);
                                            echo $j_programmer;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <hr>
                <?php
                if (isset($_GET['p'])) {
                    if ($_GET['p'] == 'berhasil') {
                        echo '
                                            <div class="alert alert-success" role="alert">
                                            Selamat! Aksi anda berhasil disimpan.
                                            </div>';
                    } elseif ($_GET['p'] == 'gagal') {
                        echo '
                                            <div class="alert alert-danger" role="alert">
                                            Maaf! Aksi anda gagal disimpan.<br>
                                            Silahkan hubungi administrator.
                                            </div>';
                    } elseif ($_GET['p'] == 'na') {
                        echo '
                                                <div class="alert alert-warning" role="alert">
                                                Rekapitulasi bulan yang dipilih tidak tersedia.
                                                </div>';
                    }
                }
                ?>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-akun-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-akun" type="button" role="tab" aria-controls="nav-akun"
                            aria-selected="true">Akun</button>
                        <button class="nav-link" id="nav-rekap-tab" data-bs-toggle="tab" data-bs-target="#nav-rekap"
                            type="button" role="tab" aria-controls="nav-rekap" aria-selected="false">Rekap</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!-- Akun -->
                    <div class="tab-pane fade mt-4 show active" id="nav-akun" role="tabpanel" aria-labelledby="nav-akun-tab">
                        <div class="table">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped display" id="table-akun">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;
                                            $kategori = mysqli_query($conn, 'SELECT * FROM pengguna order by status DESC');
                                            if (!$kategori) {
                                                die('SQL Error: ' . mysqli_error($conn));
                                            }
                                            while ($row = mysqli_fetch_array($kategori)) {
                                                $id = $row['id'];
                                                $npm = $row['username'];
                                                $nama = $row['nama'];
                                                $status = $row['status'];
                                                echo '
                                                                                    
                                                                                    <tr>
                                                                                        <td>' .
                                                    $num .
                                                    '</td>
                                                                                        <td>' .
                                                    $id .
                                                    '</td>
                                                                                        <td>' .
                                                    $npm .
                                                    '</td>
                                                                                        <td>' .
                                                    $nama .
                                                    '</td>
                                                                                        <td>' .
                                                    $status .
                                                    '</td>
                                                                                        <td>
                                                                                            <a href="#" class="editbtn">Ubah</a>
                                                                                            /
                                                                                            <a href="#" class="akundel">Hapus</a>       
                                                                                        </td>
                                                                                    </tr>';
                                                $num += 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            $('#table-akun').DataTable(

                                            );
                                        });
                                    </script>
                                </div>

                                <div class="col mt-4">
                                    <form method="post" action="proses.php?type=tdu">

                                        <img class="mb-4" src="img/logo.jpg" width="300" height="150">
                                        <h4>Tambah Akun</h4>
                                        <hr>
                                        <div class="form-floating mt-4">
                                            <input type="text" class="form-control" id="usernameAcc"
                                                placeholder="Username" name="username" Required>
                                            <label for="usernameAcc">username</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control" id="nameAcc"
                                                placeholder="Nama" name="nama" Required>
                                            <label for="nameAcc">Nama</label>
                                        </div>
                                        <div class="mb-4 mt-2 form-floating">
                                            <select class="form-select" aria-label="Default select example"
                                                id="statusAcc" placeholder="Status" name="status" Required>
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value='admin'>Admin</option>
                                                <option value='dokter'>Dokter</option>
                                                <option value='perawat'>Perawat</option>
                                            </select>
                                            <label for="statusAcc">Status</label>
                                        </div>

                                        <button class="mb-4 w-100 btn btn-lg btn-primary"
                                            type="submit">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Rekap -->
                    <div class="tab-pane fade" id="nav-rekap" role="tabpanel" aria-labelledby="nav-rekap-tab">
                        <div class="table mt-4">
                            <div class="row">
                                <div class="col">
                                    <h2> Tabel Data Absensi</h2>
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <div class="mb-4">Download Rekap :</div>

                                                </td>
                                                <td colspan="5">
                                                    <form action="cetak.php" method="post">
                                                        <div class="input-group">
                                                            <select class="form-select form-control"
                                                                id="downloadMonth" name="bulan">
                                                                <option disabled selected>- Pilih Bulan -</option>
                                                                <option value="01">Januari</option>
                                                                <option value="02">Februari</option>
                                                                <option value="03">Maret</option>
                                                                <option value="04">April</option>
                                                                <option value="05">Mei</option>
                                                                <option value="06">Juni</option>
                                                                <option value="07">Juli</option>
                                                                <option value="08">Agustus</option>
                                                                <option value="09">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                            <button class="btn btn-outline-secondary"
                                                                type="submit">Download</button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="search..." hidden>
                                                    </div>

                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table class="table table-striped display" id="absen" data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>ID Log</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Shift</th>
                                                <th>Sebagai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tgl = date('Y-m%');
                                            $history = mysqli_query($conn, 'SELECT l.waktu as waktu, username, p.nama as nama, shift, l.status as status, l.id as id FROM log l left join pengguna p on p.id = l.id_pengguna order by l.waktu DESC');
                                            $p = 0;
                                            while ($baris = mysqli_fetch_array($history)) {
                                                $p++;
                                                $waktu = $baris['waktu'];
                                                $npm = $baris['username'];
                                                $nm = $baris['nama'];
                                                $shift = $baris['shift'];
                                                $sebagai = $baris['status'];
                                                $id = $baris['id'];
                                                echo '
                                                                                                <tr>
                                                                                                    <td>' .
                                                    $waktu .
                                                    '</td>
                                                                                                    <td>' .
                                                    $id .
                                                    '</td>
                                                                                                    <td>' .
                                                    $npm .
                                                    '</td>
                                                                                                    <td>' .
                                                    $nm .
                                                    '</td>
                                                                                                    <td>' .
                                                    $shift .
                                                    '</td>
                                                                                                    <td>' .
                                                    $sebagai .
                                                    '</td>
                                                                                                    <td>
                                                                                                        <a href="#" class="logdel">Hapus</a>
                                                                                                    </td>
                                                                                                </tr>';
                                            }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            $('#absen').DataTable(

                                            );
                                        });
                                    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
        </script>
        -->
    <!----------------------------------------- Modals ------------------------------------------->

</body>

</html>
<?php 

    }elseif(!isset($_SESSION['username'])){ 
        header("location:index.php?notif=belum_login");
    }else{
        echo'
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <div class="container-fluid mt-4 text-center text-dark bg-light">
        
                <img src="img/denied.jpg" width="200" height="200">
                    <b><h3>Opps ! Anda tidak ada hak untuk mengakses halaman ini, silahkan kembali ke halaman utama</h3></b>
                    <form action = "home.php">
                        <button class="w-100 btn btn-lg btn-success" type="submit">Halaman utama</button>
                    </form>

            </div>
        ';
    }

?>
