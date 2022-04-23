<?php include 'model/koneksi.php';
session_start();

if (!empty($_SESSION['admin'])) {
    echo"<script>                             
    window.location='index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'component/head.php' ?>
</head>

<body class="hold-transition login-page">


    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Berita Mediatama</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Selama Datang</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>

                <?php

                    if(isset($_POST['login'])){
                        $username = $_POST['username'];
                        $password = $_POST['pass'];
                        var_dump($password);
                        
                        $cek = $koneksi->query("SELECT * FROM tbl_admin WHERE admin_username = '$username' AND admin_password = '$password' ")->fetch_assoc();

                        if ($cek == True) {
                            $_SESSION['admin'] = $cek;
                            echo"<script>
                                alert('Login berhasil');
                                window.location='index.php';
                            </script>";
                        }else{
                            echo"<script>
                            alert('Login Gagal');
                            window.location='login.php';
                            </script>";
                        }

                    }

                ?>


            </div>

        </div>
    </div>


    <?php include 'component/script.php' ?>
</body>

</html>