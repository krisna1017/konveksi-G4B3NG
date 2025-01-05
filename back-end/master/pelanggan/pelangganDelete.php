<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    if ($mode == 'hapus') {
        $err = true;
        if (isset($_POST['id_pelanggan'])) {
            include('../../koneksi/koneksi.php');
            $err = false;
            $sql = "DELETE FROM pelanggan 
                WHERE id_pelanggan = '" . $_POST["id_pelanggan"] . "'";

            session_start();
            if ($koneksi->query($sql) === TRUE) {
                $_SESSION["simpan"] = 3;
            } else {
                $_SESSION["simpan"] = 9;
            }
            header("Location: ../../../front-end/page/main.php?page=pengguna-pelanggan");
        }
    }
}
