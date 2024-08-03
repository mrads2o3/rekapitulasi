<?php 

    include 'login.php';

    if(!isset($_SESSION['username'])){

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Masuk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <img class="mb-4 text-center" src="img/logo.jpg" width="200" height="100">
        <form method="post" action="login.php">
            <?php
            
            if (isset($_GET['notif']) && $_GET['notif'] == 'gagal') {
                echo '
                      <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Gagal Login !</h4>
                        Pastikan Username dan Password sudah sesuai !
                      </div>';
            }
            if (isset($_GET['p'])) {
                if ($_GET['p'] == 'berhasil') {
                    echo '
                            <div class="alert alert-success" role="alert">
                            Anda berhasil logout.
                            </div>';
                } elseif ($_GET['p'] == 'berhasilcp') {
                    echo '
                            <div class="alert alert-success" role="alert">
                            Anda berhasil merubah password. <br>
                            Silahkan login kembali dengan password baru.
                            </div>';
                }
            }
            ?>
            <h1 class="h3 mb-3 fw-normal">Masuk</h1>

            <div class="form-floating">
                <input type="text" class="form-control mb-2" id="floatingInput" placeholder="username"
                    name="username" require>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password"require>
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </form>
    </main>
</body>

</html>
<?php 
    }elseif(isset($_SESSION['username'])){

      header("location:home.php");

    }
?>
