<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<?php
    if(isset($_SESSION['username'])){
        if($_SESSION['username'] == $_SESSION['password']){
?>
<!-- Modal Force Change Password-->
<div class="modal fade force-cp" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Password Anda</h5>
            </div>
            <form method="post" action="proses.php?type=cp">
                <div class="modal-body">

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password" minlength="8" Required>
                        <label for="floatingPassword">Password Baru</label>
                    </div>
                    <h7>- Password Minimal 8 angka.</h7><br>
                    <h7>- Password tidak boleh sama dengan Username.</h7><br>
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
    window.onload = function() {
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
                    <input type="text" class="form-control mb-2" id="del_id" name="id" Required hidden>
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
    $(document).ready(function() {
        $('.akundel').on('click', function() {
            $('#modaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#del_id').val(data[1]);
            $('.formdel').attr("action", "proses.php?type=d_user");
            // Print
            var text = document.getElementById("text");
            text.innerHTML = "<h5>Apakah anda yakin ingin menghapus akun <b>" + data[3] +
                "</b> dengan Username <b>" + data[2] + "</b> ?</h5>";
        });
        $('.katdel').on('click', function() {
            $('#modaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#del_id').val(data[1]);
            $('.formdel').attr("action", "proses.php?type=d_kategori");
            // Print
            var text = document.getElementById("text");
            text.innerHTML = "<h5>Apakah anda yakin ingin menghapus kategori <b>" + data[2] +
                "</b> dengan ID <b>" + data[1] + "</b> ?</h5>";
        });
        $('.logdel').on('click', function() {
            $('#modaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#del_id').val(data[1]);
            $('.formdel').attr("action", "proses.php?type=d_log");
            // Print
            var text = document.getElementById("text");
            text.innerHTML = "<h5>Apakah anda yakin ingin menghapus log </b> dengan ID <b>" + data[1] +
                "</b> yang dilakukan oleh <b>" + data[3] + "</b> pada tanggal <b>" + data[0] +
                "</b> ?</h5>";
        });
        $('.deljad').on('click', function() {
            $('#modaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#del_id').val(data[0]);
            $('.formdel').attr("action", "proses.php?type=d_jad");
            // Print
            var text = document.getElementById("text");
            text.innerHTML = "<h5>Apakah anda yakin ingin menghapus tabel jadwal <b>" + data[1] +
                "</b> ?</h5>";
        });
    });
</script>

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
                        <input type="text" class="form-control mb-2" id="update_user" name="id" Required hidden>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="username" placeholder="Username" name="username"
                            Required>
                        <label for="floatingInput">username</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="nama" placeholder="Nama" name="nama"
                            Required>
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="mb-4 mt-2 form-floating">
                        <select class="form-select status" aria-label="Default select example" id="status"
                            placeholder="Status" name="status" Required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value='admin'>Admin</option>
                            <option value='dokter'>Dokter</option>
                            <option value='perawat'>Perawat</option>
                        </select>
                        <label for="floatingShift">Status</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control mb-2" id="password"
                            placeholder="(Isi Jika Ingin Ubah Password)" name="pw">
                        <label for="floatingInput">(Isi Jika Ingin Merubah Password)</label>
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
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            
            $('#modaledit').modal('show');
            
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            
            $('#update_user').val(data[1]);
            $('#username').val(data[2]);
            $('#nama').val(data[3]);
            $('#status').val(data[4]);
        });
    });
</script>
<!-- end modal edit -->

<!-- Modal Tambah data absensi-->
<div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <select class="form-select" aria-label="Default select example" id="floatingShift"
                            placeholder="Shift" name="shift" Requiredd>
                            <option value="" selected disabled>Pilih Jadwal Shift</option>
                            <option value='1'>Pagi : 1</option>
                            <option value='2'>Sore : 2</option>
                        </select>
                        <label for="floatingShift">Shift</label>
                    </div>
                    <button class="mb-4 w-100 btn btn-lg btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
