<?php
include "../koneksi.php";
switch ($_GET['action']) {
    case 'edit':
        $id         = $_POST['id'];
        # update
        $query = mysqli_query($koneksi, "UPDATE `potempahan` SET Status='2' WHERE id='$id'");
        echo "success";
        break;
}
