<?php
if (isset($_POST['simpan'])) {
    session_start();
    $id_produksi = $_POST['id_produksi'];
    $id_pembayaran = $_POST['id_pembayaran'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $admin = $_SESSION['id_admin'];
    $status = 'berjalan';

    // var_dump($id_produksi, $id_pembayaran, $admin, $tanggal, $mulai, $selesai, $status);

    include('../../koneksi/koneksi.php');
    $err = false;
    $sql = "INSERT INTO produksi (id_produksi, id_admin, id_pembayaran, tanggal_mulai, tanggal_selesai, status_produksi)
                    VALUES ('$id_produksi', '$admin', '$id_pembayaran', '$mulai', '$selesai', '$status')";
    session_start();
    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['simpan'] = 1;
    } else {
        $_SESSION['simpan'] = 9;
    }
    header("Location: ../../../front-end/page/main.php?page=master-produksi");
    mysqli_close($koneksi);
}
