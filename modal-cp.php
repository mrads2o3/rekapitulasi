
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<?php
    if(isset($_SESSION['npm'])){
        if($_SESSION['npm'] == $_SESSION['password']){
?>
<!-- Modal Force Change Password-->
<div class="modal fade force-cp" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Password Anda</h5>
            </div>
            <form method="post" action="proses.php?type=cp">
                <div class="modal-body">

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"  minlength="8" require>
                        <label for="floatingPassword" >Password Baru</label>
                    </div>
                <h7>- Password Minimal 8 angka.</h7><br>
                <h7>- Password tidak boleh sama dengan NPM.</h7><br>
                <h7>- Password <strong>tidak Case Sensitive</strong>.</h7>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
            </form>
        </div>
</div>
<script>
    window.onload = function (){
        $('.force-cp').modal('show');
    }
</script>
<?php 
        }
    }
?>
<!-- Modal Konfirm Del -->
<div class="modal fade" id="modaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="text"></div>
            <form method="post" class="formdel">
                    <input type="text" class="form-control mb-2" id="del_id" name="id" require hidden>
            </div>
            <div class="modal-footer">
                <p class="text-danger">PERHATIAN! <br>SEMUA PERUBAHAN YANG DILAKUKAN TIDAK BISA DIBATALKAN.</p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </div>
            </form>
        </div>
</div>
        <script>
        $(document).ready(function () {
            $('.akundel').on('click', function(){
                $('#modaldel').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#del_id').val(data[1]);
                $('.formdel').attr("action", "proses.php?type=d_user");
                // Print
                var text = document.getElementById("text");
                text.innerHTML = "<h5>Apakah anda yakin ingin menghapus akun <b>"+data[2]+"</b> dengan NPM <b>"+data[1]+"</b> ?</h5>";
            });
            $('.katdel').on('click', function(){
                $('#modaldel').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#del_id').val(data[1]);
                $('.formdel').attr("action", "proses.php?type=d_kategori");
                // Print
                var text = document.getElementById("text");
                text.innerHTML = "<h5>Apakah anda yakin ingin menghapus kategori <b>"+data[2]+"</b> dengan ID <b>"+data[1]+"</b> ?</h5>";
            });
            $('.logdel').on('click', function(){
                $('#modaldel').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#del_id').val(data[1]);
                $('.formdel').attr("action", "proses.php?type=d_log");
                // Print
                var text = document.getElementById("text");
                text.innerHTML = "<h5>Apakah anda yakin ingin menghapus log </b> dengan ID <b>"+data[1]+"</b> yang dilakukan oleh <b>"+data[3]+"</b> pada tanggal <b>"+data[0]+"</b> ?</h5>";
            });
            $('.deljad').on('click', function(){
                $('#modaldel').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#del_id').val(data[0]);
                $('.formdel').attr("action", "proses.php?type=d_jad");
                // Print
                var text = document.getElementById("text");
                text.innerHTML = "<h5>Apakah anda yakin ingin menghapus tabel jadwal <b>"+data[1]+"</b> ?</h5>";
            });
        });
        </script>
<!-- modal tambah jadwal -->
<div class="modal fade text-center" id="uploadjadwal" tabindex="-1" aria-labelledby="jadwalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="jadwalLabel">Upload Jadwal</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			    <form method="post" action="proses.php?type=tj" enctype="multipart/form-data">
					<div class="form-floating">
					    <input type="text" class="form-control mb-2" id="update_id" name="id" require hidden>
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Masukan Jadwal</label>
						<input class="form-control" type="file" id="formFile" name="file">
					</div>
                    <p class="text-danger">*Max ukuran file : 5MB</p>
					<div class="">
					    <input type="submit" class="btn btn-primary" name="bupload" value="Upload">
					</div>
				</form>
				<script>
					$(document).ready(function () {
                        $('.upload').on('click', function(){
                        $('#uploadjadwal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function(){
                            return $(this).text();
                        }).get();

                        console.log(data);

                            $('#update_id').val(data[0]);
                        });
					});
			    </script>
			</div>
		</div>
	</div>
</div>

<!-- modal lihat jadwal-->
<div class="modal fade text-center" id="showjadwal" tabindex="-1" aria-labelledby="lihatjLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="lihatjLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
	    <div class="modal-body">
			<img class="imgjadwal img-fluid"></img>
		</div>
	</div>
	</div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="proses.php?type=update">

                <div class="form-floating">
                    <input type="text" class="form-control mb-2" id="update_user" name="id" require hidden>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control mb-2" id="npm" placeholder="NPM" name="npm" require>
                    <label for="floatingInput" >NPM</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control mb-2" id="nama" placeholder="Nama" name="nama" require>
                    <label for="floatingInput" >Nama</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control mb-2" id="kelas" placeholder="Kelas" name="kelas" require>
                    <label for="floatingInput" >Kelas</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control mb-2" id="norek" placeholder="Nomor Rekening" name="norek" require>
                    <label for="floatingInput" >Nomor Rekening</label>
                </div>
                <div class="mb-4 mt-2 form-floating">
                    <select class="form-select status" aria-label="Default select example" id="floatingShift" placeholder="Status" name="status" require>
                        <option selected>- Pilihan -</option>
                        <option value='asisten'>Asisten</option>
                        <option value='programmer'>Programmer</option>
                        <option value='admin'>Admin</option>
                    </select>
                    <label for="floatingShift" >Status</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mb-2" id="password" placeholder="(Isi Jika Ingin Ubah Password)" name="pw">
                    <label for="floatingInput" >(Isi Jika Ingin Merubah Password)</label>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </div>
            </form>
        </div>
</div>
<script>
        $(document).ready(function () {
            $('.editbtn').on('click', function(){
                $('#modaledit').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_user').val(data[1]);
                $('#npm').val(data[1]);
                $('#nama').val(data[2]);
                $('#kelas').val(data[3]);
                $('#norek').val(data[4]);
                $('.status').val(data[5]);
            });
        });
</script>
<!-- end modal edit -->
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

                                                                                    '; } 

                                                                                ?>
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