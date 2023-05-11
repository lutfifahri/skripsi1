<?php
include "../koneksi.php";
session_start();

switch ($_GET['action']) {
    case 'save':
        $Kode       = $_POST['Kode'];
        $Nama       = $_POST['Nama'];
        $Alamat     = $_POST['Alamat'];
        $Telp       = $_POST['Telp'];
        $Tanggal    = $_POST['Tanggal'];
        $Keterangan = $_POST['Keterangan'];
        $User       = $_SESSION['SES_ADM'];

        $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM pelanggan WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
        if ($cekkode > 0) {
            echo 1;       # MAAF JIKA KODE ADA YANG SAMA TIDAK BISA TERSIMPAN 
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO pelanggan (`id`, `Kode`, `Nama`, `Alamat`, `Telp`, `Tanggal`, `Keterangan`, `Tipe`, `User`) VALUES ('','$Kode','$Nama', '$Alamat', '$Telp', '$Tanggal', '$Keterangan', '', '$User' )");
        }
        break;


    case 'edit':
        $id         = $_POST['id'];
        $Nama       = $_POST['Nama'];
        $Alamat     = $_POST['Alamat'];
        $Telp       = $_POST['Telp'];
        $Keterangan = $_POST['Keterangan'];
        $User       = $_SESSION['SES_ADM'];

        # update
        $query = mysqli_query($koneksi, "UPDATE pelanggan SET Nama='$Nama', Nama='$Nama', Alamat='$Alamat', Telp='$Telp', Keterangan = '$Keterangan', User='$User' WHERE id='$id'");

        break;

    case 'delete':
        $id = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE pelanggan SET  Tipe = 'Z' WHERE  id='$id'");

        echo 'success';
        break;
}
