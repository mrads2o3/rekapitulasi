<?php include 'koneksi.php'; include 'login.php'; include 'modal-cp.php'; 
if(isset($_SESSION[ 'username'])){ ?>
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
            <a class="navbar-brand" href="#">
                <img src="img/logo.jpg" alt="" width="100" height="60"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Halaman
                            Utama</a>
                    </li>
                    <?php if ($_SESSION['status'] == 'admin') {
                        echo '
                                        <li class="nav-item">
                                            <a class="nav-link " aria-current="page" href="admin.php">Admin</a>
                                        </li>';
                    } ?>
                </ul> <span class="navbar-text text-center">
                    Klinik dr Sudirman
                </span>
            </div>
        </div>
    </nav>
    <!-- -->
    <!-- main -->
    <div class="container-fluid">
        <div class="p-4 rounded">
            <div class="table">
                <div class="row">
                    <div class="col-md-3">
                        <div class="container-fluid">
                            <div class="card mt-2 p-0" style="width: auto;">
                                <!--<img src="img/user.png" class="card-img-top" width="10" height="20">-->
                                <div class="card-body text-center">
                                    <h5 class="card-title">Selamat Datang, <?php echo $_SESSION['nama']; ?></h5>
                                </div>
                                <table class="table align-middle">
                                    <tr>
                                        <td>ID</td>
                                        <td>
                                            <?php echo $_SESSION['id'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php echo $_SESSION['status'];?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col">
                                        <a href="logout.php">
                                            <button class="w-100 btn btn-danger" type="button">Keluar</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Absen -->
                            <div class="tab-pane fade show active" id="nav-kategori" role="tabpanel"
                                aria-labelledby="nav-kategori-tab">
                                <div class="table">
                                    <div class="row">
                                        <div class="col">
                                            <div class="container-fluid">
                                                <div class="bg-dark p-3 rounded text-center text-light"> <b>
                                                        <h1>Riwayat Absensi</h1>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="container-fluid">
                                                <div class="bg-light p-3 rounded">
                                                    <!-- Button -->
                                                    <div class="mb-4">
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                                                            Absensi</button>
                                                    </div>
                                                    <?php
                                                    if (isset($_GET['p'])) {
                                                        if ($_GET['p'] == 'berhasil') {
                                                            echo '
                                                                                                            <div class="alert alert-success text-center" role="alert">
                                                                                                            Selamat! Aksi anda berhasil disimpan.
                                                                                                            </div>';
                                                        } elseif ($_GET['p'] == 'gagal') {
                                                            echo '
                                                                                                            <div class="alert alert-danger text-center" role="alert">
                                                                                                            Maaf! Aksi anda gagal disimpan.<br>
                                                                                                            Silahkan hubungi administrator.
                                                                                                            </div>';
                                                        } elseif ($_GET['p'] == 'already') {
                                                            echo '
                                                                                                            <div class="alert alert-warning text-center" role="alert">
                                                                                                            Absen tidak bisa duplikat!!!<br>
                                                                                                            <b>Pertemuan</b> dan <b>Shift</b> sudah ada didalam database.
                                                                                                            </div>';
                                                        } elseif ($_GET['p'] == 'terlalubesar') {
                                                            echo '
                                                                                                            <div class="alert alert-danger text-center" role="alert">
                                                                                                            File yang anda masukan terlalu besar, Max Ukuran 1MB.
                                                                                                            </div>';
                                                        } elseif ($_GET['p'] == 'ekstensitidaksesuai') {
                                                            echo '
                                                                                                            <div class="alert alert-danger text-center" role="alert">
                                                                                                            File yang bisa dimasukan hanya JPG, JPEG, dan PNG.
                                                                                                            </div>';
                                                        }
                                                    }
                                                    ?>
                                                    <!-- Tabel history absen -->
                                                    <div class="history">
                                                        <table class="table table-striped display" id="rekap"
                                                            data-page-length='10'>
                                                            <thead>
                                                                <tr>
                                                                    <th>Tanggal</th>
                                                                    <th>Shift</th>
                                                                    <th>Sebagai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $history = mysqli_query($conn, "SELECT * FROM log where id_pengguna = '$_SESSION[id]' order by waktu DESC");
                                                                $p = 0;
                                                                while ($row = mysqli_fetch_array($history)) {
                                                                    $p++;
                                                                    echo '
                                                                                                
                                                                                                                                <tr>
                                                                                                                                    <td>' .
                                                                        $row['waktu'] .
                                                                        '</td>
                                                                                                                                    <td>' .
                                                                        $row['shift'] .
                                                                        '</td>
                                                                                                                                    <td>' .
                                                                        $row['status'] .
                                                                        '</td>
                                                                                                                                </tr>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $('#rekap').DataTable(

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
                            <!-- End Absen -->
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
</body>
<footer>
    <div class="container-fluid text-center"></div>
</footer>

</html>
<?php }elseif(!isset($_SESSION[ 'username'])){ header( "location:index.php?notif=belum login"); } ?>