<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE PO Service</title>
</head>

<body>
    <div id="content">
        <?php
        include '../koneksi.php';
        $Kode = $_GET['Kode'];
        $query = mysqli_query($koneksi, "SELECT * FROM `poservice` WHERE Kode='$Kode' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
        $result = mysqli_fetch_array($query);
        $kodePelanggan = $result['KodePelanggan'];
        $query = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND `Kode` = '$kodePelanggan' ");
        $aa = mysqli_fetch_array($query);
        ?>
        <!-- Begin Page Content -->
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <table width="1083" height="614" border="0" style="border:1px solid black" id="customers">
                        <tr>
                            <td>&nbsp;</td>
                            <td height="23">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="6">&nbsp;</td>
                            <td width="7" height="23">&nbsp;</td>
                            <td width="1035">&nbsp;</td>
                            <td width="10">&nbsp;</td>
                            <td width="10">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="433">&nbsp;</td>
                            <td>
                                <table width="1033" border="0">
                                    <tr>
                                        <td colspan="8">
                                            <div align="center"><strong>
                                                    <h3>VICTOERIA VICI</h3>
                                                </strong></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <div align="center">Menerima Tempahan Cincin, Gelang, Liontin, Dll </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <div align="center">Jl.Sekip Baru No.30 Medan Telp. 061-4520404 </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="109"><strong>INVOICE</strong></td>
                                        <td width="128">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Nama Konsumen </td>
                                        <td>:</td>
                                        <td><?php echo $aa['Nama'] ?></td>
                                        <td>Tanggal Terima </td>
                                        <td>:</td>
                                        <td><?php echo $result['TanggalTerima'] ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>No. Telpon </td>
                                        <td>:</td>
                                        <td><?php echo $aa['Telp'] ?> </td>
                                        <td>Siap Tanggal </td>
                                        <td>:</td>
                                        <td><?php echo $result['TanggalEstimasiPenyelesaian'] ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Produk</td>
                                        <td>:</td>
                                        <td><?php
                                            $produk =  $result['JenisProduksi'];
                                            if ($produk == '1') {
                                                echo "Cincin";
                                            } else if ($produk == '2') {
                                                echo "Gelang";
                                            } else if ($produk == '3') {
                                                echo "Mainan Nama";
                                            } else if ($produk == '4') {
                                                echo "Sisik Naga";
                                            } elseif ($produk == '5') {
                                                echo "Liontin";
                                            } elseif ($produk == '6') {
                                                echo "Anting";
                                            } elseif ($produk == '7') {
                                                echo "Cincin Kawain";
                                            }
                                            ?></td>
                                        <td>Nama Sales </td>
                                        <td>:</td>
                                        <td><?php echo $result['NamaSales'] ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>No. PO </td>
                                        <td>:</td>
                                        <td><?php echo $result['Kode'] ?></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="border-bottom:1px solid black">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Keterangan</strong></td>
                                        <td>&nbsp;</td>
                                        <td><strong>Jumlah</strong></td>
                                        <td><strong>Harga Satuan </strong></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Harga Total </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Berat Total </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <?php
                                            $Berat = $result['BeratBatuPermata'];
                                            $Susut = $result['Susut'];

                                            $hasil = $Berat + $Susut;

                                            echo $hasil;
                                            ?> gr
                                        </td>
                                        <td><?php
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                            $cek    = mysqli_fetch_array($tampil);
                                            ?> <?php echo  "Rp " . number_format($cek['harga'], 2, ',', '.'); ?> </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <?php
                                            $Berat      = $result['BeratBatuPermata'];
                                            $Susut      = $result['Susut'];

                                            # menampilkan table hs
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                            $cek    = mysqli_fetch_array($tampil);

                                            $Hsatuan    = $cek['harga'];

                                            $a = $Berat + $Susut;

                                            $hasilnya   = $a * $Hsatuan;

                                            // echo $Hsatuan;
                                            echo $hasil_rupiah = "Rp " . number_format($hasilnya, 2, ',', '.');
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">( Berat Akhir = Berat Batu + Susut )</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">( 0gr = 0gr + 0gr ) </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Upah</td>
                                        <td>&nbsp;</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <?php echo $hasil_rupiah = "Rp " . number_format($result['Upah'], 2, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Harga Krum Warna </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <?php echo $hasil_rupiah = "Rp " . number_format($result['HargaKrum'], 2, ',', '.');  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total Harga </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <?php
                                            $Berat      = $result['BeratBatuPermata'];
                                            $Susut      = $result['Susut'];
                                            $Upah       = $result['Upah'];

                                            # menampilkan table hs
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                            $cek    = mysqli_fetch_array($tampil);

                                            $Hsatuan    = $cek['harga'];

                                            $hasilnya   = ($Berat + $Susut) * $Hsatuan;

                                            $totalHarga = $hasilnya + $Upah + $result['HargaKrum'];

                                            // echo $Hsatuan;
                                            echo $hasil_rupiah = "Rp " . number_format($totalHarga, 2, ',', '.');
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Panjar</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo $hasil_rupiah = "Rp " . number_format($result['Panjar'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="border-bottom:1px solid black">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Biaya Yang Harus Di Bayar : </strong></td>
                                        <td width="14">&nbsp;</td>
                                        <td width="180">&nbsp;</td>
                                        <td width="141">&nbsp;</td>
                                        <td width="16">&nbsp;</td>
                                        <td width="207">&nbsp;</td>
                                        <td width="204">
                                            <!-- (100% – % diskon) x harga asli produk    -->
                                            <?php
                                            $Berat      = $result['BeratBatuPermata'];
                                            $Susut      = $result['Susut'];
                                            $Upah       = $result['Upah'];

                                            # menampilkan table hs
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                            $cek    = mysqli_fetch_array($tampil);

                                            $Hsatuan    = $cek['harga'];
                                            $hasilnya   = ($Berat + $Susut) * $Hsatuan;

                                            $totalHarga = $hasilnya + $Upah + $result['HargaKrum'];

                                            $nah = $totalHarga;

                                            $biyahasil =  $nah - $result['Panjar'];

                                            // echo $Hsatuan;
                                            echo $hasil_rupiah = "Rp " . number_format($biyahasil, 2, ',', '.');
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="23">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="23">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    window.print();
</script>

</html>