<link href="css/style.css" rel="stylesheet">
<!-- Main Content -->
<div id="content">
    <?php
    include '../koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM `poproduksi` WHERE id='$id' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
    $result = mysqli_fetch_array($query);
    $kodePelanggan = $result['KodePelanggan'];
    $query = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND `Kode` = '$kodePelanggan' ");
    $aa = mysqli_fetch_array($query);
    ?>
    <!-- Begin Page Content -->
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><a href="spkproduksiprint.php?Kode=<?php echo $result['Kode']; ?>" target="_BLANK" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                                                <h3>SURAT PERINTAH KERJA PRODUKSI </h3>
                                            </strong></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="213"><strong>Nama Konsumen</strong></td>
                                    <td width="19"><strong>:</strong></td>
                                    <td colspan="2"><?php echo $aa['Nama'] ?></td>
                                    <td><strong>Tanggal Terima </strong></td>
                                    <td>:</td>
                                    <td><?php echo $result['TanggalTerima'] ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><strong>No. Telpon </strong></td>
                                    <td><strong>:</strong></td>
                                    <td colspan="2"><?php echo $aa['Telp'] ?> </td>
                                    <td><strong>Siap Tanggal </strong></td>
                                    <td>:</td>
                                    <td><?php echo $result['TanggalEstimasiPenyelesaian'] ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Sales</strong></td>
                                    <td><strong>:</strong></td>
                                    <td colspan="2"><?php echo $result['NamaSales'] ?></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="8" style="border-bottom:1px solid black">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Jenis Produksi </strong></td>
                                    <td><strong>:</strong></td>
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
                                        ?>
                                    </td>
                                    <td><strong>Kadar </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['KadarLokal'] ?> %</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Bahan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php
                                        $Bahan =  $result['Bahan'];
                                        if ($Bahan == '1') {
                                            echo "Emas Kuning";
                                        } else if ($Bahan == '2') {
                                            echo "Swasa";
                                        } else if ($Bahan == '3') {
                                            echo "Perak";
                                        } else if ($Bahan == '4') {
                                            echo "Sisik Naga";
                                        } elseif ($Bahan == '5') {
                                            echo "Emas ";
                                        } elseif ($Bahan == '6') {
                                            echo "Kuning + Putih";
                                        } elseif ($Bahan == '7') {
                                            echo "Rose Gold";
                                        } elseif ($Bahan == '8') {
                                            echo "Emas Putih + Rose Gold";
                                        }
                                        ?></td>
                                    <td><strong>Range Berat </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['RangeBeratEstimasi'] ?> gr</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Berat Estimasi </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['EstimasiBerat'] ?> gr</td>
                                    <td><strong>Gambar Sample </strong></td>
                                    <td><strong>:</strong></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Ukuran</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['Ukuran'] ?></td>
                                    <td colspan="3" rowspan="6"><img src="img/<?php echo $result['Foto'] ?>" alt="" width="200" height="200"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Metode</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php
                                        $Metode =  $result['Metode'];
                                        if ($Metode == '1') {
                                            echo "Microsetting";
                                        } else if ($Metode == '2') {
                                            echo "Design";
                                        } else if ($Metode == '3') {
                                            echo "Manual";
                                        } else if ($Metode == '4') {
                                            echo "Inject";
                                        }
                                        ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Tipe Ikatan </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php
                                        $TipeIkatan =  $result['TipeIkatan'];
                                        if ($TipeIkatan == '1') {
                                            echo "Bungkus";
                                        } else if ($TipeIkatan == '2') {
                                            echo "Tanam";
                                        } else if ($TipeIkatan == '3') {
                                            echo "Bungkus Kuku";
                                        } else if ($TipeIkatan == '4') {
                                            echo "Tusuk";
                                        } elseif ($TipeIkatan == '5') {
                                            echo "Kuku ";
                                        } elseif ($TipeIkatan == '6') {
                                            echo "Mangkok Kuku";
                                        } elseif ($TipeIkatan == '7') {
                                            echo "Jepit";
                                        } elseif ($TipeIkatan == '8') {
                                            echo "Tidak Ada";
                                        }
                                        ?> </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Krum Warna</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['KrumWarna'] ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Keterangan Krum </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['KeteranganKrum']; ?> </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Keterangan Lain </strong></td>
                                    <td><strong>:</strong></td>
                                    <td><?php echo $result['Keterangan']; ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="8" style="border-bottom:1px solid black">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td width="19">&nbsp;</td>
                                    <td width="328">&nbsp;</td>
                                    <td width="140">&nbsp;</td>
                                    <td width="10">&nbsp;</td>
                                    <td width="244">&nbsp;</td>
                                    <td width="26">
                                        <!-- (100% – % diskon) x harga asli produk    -->
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