<link href="css/style.css" rel="stylesheet">
<!-- Main Content -->
<div id="content">
    <?php
    include '../koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id='$id' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
    $result = mysqli_fetch_array($query);
    ?>
    <!-- Begin Page Content -->
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="POST" autocomplete="off">
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="id" name="id" id="myclass" value="<?php echo $result['id']; ?>">
                            <input type="hidden" class="form-control" id="Kode" name="Kode" id="myclass" value="<?php echo $result['Kode']; ?>">
                            <input type="text" class="form-control" id="" name="" value="<?php echo $result['Kode']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $result['Nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $result['Alamat']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Telp" class="col-sm-3 col-form-label">Telp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Telp" name="Telp" value="<?php echo $result['Telp']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" value="<?php echo $result['Tanggal']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="Keterangan" id="Keterangan" cols="2" rows="2" class="form-control"><?php echo $result['Keterangan']; ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="created_at" name="created_at" value="<?php echo $result['created_at']; ?>">
                    <div class=" modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>