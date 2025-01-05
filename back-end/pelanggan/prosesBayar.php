<?php
if (isset($_POST['simpan'])) {
    $id_pembayaran = $_POST['id_pembayaran'];
    $id_pesanan = $_POST['id_pesanan'];
    $bayar = $_POST['bayar'];
    $metode = $_POST['metode'];
    $tanggal = $_POST['tanggal'];

    include('../koneksi/koneksi.php');
    $err = false;
    $sql = "UPDATE pembayaran set tanggal_pembayaran = '$tanggal', jumlah_bayar = '$bayar', metode_pembayaran = '$metode' where id_pembayaran = '$id_pembayaran'";

    session_start();
    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['simpan'] = 2;
    } else {
        $_SESSION['simpan'] = 9;
    }

    $update_statusPesanan = "UPDATE pesanan set status_pesanan = 'lunas' where id_pesanan = '$id_pesanan'";
    mysqli_query($koneksi, $update_statusPesanan);

    header("Location: ../../front-end/page/main.php?page=pelanggan-pesanan");
    mysqli_close($koneksi);
}
