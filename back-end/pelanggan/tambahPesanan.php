<?php
session_start();
if (isset($_POST['simpan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $kode_produk = $_POST['kode_produk'];
    $s = $_POST['s'];
    $m = $_POST['m'];
    $l = $_POST['L'];
    $xl = $_POST['xl'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $tanggal = $_POST['tanggal'];
    $status = "belum dibayar";

    // var_dump($id_pesanan, $id_pelanggan, $kode_produk,  $s, $m, $l, $xl, $jumlah, $tanggal, $total, $status);

    include('../koneksi/koneksi.php');
    $err = false;
    $sql_pesanan = "INSERT INTO pesanan (id_pesanan, id_pelanggan, kode_produk, ukuran_s, ukuran_m, ukuran_l, ukuran_xl, jumlah, total_harga, tanggal_pesanan, status_pesanan) 
                                VALUES ('$id_pesanan', '$id_pelanggan', '$kode_produk', '$s', '$m', '$l', '$xl',  '$jumlah', '$total', '$tanggal', '$status')";

    if (mysqli_query($koneksi, $sql_pesanan)) {
        $_SESSION['simpan'] = 1;
    } else {
        $_SESSION['simpan'] = 9;
    }

    $sql_pembayaran = "INSERT INTO pembayaran (id_pembayaran, id_pesanan, tanggal_pembayaran, jumlah_bayar, metode_pembayaran) 
                                VALUES  (NULL, '$id_pesanan', NULL, NULL, NULL)";
    mysqli_query($koneksi, $sql_pembayaran);

    header("Location: ../../front-end/page/main.php?page=pelanggan-pesanan");
    mysqli_close($koneksi);
}
