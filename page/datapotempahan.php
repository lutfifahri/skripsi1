<?php
include '../koneksi.php';

$a  =   mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Kode='$_GET[KodePelanggan]' "));

$b  = array(
    'Nama'   => $a['Nama'],
    'Alamat' => $a['Alamat'],
);

echo json_encode($b);
