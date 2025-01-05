<?php
include('../back-end/koneksi/koneksi.php');

$id = $_POST['id_pembayaran'];
$tampil = mysqli_query($koneksi, "SELECT tanggal_pembayaran FROM pembayaran WHERE id_pembayaran = '$id'");
$hasil = mysqli_fetch_assoc($tampil);
$cek_data = mysqli_num_rows($tampil);
if ($cek_data > 0) {
    // $_SESSION['tanggal_bayar'] = $hasil['tanggal_pembayaran'];
    echo $hasil['tanggal_pembayaran'];
} else {
    echo "";
}
