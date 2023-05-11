<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PRODUKSI</title>
</head>

<body>

    <h3 align="center">LAPORAN PO PRODUKSI *<?php echo $_GET['tgl_mulai']; ?>* S/D *<?php echo $_GET['tgl_selesai']; ?>* </h3>
    <h3 align="center">KODE : <?php echo $_GET['Kode']; ?></h3>
    <hr>
    <table width="0" border="1" align="center">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nama Sales</th>
            <th>Tanggal Terima</th>
            <th>Tanggal Estimasi</th>
            <th>Jenis Produk</th>
            <th>Jenis Pelanggan</th>
            <th>Bahan</th>
            <th>Foto</th>
        </tr>
        <?php
        include '../koneksi.php';
        //jika tanggal dari dan tanggal ke ada maka
        $Kode   = $_GET['Kode'];
        if (isset($_GET['tgl_mulai']) || isset($_GET['tgl_selesai'])) {
            $Tgl_awal   = $_GET['tgl_mulai'];
            $Tgl_akhir  = $_GET['tgl_selesai'];
            // tampilkan data yang sesuai dengan range tanggal yang dicari 
            $data = mysqli_query($koneksi, "SELECT * FROM `potempahan` WHERE (Tanggal BETWEEN '$Tgl_awal' AND '$Tgl_akhir') AND Tipe!='Z' ");
        } else {
            //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
            $data = mysqli_query($koneksi, "SELECT * FROM `potempahan` AND Tipe!='Z' ");
        }
        // $no digunakan sebagai penomoran 
        $no = 1;
        // while digunakan sebagai perulangan data 
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php
                    $KodePelanggan = $d['KodePelanggan'];
                    $query = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND Kode = '$KodePelanggan' ");
                    $a = mysqli_fetch_array($query);
                    echo $a['Nama'];
                    ?>
                </td>
                <td>
                    <?php
                    $KodePelanggan = $d['KodePelanggan'];
                    $query = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND Kode = '$KodePelanggan' ");
                    $a = mysqli_fetch_array($query);
                    echo $a['Alamat'];
                    ?></td>
                <td><?php echo $d['NamaSales']; ?></td>
                <td><?php echo $d['TanggalTerima']; ?></td>
                <td><?php echo $d['TanggalEstimasiPenyelesaian']; ?></td>
                <td><?php
                    $a =  $d['JenisProduksi'];
                    if ($a == '1') {
                        echo 'Cincin';
                    } else if ($a == '2') {
                        echo 'Gelang';
                    } elseif ($a == '3') {
                        echo 'Mainan Nama';
                    } elseif ($a == '4') {
                        echo 'Sisik Naga';
                    } else if ($a == '5') {
                        echo 'Liontin';
                    } else if ($a == '6') {
                        echo 'Anting';
                    } elseif ($a == '7') {
                        echo 'Cincin Kawin';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $a = $d['JenisPelanggan'];
                    if ($a == 'T') {
                        echo 'Toko';
                    } else {
                        echo 'Perseorangan';
                    }
                    ?>
                </td>
                <td><?php echo $d['Bahan']; ?></td>
                <td><img src="img/<?php echo $d['Foto']; ?>" width="25" height="25"></td>
            </tr>
        <?php } ?>
    </table>
    <p>&nbsp;</p>
</body>
<script>
    window.print();
</script>

</html>