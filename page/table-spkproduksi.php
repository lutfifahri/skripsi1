<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link href="../data/bootstrap4-modal-fullscreen.min.css" rel="stylesheet">

<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-th"></i> &nbsp;&nbsp;
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
                            <center>SPK Tempahan</center>
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
                        $ini = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE Tipe!='Z' AND Kode = '$KodeP' ");
                        $aa = mysqli_fetch_array($ini);
                    ?>
                        <tr>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $no++; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Nama']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Alamat']; ?></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><a href="javascript:void(0)" class='btn btn-success btn-sm view' id='<?php echo $a['id']; ?>'>CETAK&nbsp;&nbsp;<i class="fas fa-print"></i></a></td>
                            <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                <center><a href="javascript:void(0)" class='btn btn-primary btn-sm open_modal' id='<?php echo $a['id']; ?>'>Surat Perintah Kerja&nbsp;&nbsp;<i class="fas fa-print"></i></a>
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

    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    url: "modal-spkproduksi.php",
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