<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-th"></i> &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Hak Akses</th>
                        <th>
                            <center>Opsi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $f4hri = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Tipe!='Z' ");
                    while ($a = mysqli_fetch_array($f4hri)) {
                    ?>

                        <tr>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $no++; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Nama']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Alamat']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Username']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                <?php
                                if ($a['Status'] == '1') {
                                    echo 'Active';
                                } else {
                                    echo 'Tidak Active';
                                }
                                ?>
                            </td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                <?php
                                if ($a['Level'] == '1') {
                                    echo 'ADMIN';
                                } else {
                                    echo 'PEGAWAI';
                                }
                                ?>
                            </td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                <center><a href="javascript:void(0)" class='btn btn-primary btn-sm open_modal' id='<?php echo $a['iduser']; ?>'><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" id="DeleteButton" class='btn btn-danger btn-sm' value="<?php echo $a['iduser']; ?>"><i class="fas fa-trash"></i></button>
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
    <div id="tambahData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" autocomplete="off" id="formAdd" style="margin-bottom:0px">
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <?php
                                $char = "USR";
                                # Mengambil data dengan kode yang paling besar
                                $query  = mysqli_query($koneksi, "SELECT max(Kode) as kodeTerbesar FROM `user` WHERE Tipe!='Z' AND Kode LIKE '{$char}%' ORDER BY Kode DESC LIMIT 5");
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
                            <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Nama" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Alamat" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="Status" id="" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="1">Active</option>
                                    <option value="2">Tidak Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="Username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Username" value="">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="Password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="Level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="Level" id="" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">PEGAWAI</option>
                                </select>
                            </div>
                        </div>
                        <div class=" modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary waves-effect" onclick="validation()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal   -->

    <!-- Modal -->

    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
            $(".open_modal").click(function(e) {
                var m = $(this).attr("id");
                $.ajax({
                    url: "modal-user.php",
                    type: "GET",
                    data: {
                        id: m,
                    },
                    success: function(ajaxData) {
                        $("#ModalEdit").html(ajaxData);
                        $("#ModalEdit").modal('show', {
                            backdrop: 'true'
                        });
                    }
                });
            });
        });

        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>