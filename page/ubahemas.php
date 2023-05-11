<?php

include '../koneksi.php';

$harga = $_POST['harga'];

$update = mysqli_query($koneksi, "UPDATE `hem` SET Tipe = 'Z' ");

$insert = mysqli_query($koneksi, "INSERT INTO `hem` (`id`,`harga`,`Tipe`) VALUES ('', '$harga', '')");

header("location:formubahemas.php");
