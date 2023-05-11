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
        <div class="modal-body">
            <form action="LaporanTempahan.php" target="_blank" method="GET" autocomplete="off" id="" style="margin-bottom:0px">
                <div class="form-group row" style="margin-bottom:8px">
                    <label for="" class="col-sm-3 col-form-label">Tgl Mulai | Tgl Selesai</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_mulai" required>
                    </div>
                    <p>&nbsp; s/d &nbsp;</p>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_selesai" required>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:8px">
                    <label for="" class="col-sm-3 col-form-label">Purchase Order Tempahan</label>
                    <div class="col-sm-9">
                        <select name="Kode" id="Kode" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php
                            include '../koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM `potempahan` WHERE Tipe!='Z' ");
                            while ($a = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $a['Kode']; ?>"><?php echo $a['Kode']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class=" modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary waves-effect" onclick="validation()">Simpan</button>
                </div>
            </form>
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