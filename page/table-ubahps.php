<div id="content">
    <?php
    session_start();
    include '../koneksi.php';
    $user = $_SESSION['SES_ADM'];
    $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Username='$user' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
    $result = mysqli_fetch_array($query);
    ?>
    <!-- Begin Page Content -->
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="POST" autocomplete="off">
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="iduser" name="iduser" id="myclass" value="<?php echo $result['iduser']; ?>">
                            <input type="text" class="form-control" id="" name="" id="myclass" value="<?php echo $result['Kode']; ?>" disabled>
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
                            <textarea name="Alamat" id="Alamat" cols="2" rows="2" class="form-control"><?php echo $result['Alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" class="form-check-input" id="Status" name="Status" value="1" <?php if ($result['Status'] == '1') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>> Aktif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" id="Status" name="Status" <?php if ($result['Status'] == '2') {
                                                                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                                                                    } ?> value="2"> Tidak Aktif
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $result['Username']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="PasswordLama" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="PasswordLama" name="PasswordLama" value="">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Password Baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="PasswordBaru" name="PasswordBaru" value="">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Confirmasi" class="col-sm-3 col-form-label">Confirmasi</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="Confirmasi" name="Confirmasi" value="">
                        </div>
                    </div>
                    <div class=" modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>