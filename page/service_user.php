<?php
include "../koneksi.php";
session_start();

switch ($_GET['action']) {
    case 'save':
        $Kode       = $_POST['Kode'];
        $Nama       = $_POST['Nama'];
        $Alamat     = $_POST['Alamat'];
        $Status     = $_POST['Status'];
        $Username   = $_POST['Username'];
        $password   = md5($_POST['password']);
        $Level      = $_POST['Level'];
        $User       = $_SESSION['SES_ADM'];

        $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM `user` WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
        if ($cekkode > 0) {
            echo 1;       # MAAF JIKA KODE ADA YANG SAMA TIDAK BISA TERSIMPAN 
        } else {
            $insert = mysqli_query($koneksi, "INSERT INTO `user` (`iduser` ,`Kode`, `Nama`, `Alamat`, `Status`, `Username`, `password`, `Level`, `User`, `Tipe`) VALUES  ('', '$Kode', '$Nama', '$Alamat', '$Status','$Username','$password','$Level','$User','')");
        }
        break;


    case 'edit':

        $iduser         = $_POST['iduser'];
        $Nama           = $_POST['Nama'];
        $Alamat         = $_POST['Alamat'];
        $Status         = $_POST['Status'];
        $Username       = $_POST['Username'];
        $PasswordLama   = md5($_POST['PasswordLama']);
        $PasswordBaru   = MD5($_POST['PasswordBaru']);
        $Confirmasi     = MD5($_POST['Confirmasi']);
        $User           = $_SESSION['SES_ADM'];

        $iniuser        = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Username = '$Username' AND password = '$PasswordLama'");
        $cekuser        =   mysqli_num_rows($iniuser);

        if ($_POST['PasswordLama'] != '') {
            if ($cekuser > 0) {
                if ($PasswordBaru == $Confirmasi) {
                    $PasswordLama   = md5($_POST['PasswordLama']);
                    $PasswordBaru   = MD5($_POST['PasswordBaru']);
                    $Confirmasi     = MD5($_POST['Confirmasi']);
                    $update = mysqli_query($koneksi, "UPDATE `user` SET password = '$PasswordBaru' WHERE iduser = '$iduser'");
                } else {
                    echo 1; # Maaf  Confirmasi Password Baru Tidak Sesuai
                }
            } else {
                echo 2; # Maaf password lama tidak sesuai
            }
        }
        $update2 = mysqli_query($koneksi, "UPDATE `user` SET Nama = '$Nama', Alamat = '$Alamat', Status = '$Status', Username = '$Username', User = '$User'  WHERE iduser = '$iduser'");
        break;

    case 'delete':
        $iduser = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE `user` SET  Tipe = 'Z' WHERE  iduser='$iduser'");

        // $cekData = mysqli_query($koneksi, "SELECT * FROM grup WHERE id = '$id' AND Tipe!='Z' ");
        // $cekData2 = mysqli_fetch_array($cekData);
        // $a = $cekData2['Kode'];

        // $cekData3 = mysqli_query($koneksi, "SELECT count(*) as banyak FROM barang WHERE Grup = '$a' AND Tipe!='Z' ");
        // $cek12 = mysqli_fetch_array($cekData3);

        // if ($cek12['banyak'] > 0) {
        //     echo 1;         // MAAF JIKA KODE grup TERSIMPAN DI FORM BARANG TIDAK DAPAT DI HAPUS
        // } else {
        //     $query = mysqli_query($koneksi, "UPDATE grup SET  Tipe = 'Z' WHERE  id='$id'");
        // }
        break;
}
