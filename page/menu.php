<?php
include '../cek.php';
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" role="button">
                <i class="fas fa-user-circle"> <?php if ($_SESSION['SES_Level'] == '1') {
                                                    echo 'ADMIN';
                                                } elseif ($_SESSION['SES_Level'] == '2') {
                                                    echo 'PEGAWAI';
                                                } ?></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#out" role="button">
                <i class="fas fa-sign-out-alt"> Logout</i>
            </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="../initerbaru.png" width="220"  height="80" alt=""> -->
        <h3 class="transparent"><strong>
                <center>Victoeria Vici</center>
            </strong></h1>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['SES_ADM']; ?></a>
            </div>
        </div>
        <?php
        if ($_SESSION['SES_Level'] == '1') {
        ?>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Pelanggan" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Pelanggan
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">REGISTRASI</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas  fa-sitemap"></i>
                            <p>
                                Purchase Order
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Po_tempahan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Po Tempahan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Po_produksi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Po Produksi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Po_service" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Po Service / Reparasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas  fa-sitemap"></i>
                            <p>
                                Surat Perintah Kerja
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="spk_tempahan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SPK Tempahan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="spk_produksi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SPK Produksi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="spk_reparasi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SPK Service</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas  fa-sitemap"></i>
                            <p>
                                Managemen User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="DataUser" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="UbahDataUser" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ubah Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Laporan</li>
                    <li class="nav-item">
                        <a href="Laporan" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan Tempahan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="LaporanP" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan Produksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="LaporanS" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan Service / Reparasi
                            </p>
                        </a>
                    </li>
                    <a href="formubahemas.php" class="brand-link">
                        <h3 class="transparent"><strong>
                                <?php
                                $tampil = mysqli_query($koneksi, "SELECT * FROM `hem` WHERE Tipe!='Z' ");
                                $cek    = mysqli_fetch_array($tampil);
                                ?>
                                <center><?php echo  "Rp " . number_format($cek['harga'], 2, ',', '.'); ?></center>
                            </strong>
                        </h3>
                    </a>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
<?php } ?>

<?php
if ($_SESSION['SES_Level'] == '2') {
?>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">REGISTRASI</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas  fa-sitemap"></i>
                    <p>
                        Surat Perintah Kerja
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="spk_tempahan" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SPK Tempahan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="spk_produksi" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SPK Produksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="spk_reparasi" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SPK Service</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas  fa-sitemap"></i>
                    <p>
                        Managemen User
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="UbahDataUser" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ubah Password</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
<?php } ?>


</aside>

<div id="out" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pemberitahuan !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Keluar ?
            </div>
            <div class=" modal-footer justify-content-between">
                <a href="../logout.php" class="btn btn-primary waves-effect">Sign-Out</a>
            </div>
        </div>
    </div>
</div>