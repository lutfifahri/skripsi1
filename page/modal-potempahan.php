<link href="css/style.css" rel="stylesheet">
<!-- Main Content -->
<div id="content">
    <?php
    include '../koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM potempahan WHERE id='$id' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
    $result = mysqli_fetch_array($query);
    $KodePelanggan = $result['KodePelanggan'];
    $inidia = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND Kode='$KodePelanggan'");
    $aa = mysqli_fetch_array($inidia);
    ?>
    <!-- Begin Page Content -->
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah PO Tempahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off" id="formEdit" style="margin-bottom:0px">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">No PO</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $result['id'] ?>" readonly required>
                                            <input type="text" class="form-control" name="" value="<?php echo $result['Kode'] ?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Kode Pelanggan" class="col-sm-3 col-form-label">Kode Pelanggan</label>
                                        <div class="col-sm-3">
                                            <select name="KodePelanggan" id="KodePelangganEdit" class="form-control">
                                                <option value="">--Pilih--</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z'");
                                                while ($a = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?php echo $a['Kode']; ?>" <?php if ($result['KodePelanggan'] == $a['Kode']) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $a['Kode']; ?> | <?php echo $a['Nama']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="NamaEdit" value="<?php echo $aa['Nama'] ?>" class="form-control" disabled>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="AlamatEdit" value="<?php echo $aa['Alamat'] ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Sales" class="col-sm-3 col-form-label">Sales | Tgl Terima | Tgl Estimasi Selesai</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="NamaSales" value="<?php echo $result['NamaSales'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="TanggalTerima" value="<?php echo $result['TanggalTerima'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="TanggalEstimasiPenyelesaian" value="<?php echo $result['TanggalEstimasiPenyelesaian'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Produk</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Kode Produk" class="col-sm-3 col-form-label">Kode Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="" value="<?php echo $result['KodeProduk'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Jenis Produksi" class="col-sm-3 col-form-label">Jenis Produksi</label>
                                        <div class="col-sm-9">
                                            <input type="radio" id="JenisProduksi" value="1" <?php if ($result['JenisProduksi'] == '1') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;Cincin&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="2" <?php if ($result['JenisProduksi'] == '2') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;&nbsp;Gelang&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="3" <?php if ($result['JenisProduksi'] == '3') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;&nbsp;Mainan Nama&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="4" <?php if ($result['JenisProduksi'] == '4') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;SisikNaga&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="5" <?php if ($result['JenisProduksi'] == '5') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;&nbsp;Liontion&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="6" <?php if ($result['JenisProduksi'] == '6') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;&nbsp;Anting&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisProduksi" value="7" <?php if ($result['JenisProduksi'] == '7') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisProduksi" />
                                            &nbsp;&nbsp;Cincin Kawin&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Jenis Customer" class="col-sm-3 col-form-label">Jenis Customer</label>
                                        <div class="col-sm-9">
                                            <input type="radio" id="JenisPelanggan" value="T" <?php if ($result['JenisPelanggan'] == 'T') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisPelanggan" />
                                            &nbsp;&nbsp;Toko&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="JenisPelanggan" value="P" <?php if ($result['JenisPelanggan'] == 'P') {
                                                                                                    echo 'checked';
                                                                                                } ?> name="JenisPelanggan" />
                                            &nbsp;&nbsp;Perseorangan&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Produk</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="Jenis Produksi" class="col-sm-3 col-form-label">Jenis Produksi | Kadar Lokal | Harga Per Gram</label>
                                        <div class="col-sm-3">
                                            <input type="radio" id="" value="1" name="Bahan" <?php if ($result['Bahan'] == '1') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;Emas Kuning&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="2" name="Bahan" <?php if ($result['Bahan'] == '2') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;&nbsp;Swasa&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="3" name="Bahan" <?php if ($result['Bahan'] == '3') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;&nbsp;Perak&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="4" name="Bahan" <?php if ($result['Bahan'] == '4') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;SisikNaga&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="5" name="Bahan" <?php if ($result['Bahan'] == '5') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;&nbsp;Emas Kuning + Putih&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="6" name="Bahan" <?php if ($result['Bahan'] == '6') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;&nbsp;RoseGold&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="" value="7" name="Bahan" <?php if ($result['Bahan'] == '7') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                                            &nbsp;&nbsp;EmasPuti + RoseGold&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="KadarLokal" id="" class="form-control" value="<?php echo $result['KadarLokal'] ?>" placeholder="%">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="" class="form-control" value="Rp. 890.000.00" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Kuantitas | Ukuran</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="Kuantitas" id="" class="form-control" value="<?php echo $result['Kuantitas'] ?>" placeholder="1">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="Ukuran" id="" class="form-control" value="<?php echo $result['Ukuran'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Estimasi Berat | Range Berat Estimasi | Susut</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="EstimasiBerat" id="" class="form-control" value="<?php echo $result['EstimasiBerat'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="RangeBeratEstimasi" id="" class="form-control" value="<?php echo $result['RangeBeratEstimasi'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="Susut" id="" class="form-control" value="<?php echo $result['Susut'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Datang Emas | Kadar Datang Emas (Lokal) | HargaPerGram</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="DatangEmas" id="" class="form-control" value="<?php echo $result['DatangEmas'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="KadarDatangEmas" id="" class="form-control" value="<?php echo $result['KadarDatangEmas'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="" class="form-control" value="Rp. 890.000.00" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Datang Berlian | Berat Datang Berlian (Lokal) | Upah Pasang Berlian</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="DatangBerlian" id="" class="form-control" value="<?php echo $result['DatangBerlian'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="BeratDatangBerlian" id="" class="form-control" value="<?php echo $result['BeratDatangBerlian'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" id="" name="UpahPasangBerlian" class="form-control" value="<?php echo $result['UpahPasangBerlian'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Nama Batu Permata | Berat Batu Permata</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="NamaBatuPermata" id="" class="form-control" value="<?php echo $result['NamaBatuPermata'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="BeratBatuPermata" id="" class="form-control" value="<?php echo $result['BeratBatuPermata'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Pekerjaan Tambahan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Tipe Ikatan</label>
                                        <div class="col-sm-9">
                                            <input type="radio" id="TipeIkatan" value="1" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '1') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;Bungkus&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="2" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '2') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Tanam&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="3" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '3') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Bungkus Kuku&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="4" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '4') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;Tusuk&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="5" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '5') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Kuku&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="6" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '6') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Mangkok Kuku&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="7" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '7') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Jepit&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipeIkatan" value="8" name="TipeIkatan" <?php if ($result['TipeIkatan'] == '8') {
                                                                                                                echo 'checked';
                                                                                                            } ?> />
                                            &nbsp;&nbsp;Tidak Ada&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Metode</label>
                                        <div class="col-sm-9">
                                            <input type="radio" id="Metode" value="1" name="Metode" <?php if ($result['Metode'] == '1') {
                                                                                                        echo 'checked';
                                                                                                    } ?> />
                                            &nbsp;Microsetting&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="Metode" value="2" name="Metode" <?php if ($result['Metode'] == '2') {
                                                                                                        echo 'checked';
                                                                                                    } ?> />
                                            &nbsp;&nbsp;Design&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="Metode" value="3" name="Metode" <?php if ($result['Metode'] == '3') {
                                                                                                        echo 'checked';
                                                                                                    } ?> />
                                            &nbsp;&nbsp;Manual&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="Metode" value="4" name="Metode" <?php if ($result['Metode'] == '4') {
                                                                                                        echo 'checked';
                                                                                                    } ?> />
                                            &nbsp;Inject&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Tipe Pelanggan</label>
                                        <div class="col-sm-9">
                                            <input type="radio" id="TipePelanggan" value="1" name="TipePelanggan" <?php if ($result['TipePelanggan'] == '1') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> />
                                            &nbsp;Teliti&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="TipePelanggan" value="2" name="TipePelanggan" <?php if ($result['TipePelanggan'] == '2') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> />
                                            &nbsp;&nbsp;Standard&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea name="Keterangan" id="" cols="2" rows="2" class="form-control"><?php echo $result['Keterangan'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Foto Sample</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="Foto" id="Foto" class="form-control">
                                            <img src="img/<?php echo $result['Foto'] ?>" alt="" width="150" height="150">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Krum Warna | Keterangan Krum | Harga Krum</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="KrumWarna" id="KrumWarnaCek" class="form-control" value="<?php echo $result['KrumWarna'] ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <textarea name="KeteranganKrum" id="" cols="1" rows="1" class="form-control"><?php echo $result['KeteranganKrum'] ?></textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" name="HargaKrum" id="" class="form-control" value="<?php echo $result['HargaKrum'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:8px">
                                        <label for="" class="col-sm-3 col-form-label">Upah | Panjar</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="Upah" id="Upah" class="form-control" value="<?php echo $result['Upah'] ?>">
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <input type="number" name="Budget" id="Budget" class="form-control" value="">
                                        </div> -->
                                        <input type="hidden" name="Budget" id="Budget" class="form-control" value="<?php echo $result['Budget'] ?>">
                                        <div class="col-sm-4">
                                            <input type="number" name="Panjar" id="Panjar" class="form-control" value="<?php echo $result['Panjar'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect" onclick="validation()">Update</button>
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#KrumWarnaCek, #HargaKrumCek").keyup(function() {
            var a = $("#KrumWarnaCek").val();
            var b = $("#HargaKrumCek").val();

            var hasil = parseInt(a) * parseInt(b);
            $("#hasilnya").val(hasil);
        });
    });

    $('#KodePelangganEdit').change(function() {
        var KodePelanggan = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'datapotempahan.php',
            data: "KodePelanggan=" + KodePelanggan,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#NamaEdit').val(obj.Nama);
                $('#AlamatEdit').val(obj.Alamat);
            }
        });
    });
</script>