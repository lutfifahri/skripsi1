<?php
include "../koneksi.php";
session_start();

switch ($_GET['action']) {
    case 'save':
        $Kode           = $_POST['Kode'];
        $Nama           = $_POST['Nama'];
        $Grup           = $_POST['Grup'];
        $Satuan1        = $_POST['Satuan1'];
        $Satuan2        = $_POST['Satuan2'];
        $Harga1         = $_POST['Harga1'];
        $Harga2         = $_POST['Harga2'];
        $Skala1         = $_POST['Skala1'];
        $Skala2         = $_POST['Skala2'];
        $Stok           = $_POST['Stok'];
        $Status         = $_POST['Status'];
        $Jenis          = $_POST['Jenis'];
        $Keterangan     = $_POST['Keterangan'];
        $gambar_file    = $_FILES['file']['name']; // di ganti menjadi variable nama baru ( $nama_baru )

        $tanggal        = date('Y-m-d');
        $User           = $_SESSION['SES_ADM'];

        if ($gambar_file != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $x              = explode('.', $gambar_file);
            $ekstensi       = strtolower(end($x));
            $file_tmp       = $_FILES['file']['tmp_name'];
            $angka_acak     = rand(1, 999);
            $nama_baru      = $angka_acak . '-' . $gambar_file;
            if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                move_uploaded_file($file_tmp, 'img/' . $nama_baru);

                $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM barang WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
                if ($cekkode > 0) {
                    echo 2;
                } else {
                    # insert nya
                    $sql1 = mysqli_query($koneksi, "INSERT INTO barang (`id`, `Kode`, `Nama`, `Grup`, `Satuan1`, `Satuan2`, `Harga1`, `Harga2`, `Skala1`, `Skala2`, `Stok`, `Status`, `Jenis`, `Tanggal`, `Keterangan`, `User`, `file`, `created_at`, `updated_at`, `Tipe`, `Tutup`) VALUES (NULL, '$Kode', '$Nama', '$Grup', '$Satuan1', '$Satuan2', '$Harga1', '$Harga2', '$Skala1', '$Skala2', '$Stok', '$Status', '$Jenis', '$tanggal', '$Keterangan', '$User', '$nama_baru', '$tanggal', '', '', '')");
                }
            } else {
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo 1;  # jika extension gambar tidak sesuai
            }
        } else {
            $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM barang WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
            if ($cekkode > 0) {
                echo 2;
            } else {
                # insert nya
                $sql1 = mysqli_query($koneksi, "INSERT INTO barang (`id`, `Kode`, `Nama`, `Grup`, `Satuan1`, `Satuan2`, `Harga1`, `Harga2`, `Skala1`, `Skala2`, `Stok`, `Status`, `Jenis`, `Tanggal`, `Keterangan`, `User`, `file`, `created_at`, `updated_at`, `Tipe`, `Tutup`) VALUES (NULL, '$Kode', '$Nama', '$Grup', '$Satuan1', '$Satuan2', '$Harga1', '$Harga2', '$Skala1', '$Skala2', '$Stok', '$Status', '$Jenis', '$tanggal', '$Keterangan', '$User', '', '$tanggal', '', '', '')");
            }
        }
        break;


    case 'edit':

        $id         = $_POST['id'];
        $Kode       = $_POST['Kode'];
        $Nama       = $_POST['Nama'];
        $Keterangan = $_POST['Keterangan'];
        $created_at = $_POST['created_at'];
        $tanggal = date('Y-m-d');
        $User       = $_SESSION['SES_ADM'];

        # update
        $query = mysqli_query($koneksi, "UPDATE grup SET Kode='$Kode', Nama='$Nama', Keterangan='$Keterangan', created_at='$created_at', updated_at='$tanggal', User='$User' WHERE id='$id'");

        break;

    case 'delete':
        $id = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE grup SET  Tipe = 'Z' WHERE  id='$id'");

        echo 'success';

        // $cekData = mysqli_query($koneksi, "SELECT * FROM grup WHERE id = '$id' AND Tipe!='Z' ");
        // $cekData2 = mysqli_fetch_array($cekData);
        // $a = $cekData2['Kode'];

        // $cekData3 = mysqli_query($koneksi, "SELECT count(*) as banyak FROM barang WHERE Group1 = '$a' AND Tipe!='Z' ");
        // $cek12 = mysqli_fetch_array($cekData3);

        // if ($cek12['banyak'] > 0) {
        //     echo 1;         // MAAF JIKA KODE grup TERSIMPAN DI FORM BARANG TIDAK DAPAT DI HAPUS
        // } else {
        //     $query = mysqli_query($koneksi, "UPDATE grup SET  Tipe = 'Z' WHERE  id='$id'");
        // }
        break;
}
