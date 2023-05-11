<?php
# Koneksi Ke Database
include "../koneksi.php";
session_start();

switch ($_GET['action']) {
    case 'save':
        $Kode                           = $_POST['Kode'];
        $gambar_file                    = $_FILES['Foto']['name']; // di ganti menjadi variable nama baru ( $nama_baru )
        $KodePelanggan                  = $_POST['KodePelanggan'];
        $NamaSales                      = $_POST['NamaSales'];
        $TanggalTerima                  = $_POST['TanggalTerima'];
        $TanggalEstimasiPenyelesaian    = $_POST['TanggalEstimasiPenyelesaian'];
        $KodeProduk                     = $_POST['KodeProduk'];
        $JenisProduksi                  = $_POST['JenisProduksi'];
        $JenisPelanggan                 = $_POST['JenisPelanggan'];
        $Bahan                          = $_POST['Bahan'];
        $KadarLokal                     = $_POST['KadarLokal'];
        $Kuantitas                      = $_POST['Kuantitas'];
        $Ukuran                         = $_POST['Ukuran'];
        $EstimasiBerat                  = $_POST['EstimasiBerat'];
        $RangeBeratEstimasi             = $_POST['RangeBeratEstimasi'];
        $Susut                          = $_POST['Susut'];
        $DatangEmas                     = $_POST['DatangEmas'];
        $KadarDatangEmas                = $_POST['KadarDatangEmas'];
        $DatangBerlian                  = $_POST['DatangBerlian'];
        $BeratDatangBerlian             = $_POST['BeratDatangBerlian'];
        $UpahPasangBerlian              = $_POST['UpahPasangBerlian'];
        $NamaBatuPermata                = $_POST['NamaBatuPermata'];
        $BeratBatuPermata               = $_POST['BeratBatuPermata'];
        $TipeIkatan                     = $_POST['TipeIkatan'];
        $Metode                         = $_POST['Metode'];
        $TipePelanggan                  = $_POST['TipePelanggan'];
        $Keterangan                     = $_POST['Keterangan'];
        $KrumWarna                      = $_POST['KrumWarna'];
        $KeteranganKrum                 = $_POST['KeteranganKrum'];
        $HargaKrum                      = $_POST['HargaKrum'];
        $Upah                           = $_POST['Upah'];
        $Budget                         = $_POST['Budget'];
        $Panjar                         = $_POST['Panjar'];
        $User                           = $_SESSION['SES_ADM'];
        $Tanggal                        = date('Y-m-d');

        if ($gambar_file != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $x              = explode('.', $gambar_file);
            $ekstensi       = strtolower(end($x));
            $file_tmp       = $_FILES['Foto']['tmp_name'];
            $angka_acak     = rand(1, 999);
            $nama_baru      = $angka_acak . '-' . $gambar_file;
            if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                move_uploaded_file($file_tmp, 'img/' . $nama_baru);

                $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT `Kode` FROM `poproduksi` WHERE Kode='$_POST[Kode]' AND Tipe!='Z' "));
                if ($cekkode > 0) {
                    echo 2;   # ini untuk pemberitahuan bahwa kode tidak boleh sama
                } else {
                    # ini untuk insertnya
                    $query = mysqli_query($koneksi, "INSERT INTO `poproduksi`(`id`, `Kode`, `KodePelanggan`, `NamaSales`, `TanggalTerima`, `TanggalEstimasiPenyelesaian`, `KodeProduk`, `JenisProduksi`, `JenisPelanggan`, `Bahan`, `KadarLokal`, `Kuantitas`, `Ukuran`, `EstimasiBerat`, `RangeBeratEstimasi`, `Susut`, `DatangEmas`, `KadarDatangEmas`, `DatangBerlian`, `BeratDatangBerlian`, `UpahPasangBerlian`, `NamaBatuPermata`, `BeratBatuPermata`, `TipeIkatan`, `Metode`, `TipePelanggan`, `Keterangan`, `Foto`, `KrumWarna`, `KeteranganKrum`, `HargaKrum`, `Upah`, `Budget`, `Panjar`, `Tipe`, `Tanggal`, `User`) VALUES ('','$Kode','$KodePelanggan','$NamaSales','$TanggalTerima','$TanggalEstimasiPenyelesaian','$KodeProduk','$JenisProduksi','$JenisPelanggan','$Bahan','$KadarLokal','$Kuantitas','$Ukuran','$EstimasiBerat','$RangeBeratEstimasi','$Susut','$DatangEmas','$KadarDatangEmas','$DatangBerlian','$BeratDatangBerlian','$UpahPasangBerlian','$NamaBatuPermata','$BeratBatuPermata','$TipeIkatan','$Metode','$TipePelanggan','$Keterangan','$nama_baru','$KrumWarna','$KeteranganKrum','$HargaKrum','$Upah','$Budget','$Panjar', '', '$Tanggal' ,'$User')");
                }
            } else {
                echo 1; # ini jika ekstension gambar tidak sesuai
            }
        } else {
            $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM poproduksi WHERE Kode='$_POST[Kode]' AND Tipe!='Z' "));
            if ($cekkode > 0) {
                echo 2; # ini jika kode ada yang sama tidak bisa disimpan
            } else {
                # ini untuk insertnya
                $query = mysqli_query($koneksi, "INSERT INTO `poproduksi`(`id`, `Kode`, `KodePelanggan`, `NamaSales`, `TanggalTerima`, `TanggalEstimasiPenyelesaian`, `KodeProduk`, `JenisProduksi`, `JenisPelanggan`, `Bahan`, `KadarLokal`, `Kuantitas`, `Ukuran`, `EstimasiBerat`, `RangeBeratEstimasi`, `Susut`, `DatangEmas`, `KadarDatangEmas`, `DatangBerlian`, `BeratDatangBerlian`, `UpahPasangBerlian`, `NamaBatuPermata`, `BeratBatuPermata`, `TipeIkatan`, `Metode`, `TipePelanggan`, `Keterangan`, `Foto`, `KrumWarna`, `KeteranganKrum`, `HargaKrum`, `Upah`, `Budget`, `Panjar`, `Tipe`, `Tanggal`, `User`) VALUES ('','$Kode','$KodePelanggan','$NamaSales','$TanggalTerima','$TanggalEstimasiPenyelesaian','$KodeProduk','$JenisProduksi','$JenisPelanggan','$Bahan','$KadarLokal','$Kuantitas','$Ukuran','$EstimasiBerat','$RangeBeratEstimasi','$Susut','$DatangEmas','$KadarDatangEmas','$DatangBerlian','$BeratDatangBerlian','$UpahPasangBerlian','$NamaBatuPermata','$BeratBatuPermata','$TipeIkatan','$Metode','$TipePelanggan','$Keterangan','','$KrumWarna','$KeteranganKrum','$HargaKrum','$Upah','$Budget','$Panjar', '', '$Tanggal', '$User')");
            }
        }

        break;

    case 'edit':
        $id                             = $_POST['id'];
        $gambar_file                    = $_FILES['Foto']['name']; // di ganti menjadi variable nama baru ( $nama_baru )
        $KodePelanggan                  = $_POST['KodePelanggan'];
        $NamaSales                      = $_POST['NamaSales'];
        $TanggalTerima                  = $_POST['TanggalTerima'];
        $TanggalEstimasiPenyelesaian    = $_POST['TanggalEstimasiPenyelesaian'];
        // $KodeProduk                     = $_POST['KodeProduk'];
        $JenisProduksi                  = $_POST['JenisProduksi'];
        $JenisPelanggan                 = $_POST['JenisPelanggan'];
        $Bahan                          = $_POST['Bahan'];
        $KadarLokal                     = $_POST['KadarLokal'];
        $Kuantitas                      = $_POST['Kuantitas'];
        $Ukuran                         = $_POST['Ukuran'];
        $EstimasiBerat                  = $_POST['EstimasiBerat'];
        $RangeBeratEstimasi             = $_POST['RangeBeratEstimasi'];
        $Susut                          = $_POST['Susut'];
        $DatangEmas                     = $_POST['DatangEmas'];
        $KadarDatangEmas                = $_POST['KadarDatangEmas'];
        $DatangBerlian                  = $_POST['DatangBerlian'];
        $BeratDatangBerlian             = $_POST['BeratDatangBerlian'];
        $UpahPasangBerlian              = $_POST['UpahPasangBerlian'];
        $NamaBatuPermata                = $_POST['NamaBatuPermata'];
        $BeratBatuPermata               = $_POST['BeratBatuPermata'];
        $TipeIkatan                     = $_POST['TipeIkatan'];
        $Metode                         = $_POST['Metode'];
        $TipePelanggan                  = $_POST['TipePelanggan'];
        $Keterangan                     = $_POST['Keterangan'];
        $KrumWarna                      = $_POST['KrumWarna'];
        $KeteranganKrum                 = $_POST['KeteranganKrum'];
        $HargaKrum                      = $_POST['HargaKrum'];
        $Upah                           = $_POST['Upah'];
        $Budget                         = $_POST['Budget'];
        $Panjar                         = $_POST['Panjar'];
        $User                           = $_SESSION['SES_ADM'];

        if ($gambar_file != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $x              = explode('.', $gambar_file);
            $ekstensi       = strtolower(end($x));
            $file_tmp       = $_FILES['Foto']['tmp_name'];
            $angka_acak     = rand(1, 999);
            $nama_baru      = $angka_acak . '-' . $gambar_file;
            if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                move_uploaded_file($file_tmp, 'img/' . $nama_baru);

                $update = mysqli_query($koneksi, "UPDATE `poproduksi` SET `KodePelanggan`='$KodePelanggan', `NamaSales`='$NamaSales', `TanggalTerima`='$TanggalTerima', `TanggalEstimasiPenyelesaian`='$TanggalEstimasiPenyelesaian', `JenisProduksi`='$JenisProduksi', `JenisPelanggan`='$JenisPelanggan', `Bahan`='$Bahan', `KadarLokal`='$KadarLokal', `Kuantitas`='$Kuantitas', `Ukuran`='$Ukuran', `EstimasiBerat`='$EstimasiBerat', `RangeBeratEstimasi`='$RangeBeratEstimasi', `Susut`='$Susut', `DatangEmas`='$DatangEmas', `KadarDatangEmas`='$KadarDatangEmas', `DatangBerlian`='$DatangBerlian', `BeratDatangBerlian`='$BeratDatangBerlian', `UpahPasangBerlian`='$UpahPasangBerlian', `NamaBatuPermata`='$NamaBatuPermata', `BeratBatuPermata`='$BeratBatuPermata', `TipeIkatan`='$TipeIkatan', `Metode`='$Metode', `TipePelanggan`='$TipePelanggan', `Keterangan`='$Keterangan', `Foto`='$nama_baru', `KrumWarna`='$KrumWarna', `KeteranganKrum`='$KeteranganKrum', `HargaKrum`='$HargaKrum', `Upah`='$Upah', `Budget`='$Budget', `Panjar`='$Panjar',  `User`='$User' WHERE `id`='$id'");
            } else {
                echo 1; # ini jika ekstension gambar tidak sesuai
            }
        } else {
            # ini untuk Ubah
            $update = mysqli_query($koneksi, "UPDATE `poproduksi` SET `KodePelanggan`='$KodePelanggan', `NamaSales`='$NamaSales', `TanggalTerima`='$TanggalTerima', `TanggalEstimasiPenyelesaian`='$TanggalEstimasiPenyelesaian', `JenisProduksi`='$JenisProduksi', `JenisPelanggan`='$JenisPelanggan', `Bahan`='$Bahan', `KadarLokal`='$KadarLokal', `Kuantitas`='$Kuantitas', `Ukuran`='$Ukuran', `EstimasiBerat`='$EstimasiBerat', `RangeBeratEstimasi`='$RangeBeratEstimasi', `Susut`='$Susut', `DatangEmas`='$DatangEmas', `KadarDatangEmas`='$KadarDatangEmas', `DatangBerlian`='$DatangBerlian', `BeratDatangBerlian`='$BeratDatangBerlian', `UpahPasangBerlian`='$UpahPasangBerlian', `NamaBatuPermata`='$NamaBatuPermata', `BeratBatuPermata`='$BeratBatuPermata', `TipeIkatan`='$TipeIkatan', `Metode`='$Metode', `TipePelanggan`='$TipePelanggan', `Keterangan`='$Keterangan', `KrumWarna`='$KrumWarna', `KeteranganKrum`='$KeteranganKrum', `HargaKrum`='$HargaKrum', `Upah`='$Upah', `Budget`='$Budget', `Panjar`='$Panjar', `User`='$User' WHERE `id`='$id'");
        }

        break;

    case 'delete':
        $id = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE poproduksi SET  Tipe = 'Z' WHERE  id='$id'");

        echo 'success';
        break;
}
