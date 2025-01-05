<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    if ($mode == 'hapus') {
        $err = true;
        if (isset($_POST['kode_produk'])) {
            include('../../koneksi/koneksi.php');
            $err = false;
            $sql = "DELETE FROM produk 
                WHERE kode_produk = '" . $_POST["kode_produk"] . "'";

            session_start();
            if ($koneksi->query($sql) === TRUE) {
                $_SESSION["simpan"] = 3;
            } else {
                $_SESSION["simpan"] = 9;
            }
            header("Location: ../../../front-end/page/main.php?page=master-produk");
        }
    }
}
