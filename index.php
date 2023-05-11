<?php
# untuk koneksi kan ke database
include 'koneksi.php';

# untuk menambah table user secara otomatis dengan sekali reload
$sql1 = 'CREATE TABLE user ( ' .
    'iduser int NOT NULL AUTO_INCREMENT, ' .
    'Kode char(60) NOT NULL, ' .
    'Nama char(60) NOT NULL, ' .
    'Alamat char(60) NOT NULL, ' .
    'Status char(60) NOT NULL, ' .
    'Username char(60) NOT NULL, ' .
    'password char(50) NOT NULL, ' .
    'Level char(50) NOT NULL, ' .
    'User char(50) NOT NULL, ' .
    'Tipe char(1) NOT NULL, ' .
    'primary key ( iduser ))';
$buattabel1 = mysqli_query($koneksi, $sql1);

# membuat insert  user secara default 
$cek = mysqli_query($koneksi, "SELECT count(*) as total FROM user WHERE Username ='ADU' ");

# $cek = mysqli_query($koneksi, "SELECT  * FROM user WHERE Username!='ADU' ");
$ceks = mysqli_fetch_array($cek);
if ($ceks['total'] > 0) {
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO `user` (`iduser` ,`Kode`, `Nama`, `Alamat`, `Status`, `Username`, `password`, `Level`, `User`, `Tipe`) VALUES  ('', 'USR001', 'ADU', 'Jl.Medan', '1', 'ADU','cf79ae6addba60ad018347359bd144d2','1','', '')");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Victoeria Vici</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link href="logosistem.png" rel="icon">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="data/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- <style>
        body {
            background: url(ini_vici.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /*memberi style pada class panel default*/
        .panel-default {
            opacity: 0.9;
            margin-top: 180px;
        }

        .form-group.last {
            margin-bottom: 0px;
        }
    </style> -->
</head>

<body>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center" style="margin-top: 15px">
                            <img src="vincy123.jpg" alt="" width="200" height="200">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="Username" placeholder="Masukkan Username" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" class="form-control" id="Password" placeholder="Masukkan Password" autocomplete="off">
                        </div>

                        <button class="btn btn-login btn-block btn-primary">LOGIN</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- ini untuk sweeat alert nya  -->
    <script src="data/jquery.min.js"></script>
    <script src="data/bootstrap.min.js"></script>
    <script src="data/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".btn-login").click(function() {

                var Username = $("#Username").val();
                var Password = $("#Password").val();
                if (Username.length == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    Toast.fire({
                        type: 'warning',
                        title: 'Maaf Username Wajib diisi !',
                    })
                    return false;

                } else if (Password.length == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    Toast.fire({
                        type: 'warning',
                        title: 'Password Username Wajib diisi !',
                    })
                    return false;
                } else {
                    $.ajax({

                        url: "cek_login.php",
                        type: "POST",
                        data: {
                            "Username": Username,
                            "Password": Password
                        },

                        success: function(response) {
                            if (response == "success") {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                Toast.fire({
                                        type: 'success',
                                        title: 'Login Berhasil!',
                                    })
                                    .then(function() {
                                        window.location.href = "page/dashboard";
                                    });
                            } else {

                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: 'Login Gagal !',
                                })
                                return false;

                            }

                            console.log(response);

                        },

                        error: function(response) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            Toast.fire({
                                type: 'error',
                                title: 'Server Salah !',
                            })
                            return false;

                            console.log(response);

                        }

                    });

                }

            });

        });
    </script>

</body>

</html>