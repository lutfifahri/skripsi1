<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link href="../data/bootstrap4-modal-fullscreen.min.css" rel="stylesheet">

<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-th"></i> &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Invoice</th>
                        <th>
                            <center>Opsi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $f4hri = mysqli_query($koneksi, "SELECT * FROM `poproduksi` WHERE Tipe!='Z' ");
                    while ($a = mysqli_fetch_array($f4hri)) {
                        $KodeP = $a['KodePelanggan'];
                        $ini = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE Tipe!='Z' AND Kode = '$KodeP' ");
                        $aa = mysqli_fetch_array($ini);
                    ?>

                        <tr>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $no++; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Nama']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Alamat']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><a href="javascript:void(0)" class='btn btn-success btn-sm view' id='<?php echo $a['id']; ?>'>CETAK <i class="fas fa-print"></i></a></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                <center><a href="javascript:void(0)" class='btn btn-primary btn-sm open_modal' id='<?php echo $a['id']; ?>'><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" id="DeleteButton" class='btn btn-danger btn-sm' value="<?php echo $a['id']; ?>"><i class="fas fa-trash"></i></button>
                                </center>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div id="tambahData" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Purchase Order Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" autocomplete="off" id="formAdd" style="margin-bottom:0px">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">No Produksi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                                            <div class="col-sm-9">
                                                <?php
                                                $char = "PRDK";
                                                # Mengambil data dengan kode yang paling besar
                                                $query  = mysqli_query($koneksi, "SELECT max(Kode) as `kodeTerbesar` FROM `poproduksi` WHERE Tipe!='Z' AND Kode LIKE '{$char}%' ORDER BY `Kode` DESC LIMIT 5");
                                                $tampil = mysqli_fetch_array($query);
                                                $KodeSiswa = $tampil['kodeTerbesar'];

                                                # Mengambil angka dari Kode Siswa, Menggunakan fungsi substr
                                                # dan diubah ke integer dengan (int)
                                                $no =  substr($KodeSiswa, -3, 3);

                                                #Bilangan yang diambil ini di tambah 1 untuk menentukan nomor urut berikutnya;
                                                $no = (int) $no;

                                                $no += 1;

                                                # membentuk Kode Siswa baru
                                                # perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                                # misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                                # angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya KDS 
                                                $KodeSiswa = $char . sprintf("%03s", $no);
                                                echo '<input type="text" class="form-control" name="Kode" value="' . $KodeSiswa . '" readonly required>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="Kode Pelanggan" class="col-sm-3 col-form-label">Kode Pelanggan</label>
                                            <div class="col-sm-3">
                                                <select name="KodePelanggan" id="KodePelanggan" class="form-control">
                                                    <option value="">--Pilih--</option>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE Tipe!='Z'");
                                                    while ($a = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $a['Kode']; ?>"><?php echo $a['Kode']; ?> | <?php echo $a['Nama']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" id="Nama" class="form-control" placeholder="Nama Pelanggan" disabled>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" id="Alamat" class="form-control" placeholder="Alamat" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="Sales" class="col-sm-3 col-form-label">Sales | Tgl Terima | Tgl Estimasi Selesai</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="NamaSales" placeholder="Nama Sales">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="TanggalTerima">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="TanggalEstimasiPenyelesaian">
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
                                                <?php
                                                $char = "KPRDKS";
                                                # Mengambil data dengan kode yang paling besar
                                                $query  = mysqli_query($koneksi, "SELECT max(KodeProduk) as kodeTerbesar1 FROM `poproduksi` WHERE Tipe!='Z' AND `KodeProduk` LIKE '{$char}%' ORDER BY `KodeProduk` DESC LIMIT 5");
                                                $tampil = mysqli_fetch_array($query);
                                                $KodeSiswa1 = $tampil['kodeTerbesar1'];

                                                # Mengambil angka dari Kode Siswa, Menggunakan fungsi substr
                                                # dan diubah ke integer dengan (int)
                                                $no =  substr($KodeSiswa1, -3, 3);

                                                #Bilangan yang diambil ini di tambah 1 untuk menentukan nomor urut berikutnya;
                                                $no = (int) $no;

                                                $no += 1;

                                                # membentuk Kode Siswa baru
                                                # perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                                # misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                                # angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya KDS 
                                                $KodeSiswa1 = $char . sprintf("%03s", $no);
                                                echo '<input type="text" class="form-control" name="KodeProduk" value="' . $KodeSiswa1 . '" readonly required>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="Jenis Produksi" class="col-sm-3 col-form-label">Jenis Produksi</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="JenisProduksi" value="1" name="JenisProduksi" checked />
                                                &nbsp;Cincin&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="2" name="JenisProduksi" />
                                                &nbsp;&nbsp;Gelang&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="3" name="JenisProduksi" />
                                                &nbsp;&nbsp;Mainan Nama&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="4" name="JenisProduksi" />
                                                &nbsp;SisikNaga&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="5" name="JenisProduksi" />
                                                &nbsp;&nbsp;Liontion&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="6" name="JenisProduksi" />
                                                &nbsp;&nbsp;Anting&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisProduksi" value="7" name="JenisProduksi" />
                                                &nbsp;&nbsp;Cincin Kawin&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="Jenis Customer" class="col-sm-3 col-form-label">Jenis Customer</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="JenisPelanggan" value="T" name="JenisPelanggan" checked />
                                                &nbsp;&nbsp;Toko&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="JenisPelanggan" value="P" name="JenisPelanggan" />
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
                                                <input type="radio" id="" value="1" name="Bahan" checked />
                                                &nbsp;Emas Kuning&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="2" name="Bahan" />
                                                &nbsp;&nbsp;Swasa&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="3" name="Bahan" />
                                                &nbsp;&nbsp;Perak&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="4" name="Bahan" />
                                                &nbsp;SisikNaga&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="5" name="Bahan" />
                                                &nbsp;&nbsp;Emas Kuning + Putih&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="6" name="Bahan" />
                                                &nbsp;&nbsp;RoseGold&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="" value="7" name="Bahan" />
                                                &nbsp;&nbsp;EmasPuti + RoseGold&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="KadarLokal" id="" class="form-control" placeholder="Kadar Lokal %">
                                            </div>
                                            <div class="col-sm-3">
                                                <?php
                                                $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                                $cek    = mysqli_fetch_array($tampil);
                                                ?>
                                                <input type="text" id="" class="form-control" value="Rp.<?php echo $cek['harga']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Kuantitas | Ukuran</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="Kuantitas" id="" class="form-control" placeholder="Kuantitas (1)">
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" name="Ukuran" id="" class="form-control" placeholder="Ukuran">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Estimasi Berat | Range Berat Estimasi | Susut</label>
                                            <div class="col-sm-3">
                                                <input type="text" name="EstimasiBerat" id="" class="form-control" placeholder="Estimasi Berat (gr)">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="RangeBeratEstimasi" id="" class="form-control" placeholder="Range Berat Estimasi (10 gr - 14 gr)">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="Susut" id="" class="form-control" placeholder="Susut (gr)">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Datang Emas | Kadar Datang Emas (Lokal) | HargaPerGram</label>
                                            <div class="col-sm-3">
                                                <input type="text" name="DatangEmas" id="" class="form-control" placeholder="Datang Emas (gr)">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="KadarDatangEmas" id="" class="form-control" placeholder="Kadar Datang Emas [Lokal] (%)">
                                            </div>
                                            <div class="col-sm-3">
                                                <?php
                                                $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                                $cek    = mysqli_fetch_array($tampil);
                                                ?>
                                                <input type="text" id="" class="form-control" value="Rp.<?php echo $cek['harga']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Datang Berlian | Berat Datang Berlian (Lokal) | Upah Pasang Berlian</label>
                                            <div class="col-sm-3">
                                                <input type="text" name="DatangBerlian" id="" class="form-control" placeholder="Datang Berlian (PCS)">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="BeratDatangBerlian" id="" class="form-control" placeholder="Berat Datang Berlian (Carat)">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" id="" name="UpahPasangBerlian" class="form-control" value="Upah Pasang Berlian (Rp)">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Nama Batu Permata | Berat Batu Permata</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="NamaBatuPermata" id="" class="form-control" placeholder="Nama Batu">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="BeratBatuPermata" id="" class="form-control" placeholder="Berat Batu Permata (gr)">
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
                                                <input type="radio" id="TipeIkatan" value="1" name="TipeIkatan" checked />
                                                &nbsp;Bungkus&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="2" name="TipeIkatan" />
                                                &nbsp;&nbsp;Tanam&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="3" name="TipeIkatan" />
                                                &nbsp;&nbsp;Bungkus Kuku&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="4" name="TipeIkatan" />
                                                &nbsp;Tusuk&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="5" name="TipeIkatan" />
                                                &nbsp;&nbsp;Kuku&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="6" name="TipeIkatan" />
                                                &nbsp;&nbsp;Mangkok Kuku&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="7" name="TipeIkatan" />
                                                &nbsp;&nbsp;Jepit&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipeIkatan" value="8" name="TipeIkatan" />
                                                &nbsp;&nbsp;Tidak Ada&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Metode</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="Metode" value="1" name="Metode" checked />
                                                &nbsp;Microsetting&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="Metode" value="2" name="Metode" />
                                                &nbsp;&nbsp;Design&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="Metode" value="3" name="Metode" />
                                                &nbsp;&nbsp;Manual&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="Metode" value="4" name="Metode" />
                                                &nbsp;Inject&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Tipe Pelanggan</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="TipePelanggan" value="1" name="TipePelanggan" checked />
                                                &nbsp;Teliti&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="TipePelanggan" value="2" name="TipePelanggan" />
                                                &nbsp;&nbsp;Standard&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea name="Keterangan" id="" cols="2" rows="2" class="form-control" placeholder="Keterangan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Foto Sample</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="Foto" id="Foto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Krum Warna | Keterangan Krum | Harga Krum</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="KrumWarna" id="KrumWarna" class="form-control" placeholder="Krum Warna">
                                            </div>
                                            <div class="col-sm-3">
                                                <textarea name="KeteranganKrum" id="" cols="1" rows="1" class="form-control" placeholder="Keterangan Krum"></textarea>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="HargaKrum" id="hasil" class="form-control" placeholder="Rp">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom:8px">
                                            <label for="" class="col-sm-3 col-form-label">Upah | Budget | Panjar</label>
                                            <div class="col-sm-2">
                                                <input type="number" name="Upah" id="Upah" class="form-control" value="" placeholder="Upah (Rp)">
                                            </div>
                                            <!-- <div class="col-sm-3">
                                                <input type="number" name="Budget" id="Budget" class="form-control" value="" placeholder="Budget (Rp)">
                                            </div> -->
                                            <input type="hidden" name="Budget" id="Budget" class="form-control" value="" placeholder="Budget (Rp)">
                                            <div class="col-sm-4">
                                                <input type="number" name="Panjar" id="Panjar" class="form-control" value="" placeholder="Panjar (Rp)">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary waves-effect" onclick="validation()">Simpan</button>
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal   -->

    <!-- Modal -->

    <div id="ModalEdit" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>

    <div id="view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
    <!-- end Modal   -->

    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            $("#KrumWarna, #HargaKrum").keyup(function() {
                var a = $("#KrumWarna").val();
                var b = $("#HargaKrum").val();

                var hasil = parseInt(a) * parseInt(b);
                $("#hasil").val(hasil);
            });
        });

        $('#KodePelanggan').change(function() {
            var KodePelanggan = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'datapotempahan.php',
                data: "KodePelanggan=" + KodePelanggan,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $('#Nama').val(obj.Nama);
                    $('#Alamat').val(obj.Alamat);
                }
            });
        });

        $(document).ready(function() {
            $(".view").click(function(e) {
                var m = $(this).attr("id");
                $.ajax({
                    url: "modal-invoicepoproduksi.php",
                    type: "GET",
                    data: {
                        id: m,
                    },
                    success: function(ajaxData) {
                        // alert(ajaxData);
                        $("#view").html(ajaxData);
                        $("#view").modal('show', {
                            backdrop: 'true'
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".open_modal").click(function(e) {
                var m = $(this).attr("id");
                $.ajax({
                    url: "modal-poproduksi.php",
                    type: "GET",
                    data: {
                        id: m,
                    },
                    success: function(ajaxData) {
                        // alert(ajaxData);
                        $("#ModalEdit").html(ajaxData);
                        $("#ModalEdit").modal('show', {
                            backdrop: 'true'
                        });
                    }
                });
            });
        });

        $(function() {
            $("#example2").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>