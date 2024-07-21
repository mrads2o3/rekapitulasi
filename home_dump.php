<?php include 'koneksi.php'; include 'login.php'; include 'modal-cp.php'; if(isset($_SESSION[ 'npm'])){ ?>
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
	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
	<title>Rekapitulasi Asisten Labamen</title>
</head>

<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Halaman Utama</a>
					</li>
					<?php if($_SESSION[ 'status']=='admin' ){ echo '
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="admin.php">Admin</a>
                    </li>'; }?>
					<li class="nav-item"> <a class="nav-link " aria-current="page" href="tutorial.php">Cara Absen</a>
					</li>
					<li class="nav-item"> <a class="nav-link " aria-current="page" href="https://ak-menengah.com/">Web Labamen</a>
					</li>
					<li class="nav-item"> <a class="nav-link " aria-current="page" href="https://praktikum.ak-menengah.com/">Web Praktikum Labamen</a>
					</li>
				</ul> <span class="navbar-text text-center">
                Laboratorium Akuntansi Menengah <br>
                Universitas Gunadarma
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
									<h5 class="card-title"><?php echo $_SESSION['nama'];?></h5>
								</div>
								<table class="table align-middle">
									<tr>
										<td>NPM</td>
										<td>
											<?php echo $_SESSION[ 'npm'];?>
										</td>
									</tr>
									<tr>
										<td>Kelas</td>
										<td>
											<?php echo $_SESSION[ 'kelas'];?>
										</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>
											<?php echo $_SESSION[ 'status'];?>
										</td>
									</tr>
									<tr>
										<td>Norek</td>
										<td>
											<?php echo $_SESSION[ 'norek'];?>
										</td>
									</tr>
								</table>
								<div class="row">
									<div class="col">
										<a href="jadwal.php">
											<button class="w-100 btn btn-outline-primary" type="button">Jadwal</button>
										</a>
									</div>
									<div class="col">
										<a href="logout.php">
											<button class="w-100 btn btn-outline-danger" type="button">Keluar</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="table">
							<div class="row">
								<div class="col">
									<div class="container-fluid">
										<div class="bg-dark p-3 rounded text-center text-light"> <b><h1>Sejarah Absen</h1></b>
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
												<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Absensi</button>
											</div>
											<?php if(isset($_GET[ 'p'])){ if($_GET[ 'p']=='berhasil' ){ echo '
                                                <div class="alert alert-success text-center" role="alert">
                                                Selamat! Aksi anda berhasil disimpan.
                                                </div>'; }elseif($_GET[ 'p']=='gagal' ){ echo '
                                                <div class="alert alert-danger text-center" role="alert">
                                                Maaf! Aksi anda gagal disimpan.<br>
                                                Silahkan hubungi administrator.
                                                </div>'; }elseif($_GET[ 'p']=='already' ){ echo '
                                                <div class="alert alert-warning text-center" role="alert">
                                                Absen tidak bisa duplikat!!!<br>
                                                <b>Pertemuan</b> dan <b>Shift</b> sudah ada didalam database.
                                                </div>'; } } 
                                            ?>
											<!-- Tabel history absen -->
											<div class="history">
												<table class="table table-striped display" id="rekap" data-page-length='10'>
													<thead>
														<tr>
															<th>Tanggal</th>
															<th>Kategori</th>
															<th>Pertemuan</th>
															<th>Shift</th>
															<th>Sebagai</th>
														</tr>
													</thead>
													<tbody>
														<?php $history=mysqli_query($conn, "SELECT * FROM log inner join kategori on npm = '$_SESSION[npm]' and kategori.id_kategori = log.id_kategori order by waktu DESC"); $p=0 ; while($row=mysqli_fetch_array($history)){ $p++; echo '
                                
                                                        <tr>
                                                            <td>' .$row[ 'waktu']. '</td>
                                                            <td>' .$row[ 'kategori']. '</td>
                                                            <td>' .$row[ 'pertemuan']. '</td>
                                                            <td>' .$row[ 'shift']. '</td>
                                                            <td>' .$row[ 'sebagai']. '</td>
                                                        </tr>'; } ?>
													</tbody>
												</table>
												<script>
													$(document).ready( function () {
													    $('#rekap').DataTable(
													                                    
													    );
													} );
												</script>
											</div>
											<!-- Modal Tambah data absensi-->
											<div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Tambah Data Absensi</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form method="post" action="proses.php?type=td">
																<img class="mb-4" src="img/logo.png" width="150" height="150">
																<div class="mb-4 form-floating">
																	<select class="form-select" aria-label="Default select example" id="floatingKategori" placeholder="Kategori" name="kategori" require>
																		<option disabled selected>- Pilihan -</option>
																		<?php $kategori=mysqli_query($conn, "SELECT * FROM kategori"); while($row=mysqli_fetch_array($kategori)){ echo '
                                                
                                                                            <option value="'.$row[ 'id_kategori']. '">'.$row[ 'kategori']. '</option>

                                                                        '; } ?>
																	</select>
																	<label for="floatingKategori">Kategori</label>
																</div>
																<div class="mb-4 form-floating">
																	<select class="form-select" aria-label="Default select example" id="floatingPert" placeholder="Pertemuan" name="pertemuan" require>
																		<option disabled selected>- Pilihan -</option>
																		<option value='1'>1</option>
																		<option value='2'>2</option>
																		<option value='3'>3</option>
																		<option value='4'>4</option>
																		<option value='5'>5</option>
																		<option value='6'>6</option>
																		<option value='7'>7</option>
																		<option value='8'>8</option>
																		<option value='9'>9</option>
																		<option value='10'>10</option>
																	</select>
																	<label for="floatingPert">Pertemuan</label>
																</div>
																<div class="mb-4 form-floating">
																	<select class="form-select" aria-label="Default select example" id="floatingShift" placeholder="Shift" name="shift" require>
																		<option disabled selected>- Pilihan -</option>
																		<option value='1'>1</option>
																		<option value='2'>2</option>
																		<option value='3'>3</option>
																		<option value='4'>4</option>
																		<option value='5'>5</option>
																		<option value='6'>6</option>
																		<option value='7'>7</option>
																		<option value='8'>8</option>
																		<option value='9'>9</option>
																		<option value='10'>10</option>
																	</select>
																	<label for="floatingShift">Shift</label>
																</div>
																<button class="mb-4 w-100 btn btn-lg btn-primary" type="submit">Tambah</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- end modal -->
										<!-- more -->
										<div class="modal fade" id="more" aria-hidden="true">
											<div class="modal-dialog modal-dialog-scrollable modal-xl">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="history">
															<table class="table table-striped text-center">
																<tr>
																	<th>Tanggal</th>
																	<th>Kategori</th>
																	<th>Pertemuan</th>
																	<th>Shift</th>
																	<th>Sebagai</th>
																</tr>
																<?php $history=mysqli_query($conn, "SELECT * FROM log inner join kategori on npm = '$_SESSION[npm]' and kategori.id_kategori = log.id_kategori order by waktu DESC"); while($row=mysqli_fetch_array($history)){ echo '
                                
                                                                    <tr>
                                                                        <td>' .$row[ 'waktu']. '</td>
                                                                        <td>' .$row[ 'kategori']. '</td>
                                                                        <td>' .$row[ 'pertemuan']. '</td>
                                                                        <td>' .$row[ 'shift']. '</td>
                                                                        <td>' .$row[ 'sebagai']. '</td>
                                                                    </tr>'; } if($p==0 ){ echo '
                                                                    <tr>
                                                                    <td colspan="5" >Tidak ada data</td>
                                                                    </tr>
                                                                ' ; } ?>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- end more -->
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
<footer>
	<div class="container-fluid text-center"></div>
</footer>

</html>
<?php }elseif(!isset($_SESSION[ 'npm'])){ header( "location:index.php?notif=belum login"); } ?>